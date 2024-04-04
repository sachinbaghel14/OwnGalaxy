<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/lightbox.css">
<body>
<script type="text/javascript">
window.onload = function() {
  openModal();
  currentSlide(1);
};
</script>
<div id="myModal" class="modal">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <div class="modal-content">

    <div class="mySlides">
      <div class="numbertext">1 / 3</div>
      <img src="../images/custom1.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">2 / 3</div>
      <img src="../images/custom2.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">3 / 3</div>
      <img src="../images/custom3.jpg" style="width:100%">
    </div>

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

    <div class="caption-container">
      <p id="caption"></p>
    </div>


    <div class="column">
      <img class="demo cursor" src="../images/custom1.jpg" style="width:100%" onclick="currentSlide(1)" alt="Certificate 1">
    </div>
    <div class="column">
      <img class="demo cursor" src="../images/custom2.jpg" style="width:100%" onclick="currentSlide(2)" alt="Certificate 2">
    </div>
    <div class="column">
      <img class="demo cursor" src="../images/custom3.jpg" style="width:100%" onclick="currentSlide(3)" alt="Certificate 3">
    </div>
  </div>
</div>

<script type="text/javascript" src="../js/lightbox.js"></script>

</body>
</html>
