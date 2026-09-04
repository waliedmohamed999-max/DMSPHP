</main>
<footer class="footer">
    <span class="ltr">English Language Track</span> — تعلّم بالممارسة الفعلية، مش بالحفظ.
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

// --- Vocabulary Flashcards: click to flip between English and Arabic side ---
document.addEventListener('click', (e) => {
    if (e.target.closest('.speak-btn')) return;
    const card = e.target.closest('.vocab-card');
    if (card) {
        card.classList.toggle('flipped');
    }
});

// --- Auto-attach a Listen button to every vocabulary card, platform-wide ---
// Ensures every lesson's flashcards have working audio consistently, even ones
// written before the audio system existed — no per-lesson markup needed.
document.querySelectorAll('.vocab-card').forEach((card) => {
    const front = card.querySelector('.vocab-card-front');
    const wordEl = card.querySelector('.vocab-word');
    if (front && wordEl && wordEl.textContent.trim() && !front.querySelector('.speak-btn')) {
        const btn = document.createElement('button');
        btn.type = 'button';
        btn.className = 'speak-btn';
        btn.dataset.text = wordEl.textContent.trim();
        btn.dataset.rate = '1';
        btn.textContent = '🔊 Listen';
        front.appendChild(btn);
    }
    const exampleEn = card.querySelector('.vocab-example .en');
    if (exampleEn && exampleEn.textContent.trim() && !exampleEn.parentElement.querySelector('.speak-btn')) {
        const btn2 = document.createElement('button');
        btn2.type = 'button';
        btn2.className = 'speak-btn';
        btn2.dataset.text = exampleEn.textContent.trim();
        btn2.dataset.rate = '1';
        btn2.textContent = '🔊 Listen to example';
        exampleEn.insertAdjacentElement('afterend', btn2);
    }
});

// --- Listening Exercise: toggle the transcript for a .listening-exercise block ---
document.addEventListener('click', (e) => {
    const toggleBtn = e.target.closest('.listening-transcript-toggle');
    if (!toggleBtn) return;
    const box = toggleBtn.closest('.listening-exercise');
    const transcript = box.querySelector('.listening-transcript');
    transcript.hidden = !transcript.hidden;
    toggleBtn.textContent = transcript.hidden
        ? '📄 إظهار النص / Show Transcript'
        : '🙈 إخفاء النص / Hide Transcript';
});

