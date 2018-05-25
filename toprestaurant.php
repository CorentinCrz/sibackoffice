<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="reset.css">
  <link rel="stylesheet" href="style.css">
  <title>top restaurant</title>
</head>

<!-- header commence ici -->

<body>
  <div class="header no-background">

    <!-- La barre de nav commence ici  -->

    <div class="header-container">
      <div class="header-container-nav">
        <a href="index.php"><img class="header-container-logo" src="img/LOGO_MAG.png" alt="logo" /></a>
        <img class="header-container-btn-search" src="img/loupe.png" alt="" />
        <div class="header-container-input-close"><input class="header-container-input" placeholder="Que cherchez vous ?" /><img class="header-container-close" src="img/close.png" alt="" /></div>
        <div class="menu-trigger">
          <span class="line line-1"></span>
          <span class="line line-2"></span>
          <span class="line line-3"></span>
        </div>
        <ul class="list -navOpenBackground">
          <li class="list-item"><a href="index.php#book--" class="list-link">CATÉGORIES</a></li>
          <li class="list-item"><a href="index.php#annonce--" class="list-link">ANNONCEURS</a></li>
          <li class="list-item"><a href="index.php#air--" class="list-link">NEWS AIR</a></li>
          <li class="list-item"><a href="index.php#twitter--" class="list-link">ACTU TWITTER</a></li>
          <li class="list-item"><a href="index.php#goodplans--" class="list-link">BONS PLANS AÉRIEN</a></li>
          <li class="list-item"><a href="index.php#contact--" class="list-link">CONTACT</a></li>
          <div class="list-social-media">
            <img class="list-fb-logo" src="img/Facebook.png" alt="" />
            <img class="list-itg-logo" src="img/Instagram.png" alt="" />
            <img class="list-tt-logo" src="img/Twitter.png" alt="" />
            <img class="list-yt-logo" src="img/Youtube.png" alt="" />
          </div>
        </ul>
      </div>
    </div>
    <section class="title">
      LES 100 RESTAURANTS LES + POPULAIRES DU MONDE
    </section>
        <div class="block-nb2" style="margin: auto">
            <p class="title-block-nb1">Hôtels</p>
            <?php
            require_once "includes/connection.php";
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
            $stmt->bindValue(':category', 'Hotel', PDO::PARAM_STR);
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
                <p class="du-text"><span class="number-bold"><?=$row['top']?>. </span><?=$row2['h1']?></p>
            <?php endwhile;?>
        </div>


    <script src="app.js">
    </script>
