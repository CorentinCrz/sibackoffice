<?php session_start();
if (isset($_POST['login']) && isset($_POST['password']))
{
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['password'] = $_POST['password'];
}
require_once "../../includes/connection.php";
require_once "../../includes/functions.php";
adminHead('Listes des photographies', '../');
if ((!isset($_SESSION['login']) || !isset($_SESSION['password'])) || adminSession($pdo, $_SESSION['login'], $_SESSION['password']))
{
    adminConnection();
    exit;
}
?>
    <section class="section">
        <h1 class="picbox">La Boîte à image</h1>
        <a href="picbox/add.php">Ajouter une image</a>
        <div>
            <table cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <th>Nom</th>
                    <th>alt</th>
                    <th>src</th>
                    <th>Action</th>
                </tr>
                <?php picboxList($pdo,  ''); ?>
            </table>
        </div>
    </section>
<?php
adminFoot();

