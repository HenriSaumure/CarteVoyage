<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $region = filter_var($_POST['region'], FILTER_SANITIZE_STRING);
    $year = filter_var($_POST['year'], FILTER_SANITIZE_NUMBER_INT);
    $note = filter_var($_POST['note'], FILTER_SANITIZE_STRING);

    $file = 'details.txt';
    $data = "$region,$year,$note" . PHP_EOL;

    if (file_put_contents($file, $data, FILE_APPEND)) {
        header('Location: map.html?t=' . time());
        exit();
    } else {
        echo "Error saving details. Please try again.";
    }
} else {
    echo "Invalid request method.";
}
?>
