<?php session_start();
if (isset($_POST['login']) && isset($_POST['password']))
{
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['password'] = $_POST['password'];
}
require_once "../../includes/connection.php";
require_once "../../includes/functions.php";
adminHead('Ajout des photographies', '../');
if ((!isset($_SESSION['login']) || !isset($_SESSION['password'])) || adminSession($pdo, $_SESSION['login'], $_SESSION['password']))
{
    adminConnection();
    exit;
}
?>
    <form action="doadd.php" method="post" enctype="multipart/form-data">
        <label for="h1">h1</label> <input type="text" name="h1" required data-error="Ajoutez un titre"><br>
        <label for="imgalt">imgalt</label> <input type="text" name="imgalt" required data-error="Ajoutez un alt"><br>
        <label for="imgsrc">imgsrc</label> <input type="file" name="imgsrc" required data-error="Ajoutez une image"><br>
        <input type="submit" value="Ajouter">
    </form>
<?php
adminFoot();


