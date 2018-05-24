<?php session_start();
if (isset($_POST['login']) && isset($_POST['password']))
{
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['password'] = $_POST['password'];
}
if (isset($_GET['cat']))
{
    $cat = $_GET['cat'];
} else {
    $cat = 'hotel';
}


switch ($cat) {
    case "hotel":
        $cat = 'Hotel';
        break;

    case "rest":
        $cat = 'Restaurants';
        break;

    case "spa":
    default:
        $cat = 'SPAs et Thalassos';
        break;
}
require_once "../../includes/connection.php";
require_once "../../includes/functions.php";
adminHead('Top 100 des meilleurs '.$cat, '../');
if ((!isset($_SESSION['login']) || !isset($_SESSION['password'])) || adminSession($pdo, $_SESSION['login'], $_SESSION['password']))
{
    adminConnection();
    exit;
}
?>
    <section class="section">
        <h1 class="post">Les top 100</h1>
        <div class="flex">
            <div class="top">
                <h2>Meilleurs Hôtels</h2>
                <a href="?cat=hotel">Modifier le top des hôtels</a>
            </div>
            <div class="top">
                <h2>Meilleurs Restaurants</h2>
                <a href="?cat=rest">Modifier le top des Restaurants</a>
            </div>
            <div class="top">
                <h2>Meilleurs SPAs &amp; Thalassos</h2>
                <a href="?cat=spa">Modifier le top des SPAs et Thalassos</a>
            </div>
        </div>
        <div>
            <h1 style="font-size: 1.6rem;">Les Meilleurs <?= $cat ?></h1>
            <a href="add.php">Ajouter au top</a>
            <table cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <th>Top</th>
                    <th>Nom</th>
                    <th>Action</th>
                </tr>
                <?php
                $sql = "SELECT
                `idtop`,
                `top`,
                `idpost`
                FROM
                `top`
                WHERE
                `category` = :category
                ORDER BY top
                ASC LIMIT 0, 100
                ;
                ";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(':category', $cat, PDO::PARAM_STR);
                $stmt->execute();
                while(false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)):
                    $sql = "SELECT
                      `h1`
                    FROM
                      `post`
                    WHERE
                      `idpost` = :idpost
                    ;";
                    $stmt2 = $pdo->prepare($sql);
                    $stmt2->bindValue(':idpost', $row['idpost'], PDO::PARAM_STR);
                    $stmt2->execute();
                    $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
                ?>
                <tr>
                    <form action="doedit.php" method="post">
                        <td><label for="top">Top</label> <input type="text" name="top" value="<?=$row['top']?>"></td>
                        <td><?=$row2['h1']?></td>
                        <td>
                            <a href="delete.php?id=<?=$row['idpost']?>">Supprimer</a>
                            <input type="hidden" name="idtop" value="<?=$row['idtop']?>">
                            <input type="submit" value="Modifier">
                        </td>
                    </form>
                </tr>
                <?php endwhile;?>
            </table>
        </div>
    </section>
<?php
adminFoot();

