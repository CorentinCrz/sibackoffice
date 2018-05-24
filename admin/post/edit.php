<?php session_start();
if (isset($_POST['login']) && isset($_POST['password']))
{
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['password'] = $_POST['password'];
}
require_once "../../includes/connection.php";
require_once "../../includes/functions.php";
adminHead('Modification d\'une fiche pratique', '../');
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
    <form action="doedit.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <input type="hidden" name="imgsrc" value="<?= $row['imgsrc'] ?>">
        <label for="slug">slug</label> <input type="text" name="slug" required data-error="Sélectionnez un slug" value="<?= $row['slug'] ?>"><br>
        <label for="title">title</label> <input type="text" name="title" required data-error="Sélectionnez un titre" value="<?= $row['title'] ?>"><br>
        <label for="category">category</label> <input type="text" name="category" required data-error="Sélectionnez une categorie" value="<?= $row['category'] ?>"><br>
        <label for="h1">h1</label> <input type="text" name="h1" required data-error="Ajoutez un h1" value="<?= $row['h1'] ?>"><br>
        <label for="p">p</label> <textarea type="text" name="p" required data-error="Ajoutez un p"><?= $row['p'] ?></textarea><br>
        <label for="imgalt">imgalt</label> <input type="text" name="imgalt" required data-error="Ajoutez un alt" value="<?= $row['imgalt'] ?>"><br>
        <label for="imgsrc">changer d'image</label> <input type="file" name="imgsrc" data-error="Ajoutez une image"><br>
        <label for="url">url</label> <input type="text" name="url" required data-error="Ajoutez un lien" value="<?= $row['url'] ?>"><br>
        <input type="submit" value="Ajouter">
    </form>
<?php
adminFoot();

