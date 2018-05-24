<?php session_start();
if (!isset($_POST['title']) || !isset($_POST['h1']) ) {
    header('Location: index.php?nopostdata');
    exit;
}
$img = $_FILES['imgsrc'];
$extension = strrchr($img['name'], '.');
$condition = array('.png','.jpg','.jpeg');
if (!(in_array($extension, $condition) || ($img['error'] === 0))) {
    $error = 'Il y a un probleme avec votre image';
//    header('Location: index.php?nopicdata');
    exit;
}
$url1 = "image/" . $img['name'];
move_uploaded_file($img['tmp_name'], $url1);

require_once "../../includes/connection.php";
$sql = "INSERT INTO `post`(
`slug`,
  `title`,
  `category`,
  `h1`,
  `p`,
  `imgalt`,
  `imgsrc`,
  `url`
)
VALUES(
  :slug,
  :title,
  :category,
  :h1,
  :p,
  :imgalt,
  :imgsrc,
  :url
)
;";
$stmt = $pdo->prepare($sql);
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
