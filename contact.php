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
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/about.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;600&family=Lato:wght@700&family=Dancing+Script:wght@500&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    

    <!-- TITLE -->
    <title>Contact Us - Own Galaxy</title>
  </head>
  <body>

    <!-- Navbar -->
    <?php include("imports/nav.inc"); ?>
    <!-- Main -->
    <main>
      <!-- About Us Box -->
      <div class="jumbotron rounded-0" style="background-image: url('images/subscribe_bg_blur.jpg'); margin-bottom:0px;">
        <div class="container bg-jumbo align-self-center">
          <h1 class="display-4">Contact Us</h1>
          <p class="lead">At Own Galaxy, we believe that <strong>“You deserve every bit of this Galaxy.” &#9733;</strong></p>
          <hr class="my-4">
          <p>For any queries, inconvenience or unexpected problems, please feel free to drop us an email at <em> <a href="mailto:customercare.owngalaxy@gmail.com" style="color:#EEEEEE">customercare.owngalaxy@gmail.com</a> </em> </p>
          <p>We're more than happy to be able to help you in any way! &#10084;</p>
          <br>
        </div>
      </div>
    </main>

    <!-- Footer -->
    <?php include("imports/footer.inc"); ?>
  </body>
</html>
