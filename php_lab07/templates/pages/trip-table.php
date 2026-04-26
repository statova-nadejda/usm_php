<?php
/* @var array $escaper */
/* @var array $nextOrder */
?>

<div class="table-container">
    <h1>Saved Trips</h1>

    <?php if (empty($trips)): ?>
        <p class="empty-message">No trips found.</p>
    <?php else: ?>
        <table>
            <thead>
            <tr>
                <th>
                    <a href="?sort=title&order=<?= $nextOrder('title') ?>">Title</a>
                </th>
                <th>
                    <a href="?sort=destination&order=<?= $nextOrder('destination') ?>">Destination</a>
                </th>
                <th>
                    <a href="?sort=startDate&order=<?= $nextOrder('startDate') ?>">Start Date</a>
                </th>
                <th>
                    <a href="?sort=endDate&order=<?= $nextOrder('endDate') ?>">End Date</a>
                </th>
                <th>Description</th>
                <th>
                    <a href="?sort=budget&order=<?= $nextOrder('budget') ?>">Budget</a>
                </th>
                <th>
                    <a href="?sort=transport&order=<?= $nextOrder('transport') ?>">Transport</a>
                </th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($trips as $trip): ?>
                <tr>
                    <td><?= $escaper->escape($trip['title'] ?? '') ?></td>
                    <td><?= $escaper->escape($trip['destination'] ?? '') ?></td>
                    <td><?= $escaper->escape($trip['startDate'] ?? '') ?></td>
                    <td><?= $escaper->escape($trip['endDate'] ?? '') ?></td>
                    <td><?= $escaper->escape($trip['description'] ?? '') ?></td>
                    <td><?= $escaper->escape($trip['budget'] ?? '') ?></td>
                    <td><?= $escaper->escape($trip['transport'] ?? '') ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
