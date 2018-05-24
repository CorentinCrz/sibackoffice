<?php
require_once "../includes/connection.php";
$sql = "SELECT
    *
    FROM
    `admin`
    ;";
$stmt = $pdo->prepare($sql);
$stmt->execute();
while(false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)):
    echo $row['login'];
endwhile;