<?php session_start();
if (isset($_POST['login']) && isset($_POST['password']))
{
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['password'] = $_POST['password'];
}
require_once "../../includes/connection.php";
require_once "../../includes/functions.php";
adminHead('Supresssion d\'une fiche top', '../');
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
  `h1`
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
<form action="dodelete.php" method="post">
    <input type="hidden" name="id" value="<?=$_GET['id']?>">
    <label for="">Supprimer <?=$row['h1']?> du top ?</label><br>
    <input type="submit" value="Supprimer">
</form>
<?php
adminFoot();

