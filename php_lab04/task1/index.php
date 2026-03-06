<?php

declare(strict_types=1);

$transactions = [
    [
        "id" => 1,
        "date" => "2019-01-01",
        "amount" => 100.00,
        "description" => "Payment for groceries",
        "merchant" => "SuperMart",
    ],
    [
        "id" => 2,
        "date" => "2020-02-15",
        "amount" => 75.50,
        "description" => "Dinner with friends",
        "merchant" => "Local Restaurant",
    ],
    [
        "id" => 3,
        "date" => "2021-03-10",
        "amount" => 200.00,
        "description" => "Online shopping",
        "merchant" => "TechStore",
    ],
    [
        "id" => 4,
        "date" => "2022-04-05",
        "amount" => 50.00,
        "description" => "Gas station",
        "merchant" => "FuelCo",
    ],
    [
        "id" => 5,
        "date" => "2023-05-20",
        "amount" => 150.00,
        "description" => "Monthly subscription",
        "merchant" => "Streaming Service",
    ],
    [
        "id" => 6,
        "date" => "2024-06-15",
        "amount" => 300.00,
        "description" => "Electronics purchase",
        "merchant" => "Gadget World",
    ],
    [
        "id" => 7,
        "date" => "2024-07-01",
        "amount" => 25.00,
        "description" => "Coffee shop",
        "merchant" => "Cafe Delight",
    ]
];

/**
 * Вычисляет общую сумму всех транзакций.
 *
 * @param array $transactions Массив транзакций, каждая из которых содержит ключ 'amount'.
 * @return float Общая сумма всех транзакций.
 */
function calculateTotalAmount(array $transactions) : float {
    $totalAmount = 0;
    foreach($transactions as $transaction){
        $totalAmount += $transaction["amount"];
    }
    return $totalAmount;
}

/**
 * Ищет транзакцию по части описания.
 *
 * @param string $descriptionPart Часть строки описания для поиска.
 * @return array|null Найденная транзакция или null, если не найдена.
 */
function findTransactionByDescription(string $descriptionPart): ?array {
    global $transactions;
    foreach($transactions as $transaction){
        if(str_contains($transaction["description"], $descriptionPart))
                return $transaction;
    }
    return null;
}

/**
 * Ищет транзакцию по идентификатору.
 *
 * @param int $id Идентификатор транзакции.
 * @return array|null Найденная транзакция или null, если не найдена.
 */
function findTransactionById(int $id) : ?array{
    global $transactions;
    $result = array_filter($transactions, function($transaction) use ($id) {
        return $id === $transaction["id"];
    });

    $result = array_values($result);

    return $result[0] ?? null;
}

/**
 * Вычисляет количество дней с даты транзакции до сегодняшнего дня.
 *
 * @param string $date Дата транзакции в формате 'YYYY-MM-DD'.
 * @return int Количество дней с даты транзакции.
 */
function daysSinceTransaction(string $date) : int {
    $transactionDate = new DateTime($date);
    $today = new DateTime();

    return date_diff($transactionDate, $today)->days;
}

/**
 * Добавляет новую транзакцию в глобальный массив транзакций.
 *
 * @param int $id Идентификатор транзакции.
 * @param string $date Дата транзакции в формате 'YYYY-MM-DD'.
 * @param float $amount Сумма транзакции.
 * @param string $description Описание транзакции.
 * @param string $merchant Название продавца.
 * @return void
 */
function addTransaction(int $id, string $date, float $amount, string $description, string $merchant) : void {
    global $transactions;

    $transactions[] = [
            "id" => $id,
            "date" => $date,
            "amount" => $amount,
            "description" => $description,
            "merchant" => $merchant
    ];

}

/**
 * Сортирует глобальный массив транзакций по дате в порядке возрастания.
 *
 * @return void
 */
function sortArrayByDate() : void {
    global $transactions;

    usort($transactions, function($a, $b) {
        return $a["date"] <=> $b["date"];
    });
}

/**
 * Сортирует глобальный массив транзакций по сумме в порядке убывания.
 *
 * @return void
 */
function sortArrayBySumDescending() : void {
    global $transactions;

    usort($transactions, function($a, $b){
        return $b["amount"] <=> $a["amount"];
    });
}



?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Lab03</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<table>
    <thead>
    <tr>
        <td><b>Id</b></td>
        <td><b>Date</b></td>
        <td><b>Amount</b></td>
        <td><b>Description</b></td>
        <td><b>Merchant</b></td>
        <td><b>Days</b></td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($transactions as $transaction): ?>
        <tr>
            <td><?= $transaction["id"]?></td>
            <td><?= $transaction["date"] ?></td>
            <td><?= $transaction["amount"] ?></td>
            <td><?= $transaction["description"] ?></td>
            <td><?= $transaction["merchant"] ?></td>
            <td><?= daysSinceTransaction($transaction["date"]) ?></td>
        </tr>
    <?php endforeach; ?>

    <tr>
        <td colspan="2"><b>Total</b></td>
        <td><?= calculateTotalAmount($transactions) ?></td>
    </tr>
    </tbody>
</table>
</body>
</html>