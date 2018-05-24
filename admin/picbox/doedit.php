<?php session_start();
if (!isset($_POST['id'])) {
    header('Location: index.php?error=noidprovided');
    exit;
}
//var_dump($_POST);
$img = $_FILES['imgsrc'];
$extension = strrchr($img['name'], '.');
$condition = array('.png','.jpg','.jpeg');
if ($img['name'] !== ''){
    if (!(in_array($extension, $condition) || ($img['error'] === 0))) {
        $error = 'Il y a un probleme avec votre image';
    header('Location: index.php?nopicdata');
        exit;
    }
    $url1 = "image/" . $img['name'];
    move_uploaded_file($img['tmp_name'], "../../".$url1);
} else {
    $url1 = $_POST['imgsrc'];
}
require_once "../../includes/connection.php";
$sql = "UPDATE
  `picbox`
SET
  `h1` = :h1,
  `imgalt` = :imgalt,
  `imgsrc` = :imgsrc
WHERE
  `idpic` = :id
;";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', htmlentities($_POST['id']), PDO::PARAM_STR);
$stmt->bindValue(':h1', htmlentities($_POST['h1']), PDO::PARAM_STR);
$stmt->bindValue(':imgalt', htmlentities($_POST['imgalt']), PDO::PARAM_STR);
$stmt->bindValue(':imgsrc', $url1, PDO::PARAM_STR);
$stmt->execute();
header('Location: ../');
