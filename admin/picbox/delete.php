<?php session_start();
if (isset($_POST['login']) && isset($_POST['password']))
{
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['password'] = $_POST['password'];
}
require_once "../../includes/connection.php";
require_once "../../includes/functions.php";
adminHead('Supression d\'une photographie', '../');
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
  `picbox`
WHERE
  `idpic` = :id
;";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $_GET['id'], PDO::PARAM_STR);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<form action="dodelete.php" method="post">
    <input type="hidden" name="id" value="<?=$_GET['id']?>">
    <label for="">Supprimer la photo : <?=$row['h1']?> ?</label><br>
    <input type="submit" value="Supprimer">
</form>
<?php
adminFoot();

