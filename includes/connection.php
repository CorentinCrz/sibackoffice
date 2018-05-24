<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=uadv_db', 'root', 'root');
    $pdo->exec("SET NAMES UTF8");
} catch (PDOException $exception) {
    die($exception->getMessage());
}
