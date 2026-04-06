<?php

namespace php_lab06;

require_once 'Trip.php';
require_once 'TripRender.php';

$renderer = new TripRender();

echo $renderer->render();