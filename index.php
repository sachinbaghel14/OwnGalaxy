<?php
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Stylesheet -->
      <?php
          include("imports/bootstrap.inc");
      ?>
      <link rel="stylesheet" href="css/herobox.css">
      <link rel="stylesheet" href="css/reset.css">
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/carousel.css">
    <!-- Title -->
    <title>Own Galaxy - Gift Moon Land</title>
  </head>
  <body>
    <!-- Navbar -->
    <?php include("imports/nav.inc"); ?>
    <!-- Main -->
    <main>
      <!-- Carousel -->
        <?php
          include("imports/carousel.inc");
          include("imports/herobox.inc");
        ?>
    </main>
    <!-- Footer -->
    <?php include("imports/footer.inc"); ?>
  </body>
</html>
