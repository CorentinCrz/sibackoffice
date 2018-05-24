<?php session_start();
if (!isset($_POST['idtop'])) {
    header('Location: index.php?error=noidprovided');
    exit;
}
require_once "../../includes/connection.php";
$sql = "UPDATE
  `top`
SET
  `top` = :top
WHERE
  `idtop` = :idtop
;";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':idtop', $_POST['idtop'], PDO::PARAM_STR);
$stmt->bindValue(':top', $_POST['top'], PDO::PARAM_STR);
$stmt->execute();
header('Location: index.php');
