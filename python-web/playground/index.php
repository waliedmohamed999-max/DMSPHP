<?php
$page_title = 'Playground — محرر الكود';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<h1>محرر الكود <span class="ltr">Python Playground</span></h1>
<p class="subtitle">اكتب كود Python واضغط "شغّل" — الكود بيتنفذ فعليًا على السيرفر بتاعك ويطلعلك الناتج الحقيقي.<br>
<span class="ltr">Write Python code and hit "Run" — it executes for real on your server and shows the actual output.</span></p>

<div class="pg-layout">
    <div class="pg-toolbar">
        <select id="snippet-select">
            <option value="">— اختر مثال جاهز / Load an example —</option>
            <option value="hello">Hello World</option>
            <option value="loop">Loop + List</option>
            <option value="function">Function example</option>
            <option value="error">Trigger an error (on purpose)</option>
        </select>
    </div>

    <textarea id="code-editor" spellcheck="false">print("Hello, Python World!")
print(2 + 2)
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
const snippets = {
    hello: `print("Hello, Python World!")
import sys
print("Python version:", sys.version.split()[0])
`,
    loop: `fruits = ["apple", "banana", "mango"]
for i, fruit in enumerate(fruits, start=1):
    print(f"{i}) {fruit}")
`,
    function: `def greet(name: str) -> str:
    return f"Hello, {name}!"

print(greet("Waleed"))
`,
    error: `print(undefined_variable)
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
