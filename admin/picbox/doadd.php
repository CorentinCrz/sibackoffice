<?php session_start();
if (!isset($_POST['h1']) || !isset($_POST['imgalt']) ) {
    header('Location: index.php?nopostdata');
    exit;
}
$img = $_FILES['imgsrc'];
$extension = strrchr($img['name'], '.');
$condition = array('.png','.jpg','.jpeg');
if (!(in_array($extension, $condition) || ($img['error'] === 0))) {
    $error = 'Il y a un probleme avec votre image';
    header('Location: index.php?nopicdata');
    exit;
}
$url1 = "image/" . $img['name'];
move_uploaded_file($img['tmp_name'], "../../".$url1);

require_once "../../includes/connection.php";
$sql = "INSERT INTO `picbox`(
  `h1`,
  `imgalt`,
  `imgsrc`
)
VALUES(
  :h1,
  :imgalt,
  :imgsrc
)
;";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':h1', htmlentities($_POST['h1']), PDO::PARAM_STR);
$stmt->bindValue(':imgalt', htmlentities($_POST['imgalt']), PDO::PARAM_STR);
$stmt->bindValue(':imgsrc', $url1, PDO::PARAM_STR);
$stmt->execute();
header('Location: ../');
