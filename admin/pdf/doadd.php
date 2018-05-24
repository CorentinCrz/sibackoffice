<?php session_start();
if (!isset($_POST['h1']) || !isset($_POST['url']) || !isset($_POST['p']) ) {
    header('Location: index.php?nopostdata');
    exit;
}
require_once "../../includes/connection.php";
$sql = "INSERT INTO `pdf`(
  `h1`,
  `url`,
  `p`
)
VALUES(
  :h1,
  :url,
  :p
)
;";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':h1', htmlentities($_POST['h1']), PDO::PARAM_STR);
$stmt->bindValue(':url', htmlentities($_POST['url']), PDO::PARAM_STR);
$stmt->bindValue(':p', htmlentities($_POST['p']), PDO::PARAM_STR);
$stmt->execute();
header('Location: ../');
