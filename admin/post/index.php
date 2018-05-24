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
?>
<section class="section">
    <h1 class="post">Fiches pratiques</h1>
    <a href="add.php">Ajouter une fiche</a>
    <div>
        <table cellspacing="0" cellpadding="0" width="100%">
            <tr>
                <th>Nom</th>
                <th>categorie</th>
                <th>Action</th>
            </tr>
            <?php postList($pdo, 1000000 ,''); ?>
        </table>
    </div>
</section>
<?php
adminFoot();

