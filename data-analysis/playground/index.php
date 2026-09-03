<?php
$page_title = 'Playground — محرر الكود';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<h1>محرر الكود <span class="ltr">Python + Pandas Playground</span></h1>
<p class="subtitle">اكتب كود Python (فيه Pandas وMatplotlib متاحين) واضغط "شغّل" — بيتنفذ فعليًا على السيرفر.<br>
<span class="ltr">Write Python code (Pandas and Matplotlib available) and hit "Run" — it executes for real on the server.</span></p>

<div class="pg-layout">
    <div class="pg-toolbar">
        <select id="snippet-select">
            <option value="">— اختر مثال جاهز / Load an example —</option>
            <option value="hello">Hello World</option>
            <option value="dataframe">Pandas DataFrame</option>
            <option value="groupby">Groupby &amp; Aggregation</option>
        </select>
    </div>

    <textarea id="code-editor" spellcheck="false">print("Hello, Data World!")
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
    hello: `print("Hello, Data World!")
import pandas as pd
print("Pandas version:", pd.__version__)
`,
    dataframe: `import pandas as pd

data = {
    "product": ["Keyboard", "Mouse", "Monitor"],
    "price": [45.99, 19.99, 199.99],
}
df = pd.DataFrame(data)
print(df)
print("Average price:", df["price"].mean())
`,
    groupby: `import pandas as pd

data = {
    "category": ["Electronics", "Electronics", "Books", "Books"],
    "sales": [100, 150, 30, 45],
}
df = pd.DataFrame(data)
print(df.groupby("category")["sales"].sum())
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
