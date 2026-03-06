<?php
$dir = './images/';
$files = scandir($dir);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Галерея изображений</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        header, footer { background: #333; color: white; padding: 15px; text-align: center; }
        nav { background: #555; color: white; padding: 10px; text-align: center; }
        nav a { color: white; margin: 0 10px; text-decoration: none; }
        main { padding: 20px; display: flex; flex-wrap: wrap; justify-content: center; }
        img { width: 250px; height: 250px; margin: 5px; border: 1px solid #ccc; }
    </style>
</head>
<body>

<header>
    <h1>Моя Галерея</h1>
</header>

<nav>
    <a href="#">Главная</a>
    <a href="#">О нас</a>
    <a href="#">Контакты</a>
</nav>

<main>
    <?php
    if ($files !== false) {
        foreach ($files as $file) {
            if ($file != "." && $file != "..") {
                $path = $dir . $file;
                ?>
                <img src="<?= $path ?>" alt="<?= $file ?>">
                <?php
            }
        }
    }
    ?>
</main>
</body>
</html>