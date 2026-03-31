<?php
declare(strict_types=1);
namespace php_lab05;
use DateTime;
require_once 'Transaction.php';
require_once 'TransactionRepository.php';
require_once 'TransactionTableRenderer.php';

$transactions = [
    new Transaction(1, new DateTime('2024-01-10'), 150.50, 'Покупка продуктов', 'Supermarket'),
    new Transaction(2, new DateTime('2024-02-05'), 320.00, 'Оплата аренды', 'Landlord'),
    new Transaction(3, new DateTime('2024-03-12'), 45.99, 'Кофе и десерт', 'Cafe'),
    new Transaction(4, new DateTime('2024-04-01'), 1200.00, 'Зарплата', 'Company'),
    new Transaction(5, new DateTime('2024-05-20'), 89.75, 'Одежда', 'Zara'),
    new Transaction(6, new DateTime('2024-06-15'), 60.00, 'Такси', 'Uber'),
    new Transaction(7, new DateTime('2024-07-03'), 200.00, 'Ремонт', 'Service Center'),
    new Transaction(8, new DateTime('2024-08-22'), 15.30, 'Мороженое', 'IceCream Shop'),
    new Transaction(9, new DateTime('2024-09-10'), 500.00, 'Курс обучения', 'Online School'),
    new Transaction(10, new DateTime('2024-10-05'), 75.00, 'Кино', 'Cinema'),
];

$repository = new TransactionRepository();

foreach($transactions as $transaction){
    $repository->addTransaction($transaction);
}

$transactions = $repository->getTransactions();

$renderer = new TransactionTableRenderer();
echo $renderer->render($transactions);


