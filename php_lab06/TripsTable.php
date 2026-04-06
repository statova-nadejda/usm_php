<?php

/**
 * Table for displaying saved trips with sorting capability.
 */

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
        $valueA = (float) $valueA;
        $valueB = (float) $valueB;
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
 * @param string $currentSort Current sort field
 * @param string $currentOrder Current order (asc/desc)
 * @param string $field Field to sort by
 * @return string Next order (asc/desc)
 */
function nextOrder(string $currentSort, string $currentOrder, string $field): string
{
    if ($currentSort === $field && $currentOrder === 'asc') {
        return 'desc';
    }

    return 'asc';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trips Table</title>
    <link rel="stylesheet" href="table-style.css">
</head>
<body>

<div class="table-container">
    <h1>Saved Trips</h1>

    <?php if (empty($trips)): ?>
        <p class="empty-message">No trips found.</p>
    <?php else: ?>
        <table>
            <thead>
            <tr>
                <th>
                    <a href="?sort=title&order=<?= nextOrder($sort, $order, 'title') ?>">Title</a>
                </th>
                <th>
                    <a href="?sort=destination&order=<?= nextOrder($sort, $order, 'destination') ?>">Destination</a>
                </th>
                <th>
                    <a href="?sort=startDate&order=<?= nextOrder($sort, $order, 'startDate') ?>">Start Date</a>
                </th>
                <th>
                    <a href="?sort=endDate&order=<?= nextOrder($sort, $order, 'endDate') ?>">End Date</a>
                </th>
                <th>Description</th>
                <th>
                    <a href="?sort=budget&order=<?= nextOrder($sort, $order, 'budget') ?>">Budget</a>
                </th>
                <th>
                    <a href="?sort=transport&order=<?= nextOrder($sort, $order, 'transport') ?>">Transport</a>
                </th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($trips as $trip): ?>
                <tr>
                    <td><?= htmlspecialchars($trip['title'] ?? '') ?></td>
                    <td><?= htmlspecialchars($trip['destination'] ?? '') ?></td>
                    <td><?= htmlspecialchars($trip['startDate'] ?? '') ?></td>
                    <td><?= htmlspecialchars($trip['endDate'] ?? '') ?></td>
                    <td><?= htmlspecialchars($trip['description'] ?? '') ?></td>
                    <td><?= htmlspecialchars($trip['budget'] ?? '') ?></td>
                    <td><?= htmlspecialchars($trip['transport'] ?? '') ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

</body>
</html>