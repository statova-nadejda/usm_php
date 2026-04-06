<?php

namespace php_lab06;

session_start();

require_once 'ValidatorInterface.php';
require_once 'RequiredValidator.php';
require_once 'LengthValidator.php';
require_once 'DateValidator.php';
require_once 'DateOrderValidator.php';
require_once 'NumericValidator.php';
require_once 'TransportValidator.php';
require_once 'TripFormValidator.php';

$validator = new TripFormValidator($_POST);

$_SESSION['old'] = $validator->getData();

if (!$validator->validate()) {
    $_SESSION['errors'] = $validator->errors();
    header('Location: main.php');
    exit;
}

$data = $validator->getData();

file_put_contents('trips.txt', json_encode($data) . PHP_EOL, FILE_APPEND);

unset($_SESSION['errors'], $_SESSION['old']);

header('Location: main.php');
exit;