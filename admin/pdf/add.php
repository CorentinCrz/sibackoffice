<?php session_start();
if (isset($_POST['login']) && isset($_POST['password']))
{
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['password'] = $_POST['password'];
}
require_once "../../includes/connection.php";
require_once "../../includes/functions.php";
adminHead('Ajout des fiches pdf', '../');
if ((!isset($_SESSION['login']) || !isset($_SESSION['password'])) || adminSession($pdo, $_SESSION['login'], $_SESSION['password']))
{
    adminConnection();
    exit;
}
?>
    <form action="doadd.php" method="post">
        <label for="url">url</label> <input type="text" name="url" required data-error="Ajoutez un lien"><br>
        <label for="h1">h1</label> <input type="text" name="h1" required data-error="Ajoutez un titre"><br>
        <label for="p">p</label> <textarea type="text" name="p" required data-error="Ajoutez un p"></textarea><br>
        <input type="submit" value="Ajouter">
    </form>
<?php
adminFoot();


