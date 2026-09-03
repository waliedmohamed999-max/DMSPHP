</main>
<footer class="footer">
    <span class="ltr">Front-End Developer Track</span> — تعلّم بالتطبيق الفعلي، مش بالحفظ.
</footer>
<script>
// Shared lesson-interaction handlers: quiz checking, mark-lesson-complete,
// and inline mini code editors. Delegated on document so any lesson page
// can just drop in the matching HTML with no extra per-page script.
document.addEventListener('click', (e) => {
    const quizBtn = e.target.closest('.quiz-check-btn');
    if (quizBtn) {
        const box = quizBtn.closest('.quiz-box');
        const selected = box.querySelector('input[type="radio"]:checked');
        const feedback = box.querySelector('.quiz-feedback');
        if (!selected) {
            feedback.textContent = 'اختار إجابة الأول / Pick an answer first';
            feedback.className = 'quiz-feedback warn';
            return;
        }
        if (selected.value === box.dataset.correct) {
            feedback.textContent = '✅ صح! أحسنت. / Correct!';
            feedback.className = 'quiz-feedback correct';
        } else {
            feedback.textContent = '❌ مش صح، جرب تاني. / Not quite, try again.';
            feedback.className = 'quiz-feedback wrong';
        }
        return;
    }

    const completeBtn = e.target.closest('.complete-btn');
    if (completeBtn) {
        if (completeBtn.dataset.done === '1') return;
        completeBtn.disabled = true;
        fetch('../toggle_progress.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'stage=' + encodeURIComponent(completeBtn.dataset.stage),
        }).then(r => r.json()).then(() => {
            completeBtn.textContent = '✓ الدرس مكتمل / Lesson Completed';
            completeBtn.dataset.done = '1';
            completeBtn.classList.add('is-done');
        }).catch(() => { completeBtn.disabled = false; });
        return;
    }

    const runBtn = e.target.closest('.mini-run-btn');
    if (runBtn) {
        const wrap = runBtn.closest('.mini-editor-wrap');
        const textarea = wrap.querySelector('textarea');
        const output = wrap.querySelector('.output-box');
        const status = wrap.querySelector('.mini-status');
        runBtn.disabled = true;
        status.textContent = 'بيشتغل... / running...';
        fetch('../playground/run.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'code=' + encodeURIComponent(textarea.value),
        }).then(r => r.json()).then(data => {
            let text = '';
            if (data.output) text += data.output;
            if (data.error) text += (text ? '\n\n' : '') + '--- stderr ---\n' + data.error;
            if (!data.output && !data.error) text = '(no output)';
            output.textContent = text;
            status.textContent = 'تم / done';
        }).catch(err => {
            output.textContent = 'Request failed: ' + err.message;
        }).finally(() => { runBtn.disabled = false; });
        return;
    }

    // Mini Front-End editor tabs (HTML/CSS/JS) — scoped per .mini-fe-editor wrapper
    const feTab = e.target.closest('.mini-fe-editor .fe-tab');
    if (feTab) {
        const wrap = feTab.closest('.mini-fe-editor');
        wrap.querySelectorAll('.fe-tab').forEach(t => t.classList.remove('active'));
        feTab.classList.add('active');
        wrap.querySelectorAll('.fe-code').forEach(ta => {
            ta.style.display = ta.dataset.tab === feTab.dataset.tab ? 'block' : 'none';
        });
    }
});

// Mini Front-End editor (HTML/CSS/JS, client-side only): builds one srcdoc
// document from whichever .fe-code textareas exist inside a .mini-fe-editor
// wrapper and assigns it to that wrapper's preview iframe. Scoped via
// closest()/querySelector so any number of independent instances can live
// on one lesson page with no id collisions — same mechanism as the
// standalone Playground, just delegated and reusable per-wrapper.
function feRenderMiniEditor(wrap) {
    const preview = wrap.querySelector('.mini-fe-preview');
    if (!preview) return;
    const html = wrap.querySelector('.fe-code[data-tab="html"]')?.value ?? '';
    const css = wrap.querySelector('.fe-code[data-tab="css"]')?.value ?? '';
    const js = wrap.querySelector('.fe-code[data-tab="js"]')?.value ?? '';
    preview.srcdoc = `<!DOCTYPE html><html><head><meta charset="utf-8"><style>${css}</style></head><body>${html}<script>${js}<\/script></body></html>`;
}

const feDebounceTimers = new WeakMap();
document.addEventListener('input', (e) => {
    const ta = e.target.closest('.mini-fe-editor .fe-code');
    if (!ta) return;
    const wrap = ta.closest('.mini-fe-editor');
    clearTimeout(feDebounceTimers.get(wrap));
    feDebounceTimers.set(wrap, setTimeout(() => feRenderMiniEditor(wrap), 400));
});

document.querySelectorAll('.mini-fe-editor').forEach(feRenderMiniEditor);

</script>
</body>
</html>
