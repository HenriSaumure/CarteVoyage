<?php
$file = 'details.txt';
$visitedRegions = [];

if (file_exists($file)) {
    $lines = file($file, FILE_IGNORE_NEW_LINES);
    foreach ($lines as $line) {
        if (preg_match('/Region: ([^,]+)/', $line, $matches)) {
            $visitedRegions[] = $matches[1];
        }
    }
}

header('Content-Type: application/json');
echo json_encode($visitedRegions);
?>