// --- Conversation Simulator: a scripted dialogue with multiple-choice turns ---
// Each `.dialogue-sim` element carries its script as JSON in `data-dialogue`.
// Script format: an array of nodes.
//   { speaker: 'other', label: 'المحاور', en: '...', ar: '...' }   -> auto-shown line
//   { speaker: 'you', choices: [
//       { en: '...', ar: '...', correct: true,  feedback_ar: '...', next: N },
//       { en: '...', ar: '...', correct: false, feedback_ar: '...', next: N },
//   ]}                                                              -> waits for a click
function initDialogueSim(container) {
    let script;
    try {
        script = JSON.parse(container.dataset.dialogue);
    } catch (e) {
        container.textContent = 'Dialogue data error.';
        return;
    }

    const log = container.querySelector('.dialogue-log');
    const choicesWrap = container.querySelector('.dialogue-choices');
    const restartBtn = container.querySelector('.dialogue-restart-btn');
    let i = 0;

    function addLine(speaker, label, en, ar) {
        const div = document.createElement('div');
        div.className = 'dialogue-line ' + (speaker === 'you' ? 'dialogue-line-you' : 'dialogue-line-other');
        const labelHtml = label ? `<div class="dialogue-speaker-label">${label}</div>` : '';
        const safeText = en.replace(/&#39;/g, "'").replace(/"/g, '&quot;');
        div.innerHTML = `${labelHtml}<div class="dialogue-en">${en} <button type="button" class="speak-btn dialogue-speak-btn" data-text="${safeText}" data-rate="1">🔊</button></div><div class="dialogue-ar">${ar}</div>`;
        log.appendChild(div);
        log.scrollTop = log.scrollHeight;
    }

    function renderChoices(node) {
        choicesWrap.innerHTML = '';
        node.choices.forEach((choice) => {
            const btn = document.createElement('button');
            btn.className = 'dialogue-choice-btn';
            btn.innerHTML = `<span class="dialogue-en">${choice.en}</span><span class="dialogue-ar">${choice.ar}</span>`;
            btn.addEventListener('click', () => {
                Array.from(choicesWrap.children).forEach((b) => { if (b.tagName === 'BUTTON') b.disabled = true; });
                btn.classList.add(choice.correct ? 'choice-correct' : 'choice-wrong');
                const fb = document.createElement('div');
                fb.className = 'dialogue-feedback ' + (choice.correct ? 'correct' : 'wrong');
                fb.textContent = choice.feedback_ar;
                choicesWrap.appendChild(fb);
                addLine('you', 'أنت / You', choice.en, choice.ar);
                setTimeout(() => { i = choice.next; step(); }, 1500);
            });
            choicesWrap.appendChild(btn);
        });
    }

    function step() {
        choicesWrap.innerHTML = '';
        if (i >= script.length) {
            restartBtn.hidden = false;
            return;
        }
        const node = script[i];
        if (node.speaker === 'you' && node.choices) {
            renderChoices(node);
        } else {
            addLine(node.speaker, node.label, node.en, node.ar);
            i++;
            setTimeout(step, 500);
        }
    }

    restartBtn.addEventListener('click', () => {
        log.innerHTML = '';
        choicesWrap.innerHTML = '';
        restartBtn.hidden = true;
        i = 0;
        step();
    });

    step();
}

document.querySelectorAll('.dialogue-sim').forEach(initDialogueSim);

// ============================================================
// Audio / Pronunciation System
// ============================================================
// Progressive enhancement, real-file-first: any `.speak-btn` can carry
// data-audio="some-key" pointing at a real recording under english/audio/.
// If that file doesn't exist yet (which is the case for everything today —
// no fake/placeholder MP3s were added), it transparently falls back to the
// browser's built-in Speech Synthesis reading data-text aloud instead.
// Human recordings can be dropped in later with ZERO lesson-file changes.
//
// Reusable functions: speakText(), stopSpeech(), playAudioKey().
// Markup: <button class="speak-btn" data-text="Hello." data-rate="1">🔊 Listen</button>
//         <button class="speak-btn" data-text="Hello." data-rate="0.65">🐢 Slow</button>
//         <button class="speak-btn" data-text="Hello." data-audio="greetings/hello">🔊 Listen</button>
// Only one sound plays at a time — starting a new one stops whatever was playing.

let currentAudioEl = null;
let cachedEnglishVoice = null;

function pickEnglishVoice() {
    if (cachedEnglishVoice) return cachedEnglishVoice;
    if (!('speechSynthesis' in window)) return null;
    const voices = window.speechSynthesis.getVoices();
    cachedEnglishVoice = voices.find(v => v.lang === 'en-US')
        || voices.find(v => v.lang && v.lang.toLowerCase().startsWith('en'))
        || null;
    return cachedEnglishVoice;
}
if ('speechSynthesis' in window) {
    window.speechSynthesis.onvoiceschanged = () => { cachedEnglishVoice = null; };
}

function stopSpeech() {
    if (currentAudioEl) {
        currentAudioEl.pause();
        currentAudioEl.currentTime = 0;
        currentAudioEl = null;
    }
    if ('speechSynthesis' in window) {
        window.speechSynthesis.cancel();
    }
    document.querySelectorAll('.speak-btn.is-playing').forEach((b) => b.classList.remove('is-playing'));
}

function showSpeechUnsupported(btn) {
    const wrap = btn ? btn.closest('.pronunciation-box, .speak-wrap, .speak-practice') : null;
    if (wrap) {
        if (!wrap.querySelector('.speak-unsupported')) {
            const notice = document.createElement('div');
            notice.className = 'speak-unsupported';
            notice.textContent = 'Audio playback is not supported by this browser. / تشغيل الصوت مش مدعوم في المتصفح ده.';
            wrap.appendChild(notice);
        }
    }
}

function speakText(text, rate, btn) {
    stopSpeech();
    if (!text) return;
    if (!('speechSynthesis' in window)) {
        showSpeechUnsupported(btn);
        return;
    }
    const utter = new SpeechSynthesisUtterance(text);
    utter.lang = 'en-US';
    utter.rate = rate || 1;
    const voice = pickEnglishVoice();
    if (voice) utter.voice = voice;
    if (btn) btn.classList.add('is-playing');
    const clearPlaying = () => { if (btn) btn.classList.remove('is-playing'); };
    utter.onend = clearPlaying;
    utter.onerror = clearPlaying;
    window.speechSynthesis.speak(utter);
}

function playAudioKey(audioKey, text, rate, btn) {
    stopSpeech();
    if (!audioKey) {
        speakText(text, rate, btn);
        return;
    }
    const audio = new Audio(`../audio/${audioKey}.mp3`);
    currentAudioEl = audio;
    if (btn) btn.classList.add('is-playing');
    audio.addEventListener('ended', () => {
        if (btn) btn.classList.remove('is-playing');
        if (currentAudioEl === audio) currentAudioEl = null;
    });
    audio.addEventListener('error', () => {
        // Real recording missing/unplayable — fall back to Speech Synthesis.
        if (currentAudioEl === audio) currentAudioEl = null;
        speakText(text, rate, btn);
    });
    audio.play().catch(() => {
        if (currentAudioEl === audio) currentAudioEl = null;
        speakText(text, rate, btn);
    });
}

document.addEventListener('click', (e) => {
    const speakBtn = e.target.closest('.speak-btn');
    if (speakBtn) {
        const text = speakBtn.dataset.text || '';
        const rate = parseFloat(speakBtn.dataset.rate || '1');
        const audioKey = speakBtn.dataset.audio || '';
        playAudioKey(audioKey, text, rate, speakBtn);
    }
});

// ============================================================
// Speaking Practice: Listen -> Record -> Play back your own voice.
// Entirely client-side — nothing is ever uploaded anywhere.
// Markup: <div class="speak-practice">
//           <button class="speak-record-btn" data-recording="0">🎙 ...</button>
//           <div class="speak-recording-playback"></div>
//           <div class="speak-practice-status"></div>
//         </div>
// ============================================================
document.addEventListener('click', async (e) => {
    const recBtn = e.target.closest('.speak-record-btn');
    if (!recBtn) return;

    const wrap = recBtn.closest('.speak-practice');
    const playWrap = wrap.querySelector('.speak-recording-playback');
    const statusEl = wrap.querySelector('.speak-practice-status');

    if (recBtn.dataset.recording === '1') {
        if (wrap._recorder) wrap._recorder.stop();
        recBtn.dataset.recording = '0';
        recBtn.textContent = '🎙 ابدأ التسجيل / Start Recording';
        recBtn.classList.remove('is-recording');
        return;
    }

    if (!navigator.mediaDevices || !window.MediaRecorder) {
        statusEl.textContent = 'التسجيل مش مدعوم في المتصفح ده. / Recording is not supported by this browser.';
        return;
    }

    try {
        const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
        const recorder = new MediaRecorder(stream);
        const chunks = [];
        recorder.ondataavailable = (ev) => { if (ev.data.size > 0) chunks.push(ev.data); };
        recorder.onstop = () => {
            const blob = new Blob(chunks, { type: 'audio/webm' });
            const url = URL.createObjectURL(blob);
            playWrap.innerHTML = '';
            const audioEl = document.createElement('audio');
            audioEl.controls = true;
            audioEl.src = url;
            playWrap.appendChild(audioEl);
            stream.getTracks().forEach((t) => t.stop());
            statusEl.textContent = 'اتسجل! اسمع نفسك وقارن بالنطق الأصلي. / Recorded! Listen to yourself and compare with the original.';
        };
        wrap._recorder = recorder;
        recorder.start();
        recBtn.dataset.recording = '1';
        recBtn.textContent = '⏹ إيقاف التسجيل / Stop Recording';
        recBtn.classList.add('is-recording');
        statusEl.textContent = 'بيسجل... اتكلم دلوقتي. / Recording... speak now.';
    } catch (err) {
        statusEl.textContent = 'محتاج إذن استخدام الميكروفون. / Microphone permission is needed.';
    }
});
</script>
</body>
</html>
