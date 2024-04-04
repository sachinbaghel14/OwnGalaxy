<?php
  include_once("imports/dbcon.inc");
?>
<!-- Stylesheets -->
<link rel="stylesheet" href="css/herobox.css">
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;600&family=Lato:wght@700&family=Dancing+Script:wght@500&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">

<!-- Why Gift -->
<div class="jumbotron bg-jumbo-one rounded-0 text-center">
    <div class="row align-self-center">
      <div class="col-sm occasion-title text-center">
        <p >When to gift?</p>
      </div>
    </div>
    <div class="row align-self-center">
      <div class="col-sm-3 column">
        <img src="images/wedding.png" class="card-img-top" alt="Icon made by freepik">
        <p>To Propose</p>
      </div>
      <div class="col-sm-3 column">
        <img src="images/gift.png" class="card-img-top" alt="Icon made by freepik">
        <p>Surprise Gift</p>
      </div>
      <div class="col-sm-3 column">
        <img src="images/relationship.svg" class="card-img-top" alt="Icon made by freepik">
        <p>For Your Loved One</p>
      </div>
      <div class="col-sm-3 column">
        <img src="images/bff.png" class="card-img-top" alt="Icon made by freepik">
        <p>For Your BFF</p>
      </div>
      <div class="col-sm-3 column">
        <img src="images/bride.svg" class="card-img-top" alt="Icon made by freepik">
        <p>Anniversary</p>
      </div>
      <div class="col-sm-3 column">
        <img src="images/birthday.png" class="card-img-top" alt="Icon made by freepik">
        <p>Birthday Gift</p>
      </div>
      <div class="col-sm-3 column">
        <img src="images/table.png" class="card-img-top" alt="Icon made by freepik">
        <p>Impression</p>
      </div>
      <div class="col-sm-3 column">
        <img src="images/heartbeat.svg" class="card-img-top" alt="Icon made by freepik">
        <p>Make Moments Memorable</p>
      </div>
    </div>
  </div>
</div>

<!-- Why Own Galaxy -->
<div class="jumbotron bg-jumbo-two rounded-0">
  <div class="container">
    <div class="row align-self-center">
      <div class="col-sm text-center occasion-title">
        <p class=>Why Own Galaxy?</p>
      </div>
    </div>
    <div class="row">
      <div class="col-sm whygalaxy">
        <span><img src="images/whygalaxy6.png" alt="Icon made by freepik">&nbsp &nbsp Customizable</span><br>
        <span><img src="images/whygalaxy4.png" alt="Icon made by freepik">&nbsp &nbsp Exclusivity</span><br>
        <span><img src="images/whygalaxy5.png" alt="Icon made by freepik">&nbsp &nbsp Premium Packaging</span><br>
      </div>
      <div class="col-sm-1 whygalaxy"></div>
      <div class="col-sm whygalaxy">
        <span><img src="images/whygalaxy2.png" alt="Icon made by freepik">&nbsp &nbsp &nbsp &nbsp &nbsp High Quality Prints</span><br>
        <span><img src="images/whygalaxy3.png" alt="Icon made by freepik">&nbsp Fast, Reliable Shipping</span><br>
        <span><img src="images/whygalaxy1.png" alt="Icon made by freepik">&nbsp &nbsp Desired For Your Loved One</span><br>
      </div>
    </div>
  </div>
</div>

<!-- Subsctiption Box -->
<div class="jumbotron bg-jumbo-three rounded-0" style="background-image: url('images/galaxy_gif.gif'); background-size:cover;">
  <div class="container text-center">
    <div class="row align-self-center">
      <div class="col-sm text-center">
        <p style="font-family:'Roboto', sans-serif; font-size:1.8em; font-weight:lighter; letter-spacing:0.625em; margin-bottom: 0px; margin-top: 2rem;">JOIN OUR COMMUNITY</p>
        <p style="font-family:'Roboto', sans-serif; font-size:1em; font-weight:300; letter-spacing:0.1em; margin-bottom: 1rem">Get updated about all the exciting information about Moon and other astronomical objects.</p>
      </div>
    </div>
    <form class="form" action="index" method="post">
      <div class="form-group row">
        <div class="col-md-4"></div>
        <div class="col-md-4 align-self-center">
          <input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone.</small><br>
        </div>
        <div class="col-md-4"></div>
      </div>
      <button type="submit" name="subscribe">Subscribe</button>
    </form>
  </div>
</div>
<?php
  if (isset($_POST['subscribe'])) {
    $email = htmlspecialchars(trim($_POST['email']));
    $subscription = 1;
    $sql = "INSERT INTO subscribers (sub_email, sub_active) VALUES ('$email',$subscription)";
    $retval = mysqli_query($con,$sql);
?>
<script>
  window.alert("Subscription successful! Don't worry, we won't spam you.");
</script>
<?php
  }
 ?>
