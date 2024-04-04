<?php
  include_once("imports/dbcon.inc");
?>
<!-- Stylesheets -->
<hr>
  <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active" data-interval="3000">
        <picture>
          <source media="(max-width:650px)" srcset="images/carousel11.jpg">
          <img class="d-block w-100" src="images/carousel1.png" alt="First slide">
        </picture>
        <div class="container">
            <div class="carousel-caption cap">
              <h2 class="welcome-heading">WELCOME MOON!</h2>
              <p class="cap">India's first Lunar land registry.</p><br>
              <p><a class="btn btn-primary" onclick="document.location='buymoon'" role="button">Discover the Moon now!</a></p>
            </div>
        </div>
      </div>
    </div>
  </div>
