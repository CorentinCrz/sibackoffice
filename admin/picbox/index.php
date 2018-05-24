<?php session_start();
if (isset($_POST['login']) && isset($_POST['password']))
{
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['password'] = $_POST['password'];
}
require_once "../../includes/connection.php";
require_once "../../includes/functions.php";
adminHead('Listes des partenaires');
if ((!isset($_SESSION['login']) || !isset($_SESSION['password'])) || adminSession($pdo, $_SESSION['login'], $_SESSION['password']))
{
    adminConnection();
    exit;
}
?>
<section style="section">
    <h1 style="pdf">Nos partenaires</h1>
    <a href="add.php">Ajouter un partenaire</a>
    <div>
        <table>
            <tr>
                <th>Nom</th>
                <th>Action</th>
            </tr>
            <?php partnerList($pdo, 1000000); ?>
        </table>
    </div>
</section>
<?php
adminFoot();

