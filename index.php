<!doctype html>
<html lang="ru">
<head>
    <title>Домашнее задание к лекции 4.4 «Управление таблицами и базами данных»</title>
</head>
<body>

<?php
error_reporting(E_ALL);

$servername = "localhost";
$dbname = "edevyaterikova";
$username = "edevyaterikova";
$password = "neto1390";

$pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
if (!$pdo) {
    die('Could not connect');
}
//Создать новую таблицу через php;
$table = 'contacts';
$columnsArr = ['id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY',
                'first_name VARCHAR(150) NOT NULL',
                'last_name VARCHAR(150) NOT NULL',
                'city VARCHAR(150) NOT NULL',
                'street_address VARCHAR(150) NOT NULL',
                'country VARCHAR(250) NOT NULL',
                'email VARCHAR(50) NOT NULL UNIQUE',
                'phone_number INT(25) NOT NULL'];
$columns = implode(', ', $columnsArr);

try {
    $sql = "CREATE TABLE IF NOT EXISTS $table ( " . $columns . ' )';
    $pdo->exec($sql);
    echo "Таблица $table создана успешно.<br>";
}
catch (Exception $e) {
    echo 'Ошибка ',  $e->getMessage();
}
//Сделать страницу где будет список таблиц текущей базы.
?>
<a href="list.php">Список таблиц</a>
</body>
</html>