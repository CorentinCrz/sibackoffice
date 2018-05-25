<?php session_start();
if (isset($_POST['login']) && isset($_POST['password']))
{
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['password'] = $_POST['password'];
}
require_once "../../includes/connection.php";
require_once "../../includes/functions.php";
adminHead('Listes des fiches pratiques', '../');
if ((!isset($_SESSION['login']) || !isset($_SESSION['password'])) || adminSession($pdo, $_SESSION['login'], $_SESSION['password']))
{
    adminConnection();
    exit;
}
if (!isset($_GET['id'])) {
    header('Location: index.php?error=noidprovided');
    exit;
}
$sql = "SELECT
  `slug`,
  `title`,
  `category`,
  `h1`,
  `p`,
  `imgalt`,
  `imgsrc`,
  `url`
FROM
  `post`
WHERE
  `idpost` = :idpost
;";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':idpost', $_GET['id'], PDO::PARAM_STR);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
    <div style="text-align: center">
        <h1>Slug : <?= $row['slug'] ?></h1>
        <h1>Titre de la page : <?= $row['title'] ?></h1>
        <h1>Titre : <?= $row['h1'] ?></h1>
        <p>Catégorie : <?= $row['category'] ?><br>
        Contenu : <?= $row['p'] ?><br>
        Image alt : <?= $row['imgalt'] ?><br>
        Image source : <?= $row['imgsrc'] ?><br>
        Lien : <?= $row['url'] ?></p>
    </div>
<?php
adminFoot();

