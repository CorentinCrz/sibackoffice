<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="reset.css">
  <link rel="stylesheet" href="style.css">
  <title>Page Title</title>
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
    <!-- La barre de nav finit ici  -->

    <!-- DEBUT FICHES PRATIQUES -->
    <!-- TITLE -->
    <div class="title1">
      <h3>Les fiches pratiques, les astuces à connaître</h3>
    </div>

      <?php
      require_once "includes/connection.php";
      $sql = "SELECT
          *
        FROM
          `post`
        ;
        ";
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      while(false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)):
          ?>
          <div class="title2">
              <h2><?=$row['h1']?></h2>
          </div>
          <!-- PREMIERE PARTIE -->
          <!--COTÉ GAUCHE -->
          <div class="container">
              <div class="container-item">
                  <div class="container-text">
                      <div class="text1">
                          <div class="restaurants">
                              <p>Catégorie : <?=$row['category']?></p>
                              <p><?=$row['p']?></p>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- PREMIERE PARTIE -->
              <!-- COTE DROIT-->
              <div class="container-item">
                  <div class="container-text">
                      <div class="text2">
                          <div class="restaurants">
                              <br><a href="<?=$row['url']?>"> → Lien vers le <?=$row['category']?> </a><br>
                          </div>
                      </div>
                      <div class="images">
                          <img class="images" style="width: 315px;height: 210px;" src="<?=$row['imgsrc']?>" alt="<?=$row['imgalt']?>">
                      </div>
                  </div>
              </div>
          </div>
      <?php endwhile;
      ?>


    <div class="title2">
      <h2>Encore plein d’autres à découvrir → </h2>
    </div>


    <script src="app.js"></script>
</body>
