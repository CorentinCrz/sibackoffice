<?php session_start();
if (isset($_POST['login']) && isset($_POST['password']))
{
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['password'] = $_POST['password'];
}
require_once "../../includes/connection.php";
require_once "../../includes/functions.php";
adminHead('Modification d\'une fiche pdf', '../');
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
    <form action="doedit.php" method="post">
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <label for="h1">h1</label> <input type="text" name="h1" required data-error="Ajoutez un titre" value="<?= $row['h1'] ?>"><br>
        <label for="p">p</label> <textarea type="text" name="p" required data-error="Ajoutez un p"><?= $row['p'] ?></textarea><br>
        <label for="url">url</label> <input type="text" name="url" required data-error="Ajoutez un alt" value="<?= $row['url'] ?>"><br>
        <input type="submit" value="Modifier">
    </form>
<?php
adminFoot();

