<?php
$detailsFile = 'details.txt';
$regions = [];

if (file_exists($detailsFile)) {
    $content = file_get_contents($detailsFile);
    $entries = preg_split("/[\r\n]+/", trim($content));

    foreach ($entries as $entry) {
        $parts = explode(', ', $entry);

        if (count($parts) >= 3) {
            $regions[] = [
                'region' => str_replace('Region: ', '', $parts[0]),
                'year' => str_replace('Year: ', '', $parts[1]),
                'note' => str_replace('Note: ', '', $parts[2])
            ];
        }
    }
}

header('Content-Type: application/json');
echo json_encode($regions);
?>
