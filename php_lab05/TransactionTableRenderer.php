<?php
declare(strict_types=1);

namespace php_lab05;

final class TransactionTableRenderer
{
    public function render(array $transactions): string
    {
        ob_start();
        ?>
        <!DOCTYPE html>
        <html lang="ru">
        <head>
            <meta charset="UTF-8">
            <title>Lab05</title>
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
        <table>
            <tr>
                <td>№</td>
                <td><b>Дата</b></td>
                <td><b>Количество</b></td>
                <td><b>Описание</b></td>
                <td><b>Merchant</b></td>
                <td><b>Дни с транзакции</b></td>
            </tr>

            <?php foreach ($transactions as $transaction): ?>
                <tr>
                    <td><?= $transaction->getId() ?></td>
                    <td><?= $transaction->getDate()->format('Y-m-d') ?></td>
                    <td><?= $transaction->getAmount() ?></td>
                    <td><?= $transaction->getDescription() ?></td>
                    <td><?= $transaction->getMerchant() ?></td>
                    <td><?= $transaction->getDaysSinceTransaction() ?></td>
                </tr>
            <?php endforeach; ?>

        </table>
        </body>
        </html>
        <?php

        return ob_get_clean();
    }
}