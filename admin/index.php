<?php session_start();
define('APP_ROOT_DIR', dirname(__DIR__));
if (isset($_POST['login']) && isset($_POST['password']))
{
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['password'] = $_POST['password'];
}
require_once "../includes/connection.php";
require_once "../includes/functions.php";
adminHead('Admin', '');
if ((!isset($_SESSION['login']) || !isset($_SESSION['password'])) || adminSession($pdo, $_SESSION['login'], $_SESSION['password']))
{
    adminConnection();
    exit;
}
?>
<section class="section">
    <h1 class="post">Fiches pratiques</h1>
    <div class="flexbet">
        <a href="post/add.php">Ajouter une fiche</a>
        <a href="post/" class="linkList">Voir la liste complete des fiches pratiques</a>
    </div>
    <div>
        <table cellspacing="0" cellpadding="0" width="100%">
            <tr>
                <th>Nom</th>
                <th>categorie</th>
                <th>Action</th>
            </tr>
            <?php postList($pdo, 10, 'post/'); ?>
        </table>
    </div>
</section>

<section class="section">
    <h1 class="post">Les top 100</h1>
    <div class="flex">
        <div class="top">
            <h2>Meilleurs Hôtels</h2>
            <a href="top/?cat=hotel">Modifier le top des hôtels</a>
        </div>
        <div class="top">
            <h2>Meilleurs Restaurants</h2>
            <a href="top/?cat=rest">Modifier le top des Restaurants</a>
        </div>
        <div class="top">
            <h2>Meilleurs SPAs &amp; Thalassos</h2>
            <a href="top/?cat=spa">Modifier le top des SPAs et Thalassos</a>
        </div>
    </div>
</section>

<section class="section">
    <h1 class="pdf">Fiches pdf Calameo</h1>
    <div class="flexbet">
        <a href="pdf/add.php">Ajouter une fiche</a>
        <a href="pdf/" class="linkList">Voir la liste complete des fiches pdf</a>
    </div>
    <div>
        <table cellspacing="0" cellpadding="0" width="100%">
            <tr>
                <th>Nom</th>
                <th>Action</th>
            </tr>
            <?php pdfList($pdo, 10, 'pdf/'); ?>
        </table>
    </div>
</section>

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
            <?php picboxList($pdo,  'picbox/'); ?>
        </table>
    </div>
</section>

<?php
adminFoot();


