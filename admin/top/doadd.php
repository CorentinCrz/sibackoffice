<?php session_start();
if (!isset($_POST['category']) || !isset($_POST['top'])  || !isset($_POST['idpost']) ) {
    header('Location: index.php?nopostdata');
    exit;
}
require_once "../../includes/connection.php";
$sql = "INSERT INTO `top`(
  `category`,
  `top`,
  `idpost`
)
VALUES(
  :category,
  :top,
  :idpost
)
;";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':category', htmlentities($_POST['category']), PDO::PARAM_STR);
$stmt->bindValue(':top', htmlentities($_POST['top']), PDO::PARAM_STR);
$stmt->bindValue(':idpost', htmlentities($_POST['idpost']), PDO::PARAM_STR);
$stmt->execute();
header('Location: index.php');
