<?php session_start();
if (!isset($_POST['id'])) {
    header('Location: index.php?nopostdata');
    exit;
}
require_once "../../includes/connection.php";
$sql = "DELETE FROM
`picbox`
WHERE
`idpic` = :id
;";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $_POST['id'], PDO::PARAM_STR);
$stmt->execute();
header('Location: ../');
