<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') exit;

require_once __DIR__ . '/../vendor/autoload.php';
use MateuszDudek\Backend\Service\DistanceCalculator;

$data = json_decode(file_get_contents('php://input'), true);

$latA = $data['latA'] ?? null;
$lngA = $data['lngA'] ?? null;
$latB = $data['latB'] ?? null;
$lngB = $data['lngB'] ?? null;

if (!is_numeric($latA) || !is_numeric($lngA) || !is_numeric($latB) || !is_numeric($lngB)) {
    http_response_code(422);
    echo json_encode(['error' => 'Invalid coordinates']);
    exit;
}

$calculator = new DistanceCalculator();
$result = $calculator->calculate((float)$latA, (float)$lngA, (float)$latB, (float)$lngB);

echo json_encode($result);
