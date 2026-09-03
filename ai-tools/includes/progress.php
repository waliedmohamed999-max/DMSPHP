<?php
// Tiny JSON-backed progress store for a single local learner — no auth needed, this app only binds to localhost via XAMPP.

define('PROGRESS_FILE', __DIR__ . '/../data/progress.json');

function load_progress(): array
{
    if (!file_exists(PROGRESS_FILE)) {
        return [];
    }
    $raw = file_get_contents(PROGRESS_FILE);
    $data = json_decode($raw, true);
    return is_array($data) ? $data : [];
}

function save_progress(array $progress): void
{
    file_put_contents(PROGRESS_FILE, json_encode($progress, JSON_PRETTY_PRINT));
}

function toggle_stage(string $stage): array
{
    $progress = load_progress();
    $progress[$stage] = !($progress[$stage] ?? false);
    save_progress($progress);
    return $progress;
}
