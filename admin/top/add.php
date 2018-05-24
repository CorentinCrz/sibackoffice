<?php session_start();
if (isset($_POST['login']) && isset($_POST['password']))
{
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['password'] = $_POST['password'];
}
require_once "../../includes/connection.php";
require_once "../../includes/functions.php";
adminHead('Ajout des fiches dans un top', '../');
if ((!isset($_SESSION['login']) || !isset($_SESSION['password'])) || adminSession($pdo, $_SESSION['login'], $_SESSION['password']))
{
    adminConnection();
    exit;
}
$cat = $_GET['cat'];
switch ($cat) {
    case "hotel":
        $cat = 'Hôtel';
        break;

    case "rest":
        $cat = 'Restaurants';
        break;

    case "spa":
    default:
        $cat = 'SPAs et Thalassos';
        break;
}
?>
    <form action="doadd.php" method="post">
        <label for="category">category</label>
        <select name="category" id="type-profil" required data-error="Sélectionnez un profil">
            <option value="" disabled selected>Vous êtes : </option>
            <option value="Hotel">Hotel</option>
            <option value="Restaurants">Restaurants</option>
            <option value="SPAs et Thalassos">SPAs et Thalassos</option>
        </select><br>
        <label for="top">top</label> <input type="text" name="top" required data-error="Sélectionnez une place"><br>
        <label for="idpost">idpost</label> <input type="text" name="idpost" required data-error="Sélectionnez un id de post"><br>
        <input type="submit" value="Ajouter">
    </form>
<?php
adminFoot();


