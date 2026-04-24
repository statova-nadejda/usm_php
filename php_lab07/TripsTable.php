<?php

/**
 *
 * Table for displaying saved trips with sorting capability.
 */
require_once __DIR__ . '/vendor/autoload.php';

use User\PhpLab07\HtmlEscaper;
use User\PhpLab07\LayoutRenderer;
use User\PhpLab07\Renderer;
use User\PhpLab07\View;

$trips = [];
$fileName = 'trips.txt';

if (file_exists($fileName)) {
    $lines = file($fileName, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        $trip = json_decode($line, true);

        if (is_array($trip)) {
            $trips[] = $trip;
        }
    }
}

$sort = $_GET['sort'] ?? 'startDate';
$order = $_GET['order'] ?? 'desc';

$allowedSortFields = ['title', 'destination', 'startDate', 'endDate', 'budget', 'transport'];

if (!in_array($sort, $allowedSortFields, true)) {
    $sort = 'startDate';
}

if ($order !== 'asc' && $order !== 'desc') {
    $order = 'desc';
}

usort($trips, function ($a, $b) use ($sort, $order) {
    $valueA = $a[$sort] ?? '';
    $valueB = $b[$sort] ?? '';

    if (in_array($sort, ['budget'], true)) {
        $valueA = (float)$valueA;
        $valueB = (float)$valueB;
    }

    if (in_array($sort, ['startDate', 'endDate', 'createdAt'], true)) {
        $valueA = strtotime($valueA);
        $valueB = strtotime($valueB);
    }

    if ($valueA == $valueB) {
        return 0;
    }

    if ($order === 'asc') {
        return ($valueA < $valueB) ? -1 : 1;
    }

    return ($valueA > $valueB) ? -1 : 1;
});

/**
 * Determines the next sort order for a column.
 * @param string $field Field to sort by
 * @return string Next order (asc/desc)
 */
$nextOrder = function (string $field) use ($sort, $order): string {
    if ($sort === $field && $order === 'asc') {
        return 'desc';
    }

    return 'asc';
};

$escaper = new HtmlEscaper();

$baseRenderer = new Renderer(__DIR__ . '/views');
$renderer = new LayoutRenderer($baseRenderer, 'layouts/table-layout');

$view = new View('pages/trip-table', [
        'trips' => $trips,
        'sort' => $sort,
        'order' => $order,
        'nextOrder' => $nextOrder,
        'escaper' => $escaper,

]);

echo $renderer->render($view);

