</main>
<footer class="footer">
    <span class="ltr">Full Stack Developer Track</span> — Front-End + Back-End في مسار واحد متكامل.
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
    }
});

</script>
</body>
</html>
