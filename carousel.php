<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="reset.css">
  <link rel="stylesheet" href="style.css">
  <title>Boite à images</title>
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

    <!-- Le carousel commence ici  -->

    <section class="carousel">
      <h3 class="carousel-title">Notre boîte à images, celle qui vous fais rêver !</h3>
      <p class="carousel-title-text">Tous à savoir sur <span class="carousel-title-country">Monuments Valley</span></p>
      <div class="carousel-container">
        <img class="carousel-left-btn" src="img/Back.png" alt="">
        <img class="carousel-right-btn" src="img/Next.png" alt="">
          <?php
          require_once "includes/connection.php";
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
              <img class="carousel-img1 js-var is-active" href="" data-pays="<?=$row['h1']?>" src="<?=$row['imgsrc']?>" alt="<?=$row['imgalt']?>" />
          <?php endwhile;
          ?>

      </div>
    </section>


    <!-- Le carousel finit ici  -->

    <script src="app.js"></script>
</body>

</html>
