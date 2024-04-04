  <!-- Stylesheet -->
<!-- # @Author: Rishika Gupta <rishika>
# @Date:   2020-08-14T21:01:57+05:30
# @Email:  riishikagupta@gmail.com
# @Project: OwnGalaxy
# @Filename: nav.inc
# @Last modified by:   rishika
# @Last modified time: 2020-09-07T20:07:11+05:30
# @Copyright: Visitron -->
  <link rel="stylesheet" href="css/nav.css">
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Lato:wght@700&family=Open+Sans:wght@300;400;600&family=Mulish:wght@200;300;400&display=swap" rel="stylesheet">
  <div class="disclaimer">
    <p>Due to COVID-19, we are unable to ship. Resuming soon! <span style="float:right"><a href="https://api.whatsapp.com/send?phone=917477212251&text=Hi%20OwnGalaxy%20!&source=&data=&app_absent="><i class="fa fa-whatsapp" aria-hidden="true"></i> WhatsApp</a></span> </p>
  </div>
  <nav class="navbar fixed-top navbar-expand-lg navbar-custom shadow p-3">
    <a class="navbar-brand" href="index">
      <img src="images/logo.png" width="250" height="81.48" class="d-inline-block align-top" alt="">
    </a>
    <button class="navbar-toggler toggler-custom" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <ul class="nav navbar-nav navbar-center mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              INFO
            </a>
            <div class="dropdown-menu dropdown-content" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="about.php">ABOUT US</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="whatis.php">LUNAR LAND</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="faq.php">FAQ</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="buy.php" role="button">
              BUY MOON
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              CONNECT
            </a>
            <div class="dropdown-menu dropdown-content" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="contact.php">CONTACT US</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="work.php">WORK WITH US</a>
            </div>
          </li>
        </ul>
      </div>
        <ul class="navbar-nav ml-auto nav-icons">
          <?php
              if(!isset($_SESSION['user']))
              {
           ?>
          <!-- <li class="nav-item">
            <a class="nav-link" href="login.php"><img src="images/wishlist.svg" height=25 width=25 alt="Wishlist"></a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="cart.php"><img src="images/cart.svg" height=25 width=25 alt="Shopping Cart"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php"><img src="images/user.svg" height=25 width=25 alt="Log Out"></a>
          </li>
          <?php
             }
             else
             {
          ?>
          <!-- <li class="nav-item">
            <a class="nav-link" href="#"><img src="images/wishlist.svg" height=25 width=25 alt="Wishlist"></a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="cart"><img src="images/cart.svg" height=25 width=25 alt="Shopping Cart"></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="images/user.svg" height=25 width=25 alt="Log Out">
            </a>
            <div class="dropdown-menu dropdown-content icon-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="account">ACCOUNT</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="logout?signout=true">LOG OUT</a>
            </div>
          </li>
          <?php
             }
            ?>
        </ul>
    </div>
  </nav>
