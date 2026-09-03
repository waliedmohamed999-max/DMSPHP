<?php
require __DIR__ . '/includes/progress.php';

header('Content-Type: application/json');

$curriculum = require __DIR__ . '/includes/curriculum.php';
$stage = $_POST['stage'] ?? '';

if (!array_key_exists($stage, $curriculum)) {
    http_response_code(400);
    echo json_encode(['error' => 'Unknown stage']);
    exit;
}

$progress = toggle_stage($stage);
echo json_encode(['progress' => $progress]);
