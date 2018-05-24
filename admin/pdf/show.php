<?php session_start();
if (isset($_POST['login']) && isset($_POST['password']))
{
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['password'] = $_POST['password'];
}
require_once "../../includes/connection.php";
require_once "../../includes/functions.php";
adminHead('Listes des fiches pdf', '../');
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
  `h1`,
  `p`,
  `url`
FROM
  `pdf`
WHERE
  `idpdf` = :id
;";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $_GET['id'], PDO::PARAM_STR);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<div style="text-align: center">
    <h1>Titre : <?= $row['h1'] ?></h1>
    <p>Résumé : <?= $row['p'] ?></p>
    <p>Lien : <?= $row['url'] ?></p>
</div>
<?php
adminFoot();

