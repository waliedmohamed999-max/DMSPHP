<?php
$page_title = 'Playground — محرر الكود';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<h1>محرر الكود <span class="ltr">PHP Playground</span></h1>
<p class="subtitle">اكتب كود PHP واضغط "شغّل" — الكود بيتنفذ فعليًا على السيرفر بتاعك ويطلعلك الناتج الحقيقي.<br>
<span class="ltr">Write PHP code and hit "Run" — it executes for real on your server and shows the actual output.</span></p>

<div class="pg-layout">
    <div class="pg-toolbar">
        <select id="snippet-select">
            <option value="">— اختر مثال جاهز / Load an example —</option>
            <option value="hello">Hello World</option>
            <option value="loop">Loop + Array</option>
            <option value="function">Function example</option>
            <option value="error">Trigger an error (on purpose)</option>
        </select>
    </div>

    <textarea id="code-editor" spellcheck="false">&lt;?php
echo "Hello, PHP World!" . PHP_EOL;
echo 2 + 2;
</textarea>

    <div class="pg-toolbar">
        <button class="run-btn" id="run-btn">▶ شغّل الكود / Run</button>
        <span class="pg-status" id="pg-status"></span>
    </div>

    <div>
        <h3>الناتج الفعلي / Actual Output</h3>
        <div class="output-box" id="output-box">— لسه متشغلش أي كود / no code run yet —</div>
    </div>
</div>

<script>
// Built via concatenation so the literal "<" + "?php" sequence never appears
// in this .php file's source — PHP scans the whole file for that tag,
// even inside a JS template string, and would try to parse it as code.
const OPEN_TAG = '<' + '?php';

const snippets = {
    hello: `${OPEN_TAG}
echo "Hello, PHP World!" . PHP_EOL;
echo "PHP version: " . phpversion() . PHP_EOL;
`,
    loop: `${OPEN_TAG}
$fruits = ["apple", "banana", "mango"];
foreach ($fruits as $i => $fruit) {
    echo ($i + 1) . ") " . $fruit . PHP_EOL;
}
`,
    function: `${OPEN_TAG}
function greet(string $name): string {
    return "Hello, $name!";
}

echo greet("Waleed") . PHP_EOL;
`,
    error: `${OPEN_TAG}
echo $undefinedVariable;
echo 10 / 0;
`,
};

const editor = document.getElementById('code-editor');
const select = document.getElementById('snippet-select');
const runBtn = document.getElementById('run-btn');
const status = document.getElementById('pg-status');
const outputBox = document.getElementById('output-box');

select.addEventListener('change', () => {
    if (select.value && snippets[select.value]) {
        editor.value = snippets[select.value];
    }
});

try {
    const prefill = localStorage.getItem('pg_prefill');
    if (prefill) {
        editor.value = prefill;
        localStorage.removeItem('pg_prefill');
    }
} catch (e) {}

runBtn.addEventListener('click', async () => {
    runBtn.disabled = true;
    status.textContent = 'بيشتغل... / running...';
    outputBox.textContent = '';

    try {
        const res = await fetch('run.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'code=' + encodeURIComponent(editor.value),
        });
        const data = await res.json();

        let text = '';
        if (data.output) text += data.output;
        if (data.error) text += (text ? '\n\n' : '') + '--- stderr ---\n' + data.error;
        if (!data.output && !data.error) text = '(no output)';

        outputBox.textContent = text;
        status.textContent = 'تم / done';
    } catch (e) {
        outputBox.textContent = 'Request failed: ' + e.message;
        status.textContent = '';
    } finally {
        runBtn.disabled = false;
    }
});
</script>

<?php include __DIR__ . '/../includes/footer.php'; ?>
