<?php

require_once __DIR__ . '/vendor/autoload.php';

//use User\PhpLab07\HtmlEscaper;
//use User\PhpLab07\Renderer;
//use User\PhpLab07\LayoutRenderer;

use User\PhpLab07\View;
use User\PhpLab07\TwigRenderer;

session_start();

$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];

unset($_SESSION['errors'], $_SESSION['old']);

//$escaper = new HtmlEscaper();
//$baseRenderer = new Renderer(__DIR__ . '/templates);
//$renderer = new LayoutRenderer($baseRenderer, 'layouts/form-layout');

$renderer = new TwigRenderer(__DIR__ . '/templates');

$view = new View('pages/trip-form', [
    'errors' => $errors,
    'old' => $old,
    //'escaper' => $escaper,
]);

echo $renderer->render($view);