<?php session_start();
if (!isset($_POST['id'])) {
    header('Location: index.php?error=noidprovided');
    exit;
}
require_once "../../includes/connection.php";
$sql = "UPDATE
  `pdf`
SET
  `h1` = :h1,
  `p` = :p,
  `url` = :url
WHERE
  `idpdf` = :id
;";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', htmlentities($_POST['id']), PDO::PARAM_STR);
$stmt->bindValue(':h1', htmlentities($_POST['h1']), PDO::PARAM_STR);
$stmt->bindValue(':url', htmlentities($_POST['url']), PDO::PARAM_STR);
$stmt->bindValue(':p', htmlentities($_POST['p']), PDO::PARAM_STR);
$stmt->execute();
header('Location: ../');
