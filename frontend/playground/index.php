<?php
$page_title = 'Playground — محرر الكود';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<h1>محرر الكود <span class="ltr">Live HTML/CSS/JS Playground</span></h1>
<p class="subtitle">اكتب HTML وCSS وJavaScript وشوف النتيجة فورًا في المعاينة — كل حاجة بتتنفذ في المتصفح مباشرة، بالظبط زي أي موقع حقيقي.<br>
<span class="ltr">Write HTML, CSS, and JavaScript and see the result instantly in the preview — everything runs directly in the browser, exactly like a real site.</span></p>

<div class="pg-layout">
    <div class="pg-toolbar">
        <select id="snippet-select">
            <option value="">— اختر مثال جاهز / Load an example —</option>
            <option value="hello">Hello Page</option>
            <option value="button">Interactive Button</option>
            <option value="flex">Flexbox Cards</option>
        </select>
        <button class="run-btn" id="run-btn">▶ شغّل / Run</button>
        <span class="pg-status" id="pg-status"></span>
    </div>

    <div class="fe-tabs">
        <button class="fe-tab active" data-tab="html">HTML</button>
        <button class="fe-tab" data-tab="css">CSS</button>
        <button class="fe-tab" data-tab="js">JavaScript</button>
    </div>
    <textarea id="fe-html" class="fe-code" spellcheck="false">&lt;h1&gt;أهلاً بيك&lt;/h1&gt;
&lt;p&gt;غيّر الكود وشوف النتيجة فورًا.&lt;/p&gt;</textarea>
    <textarea id="fe-css" class="fe-code" style="display:none" spellcheck="false">body {
    font-family: sans-serif;
    text-align: center;
    padding: 20px;
    color: #333;
}
h1 { color: #6c8bff; }</textarea>
    <textarea id="fe-js" class="fe-code" style="display:none" spellcheck="false">console.log("جاهز!");</textarea>

    <div>
        <h3>المعاينة الحية / Live Preview</h3>
        <iframe id="fe-preview" class="render-box" style="height:320px" sandbox="allow-scripts"></iframe>
    </div>
</div>

<script>
const tabs = document.querySelectorAll('.fe-tab');
const panes = {
    html: document.getElementById('fe-html'),
    css: document.getElementById('fe-css'),
    js: document.getElementById('fe-js'),
};
const preview = document.getElementById('fe-preview');
const runBtn = document.getElementById('run-btn');
const status = document.getElementById('pg-status');
const select = document.getElementById('snippet-select');

tabs.forEach(tab => {
    tab.addEventListener('click', () => {
        tabs.forEach(t => t.classList.remove('active'));
        tab.classList.add('active');
        Object.entries(panes).forEach(([name, el]) => {
            el.style.display = name === tab.dataset.tab ? 'block' : 'none';
        });
    });
});

function render() {
    const doc = `<!DOCTYPE html><html><head><meta charset="utf-8"><style>${panes.css.value}</style></head><body>${panes.html.value}<script>${panes.js.value}<\/script></body></html>`;
    preview.srcdoc = doc;
    status.textContent = 'تم التحديث / updated';
    setTimeout(() => { status.textContent = ''; }, 1000);
}

let debounce;
Object.values(panes).forEach(el => {
    el.addEventListener('input', () => {
        clearTimeout(debounce);
        debounce = setTimeout(render, 500);
    });
});

runBtn.addEventListener('click', render);

const snippets = {
    hello: {
        html: '<h1>أهلاً بيك</h1>\n<p>غيّر الكود وشوف النتيجة فورًا.</p>',
        css: 'body {\n    font-family: sans-serif;\n    text-align: center;\n    padding: 20px;\n    color: #333;\n}\nh1 { color: #6c8bff; }',
        js: 'console.log("جاهز!");',
    },
    button: {
        html: '<button id="counter-btn">ضغطت 0 مرة</button>',
        css: 'button {\n    font-size: 18px;\n    padding: 10px 20px;\n    background: #35d0ba;\n    color: white;\n    border: none;\n    border-radius: 8px;\n    cursor: pointer;\n}',
        js: 'let count = 0;\nconst btn = document.getElementById("counter-btn");\nbtn.addEventListener("click", () => {\n    count++;\n    btn.textContent = `ضغطت ${count} مرة`;\n});',
    },
    flex: {
        html: '<div class="cards">\n    <div class="card">1</div>\n    <div class="card">2</div>\n    <div class="card">3</div>\n</div>',
        css: '.cards {\n    display: flex;\n    gap: 12px;\n    padding: 20px;\n}\n.card {\n    flex: 1;\n    background: #6c8bff;\n    color: white;\n    padding: 30px;\n    text-align: center;\n    border-radius: 10px;\n    font-size: 24px;\n}',
        js: '',
    },
};

select.addEventListener('change', () => {
    const snip = snippets[select.value];
    if (!snip) return;
    panes.html.value = snip.html;
    panes.css.value = snip.css;
    panes.js.value = snip.js;
    render();
});

render();
</script>

<?php include __DIR__ . '/../includes/footer.php'; ?>
