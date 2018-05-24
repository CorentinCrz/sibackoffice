<?php
/**
 * Created by PhpStorm.
 * User: Corentin
 * Date: 23/05/2018
 * Time: 14:48
 */
function adminHead(string $title): void
{
    ?>
    <!doctype html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?=$title?></title>
<!--        <link rel="stylesheet" href="--><?//= APP_ROOT_DIR."/style.css" ?><!--">-->
        <style>
            body {
                width: 90%;
                margin: auto;
            }
            h1 {
                font-size: 1.4rem;
                text-align: center;
            }
            h2 {
                font-size: 1.2rem;
            }
            .section {
                border: 1px solid black;
                border-radius: 5px;
                margin: 20px;
                padding: 10px;
            }
            .flex {
                display: flex;
                justify-content: space-around;
            }
            .top {
                width: 30%;
                text-align: center;
            }
            .flexbet {
                display: flex;
                justify-content: space-between;
            }
            header {
                margin: 20px;
            }
            table, td, th {
                margin-top: 10px;
                text-align: center;
                border: 1px solid grey;
            }
        </style>
    </head>
    <body>
    <header>
        <a href="">Admin</a>
    </header>
    <?php
}

function adminFoot(): void
{
    ?>
    </body>
    </html>
    <?php
}

function adminSession(pdo $pdo, $login, $password): bool
{
    $sql = "SELECT
    `login`,
    `password`
    FROM
    `admin`
    WHERE
    `login` = :login
    AND 
    `password` = :password    
    ;";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':login', $login, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row)
    {
        return false;
    }
    return true;
}

function adminConnection()
{
    ?>
    <form action="" method="post">
        <label for="login">Nom</label> <input type="text" name="login"><br>
        <label for="password">Mot de passe</label> <input type="password" name="password"><br>
        <input type="submit" value="connexion">
    </form>
    <?php
}

function postList($pdo, $number, $dir)
{
    $sql = "SELECT
  `idpost`,
  `category`,
  `h1`
FROM
  `post`
;
";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $count = 0;
    while((false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)) || $count >= $number):
        $count++;
        ?>
        <tr>
            <td><a href="<?=$dir?>show.php?id=<?=$row['idpost']?>"><?=$row['h1']?></a></td>
            <td><?=$row['category']?></td>
            <td>
                <a href="<?=$dir?>delete.php?id=<?=$row['idpost']?>">Supprimer</a>
                <a href="<?=$dir?>edit.php?id=<?=$row['idpost']?>">Modifier</a>
            </td>
        </tr>
    <?php endwhile;
}

function pdfList($pdo, $number, $dir)
{
    $sql = "SELECT
  `idpdf`,
  `h1`
FROM
  `pdf`
;
";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $count = 0;
    while((false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)) || $count >= $number):
        $count++;
        ?>
        <tr>
            <td><a href="<?=$dir?>show.php?id=<?=$row['idpdf']?>"><?=$row['h1']?></a></td>
            <td>
                <a href="<?=$dir?>delete.php?id=<?=$row['idpdf']?>">Supprimer</a>
                <a href="<?=$dir?>edit.php?id=<?=$row['idpdf']?>">Modifier</a>
            </td>
        </tr>
    <?php endwhile;
}

function picboxList($pdo, $dir)
{
    $sql = "SELECT
  *
FROM
  `picbox`
;
";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    while(false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)):
        ?>
        <tr>
            <td><a href="<?=$dir?>show.php?id=<?=$row['idpic']?>"><?=$row['h1']?></a></td>
            <td>
                <a href="<?=$dir?>delete.php?id=<?=$row['idpic']?>">Supprimer</a>
                <a href="<?=$dir?>edit.php?id=<?=$row['idpic']?>">Modifier</a>
            </td>
        </tr>
    <?php endwhile;
}

function topList(pdo $pdo, $cat)
{
    $sql = "SELECT
  `idtop`,
  `top`,
  `idpost`
FROM
  `top`
WHERE
  `category` = :category
;
";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue();
    $stmt->execute(':category', $cat);
    while(false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)):
        ?>
        <tr>
            <form action="edit.php" method="post">
                <td><label for="top">Top</label> <input type="text" name="top" value="<?=$row['top']?>"></td>
                <td><?=$row['idpost']?></td>
                <td>
                    <a href="delete.php?id=<?=$row['idtop']?>">Supprimer</a>
                    <input type="hidden" name="idtop" value="<?=$row['idtop']?>">
                    <input type="submit" value="Modifier">
                </td>
            </form>
        </tr>
    <?php endwhile;
}