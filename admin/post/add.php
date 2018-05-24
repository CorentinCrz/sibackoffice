<?php session_start();
if (isset($_POST['login']) && isset($_POST['password']))
{
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['password'] = $_POST['password'];
}
require_once "../../includes/connection.php";
require_once "../../includes/functions.php";
adminHead('Ajout des fiches pratiques', '../');
if ((!isset($_SESSION['login']) || !isset($_SESSION['password'])) || adminSession($pdo, $_SESSION['login'], $_SESSION['password']))
{
    adminConnection();
    exit;
}
?>
    <form action="doadd.php" method="post" enctype="multipart/form-data">
        <label for="slug">slug</label> <input type="text" name="slug" required data-error="Sélectionnez un slug"><br>
        <label for="title">title</label> <input type="text" name="title" required data-error="Sélectionnez un titre"><br>
        <label for="category">category</label> <input type="text" name="category" required data-error="Sélectionnez une categorie"><br>
        <label for="h1">h1</label> <input type="text" name="h1" required data-error="Ajoutez un h1"><br>
        <label for="p">p</label> <textarea type="text" name="p" required data-error="Ajoutez un p"></textarea><br>
        <label for="imgalt">imgalt</label> <input type="text" name="imgalt" required data-error="Ajoutez un alt"><br>
        <label for="imgsrc">imgsrc</label> <input type="file" name="imgsrc" required data-error="Ajoutez une image"><br>
        <label for="url">url</label> <input type="text" name="url" required data-error="Ajoutez un lien"><br>
        <input type="submit" value="Ajouter">

    </form>
<?php
adminFoot();


