<link rel="stylesheet" href="css/overlay.css">
<div id="disOverlay" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
    <div class="centered">
      <h1>Grab your discount coupon!</h1>
      <p>We will be sending you a unique coupon code on your email.</p>
      <form action="index" method="post">
        <input type="text" name="disNameInput" placeholder="John Doe" required> <br>
        <input type="email" name="disEmailInput" placeholder="johndoe@example.com" required> <br>
        <input type="submit" name="disSubmitInput" value="Get code!">
      </form>
    </div>
  </div>
</div>
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
<script type="text/javascript" src="js/overlay.js"></script>
