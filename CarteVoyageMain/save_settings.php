<?php
    $settings = file_get_contents('php://input');
    file_put_contents('settings.txt', $settings);
?>