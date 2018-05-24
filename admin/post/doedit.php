<?php session_start();
if (!isset($_POST['id'])) {
    header('Location: index.php?error=noidprovided');
    exit;
}
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
  `post`
SET
  `slug` = :slug,
  `title` = :title,
  `category` = :category,
  `h1` = :h1,
  `p` = :p,
  `imgalt` = :imgalt,
  `imgsrc` = :imgsrc,
  `url` = :url
WHERE
  `idpost` = :idpost
;";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':idpost', $_POST['id'], PDO::PARAM_STR);
$stmt->bindValue(':slug', htmlentities($_POST['slug']), PDO::PARAM_STR);
$stmt->bindValue(':title', htmlentities($_POST['title']), PDO::PARAM_STR);
$stmt->bindValue(':category', htmlentities($_POST['category']), PDO::PARAM_STR);
$stmt->bindValue(':h1', htmlentities($_POST['h1']), PDO::PARAM_STR);
$stmt->bindValue(':p', htmlentities($_POST['p']), PDO::PARAM_STR);
$stmt->bindValue(':imgalt', htmlentities($_POST['imgalt']), PDO::PARAM_STR);
$stmt->bindValue(':imgsrc', $url1, PDO::PARAM_STR);
$stmt->bindValue(':url', htmlentities($_POST['url']), PDO::PARAM_STR);
$stmt->execute();
header('Location: show.php?id='.$pdo->lastInsertId());
