<?php

require_once __DIR__ . '/vendor/autoload.php';

use User\PhpLab07\Validators\TripFormValidator;

session_start();

$validator = new TripFormValidator($_POST);

$_SESSION['old'] = $validator->getData();

if (!$validator->validate()) {
    $_SESSION['errors'] = $validator->getErrors();
    header('Location: main.php');
    exit;
}

$data = $validator->getData();

file_put_contents('trips.txt', json_encode($data) . PHP_EOL, FILE_APPEND);

unset($_SESSION['errors'], $_SESSION['old']);

header('Location: main.php');
exit;
