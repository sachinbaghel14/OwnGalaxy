<!-- # @Author: Rishika Gupta
# @Date:   2020-08-19T00:37:08+05:30
# @Email:  riishikagupta@gmail.com
# @Project: OwnGalaxy
# @Filename: product.php
# @Last modified by:   rishika
# @Last modified time: 2020-09-06T23:29:44+05:30
# @Copyright: Visitron -->
<?php
  session_start();
  include("imports/dbcon.inc");
  // Get product details according to product category (near, far, etc)
  $productcode = "";
  if (isset($_GET['i'])) {
    try {
      $productcode = $_GET['i'];
      $i=0;
      $p_name=array();
      $mysql = "SELECT p_name FROM products WHERE p_type = '$productcode'";
      $result = mysqli_query($con,$mysql);
      $rowcount=mysqli_num_rows($result);
      while ($row=mysqli_fetch_assoc($result)) {
        $p_name[$i] = $row['p_name'];
        $i++;
      }
    }
    catch (\Exception $e) {
      echo $e;
    }
  }
  else {
    // Go back if no product category mentioned in url
    echo "<script type='text/javascript'>window.history.go(-1);</script>";
  }
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
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/product.css">
  <link rel="stylesheet" href="css/buymoon.css">

  <!-- Title -->
  <title>Own Galaxy - Gift Moon Land</title>
</head>

<body>
  <!-- Navbar -->
  <?php include("imports/nav.inc"); ?>
  <!-- Main -->
  <main>
    <div class="section">
      <div class="row row-p">
        <div class="col-sm col-p text-center mr-md-3 px-3 px-md-5">
          <picture>
            <img class="d-block w-100 img-fluid" id="productImage" src="images/product1.jpg" alt="First slide">
          </picture>
          <div id="myBtnContainer" class="col-p-img img-fluid">
            <img class="btn active" onclick="document.getElementById('productImage').src='images/product1.jpg'" style="background-image:url(images/icon_p1.jpg);">
            <img class="btn" onclick="document.getElementById('productImage').src='images/product2.jpg'" style="background-image:url(images/icon_p2.jpg);">
            <img class="btn" onclick="document.getElementById('productImage').src='images/product3.jpg'" style="background-image:url(images/icon_p3.jpg);">
          </div>
        </div>
        <div class="col-sm col-p mr-md-3 pt-3 px-3 pt-md-5 px-md-5">
          <h3><?php
                if ($productcode=='crater') {
                  echo "Moon Crater";
                }
                else if($productcode=='mountain'){
                  echo "Mountains";
                }
                else if($productcode=='far'){
                  echo "Plain Land (Far Side)";
                }
                else {
                  echo "Plain Land (Near Side)";
                }
              ?>
          </h3>
          <h5>Price: ₹ <span id="priceDisplay">3500</span> </h5>
          <br>

          <div class="text-muted">
            <h5>Dimensions</h5>
            <p><small>Certificate - 29 x 20 cm (Glossy Paper)</small></p>
            <p><small>Moon Map - 20 x 27 cm (Glossy Paper)</small></p>
            <p><small>Certificate - 20 x 29 cm (Matt Paper)</small></p>
          </div>
          <br>

          <div class="row form-group">
            <div class="col-sm">
              <label for="typeSelector">Select type <small>(mandatory)</small> </label>
              <select name="productType" class="form-control" id="typeSelector" onchange="productSelector()">
                <?php
                      for ($i=0; $i < $rowcount; $i++) {
                        echo "<option>".$p_name[$i]."</option>";
                      }
                    ?>
              </select>
            </div>

            <div class="col-sm">
              <label for="areaSelector">Select area</label>
              <select name="productArea" class="form-control" id="areaSelector" onchange="productSelector()" style="width:50%;">
                <option value="1 acre">1 acre</option>
                <option value="3 acre">3 acre</option>
                <option value="5 acre">5 acre</option>
              </select>
            </div>
          </div>
          <br>
          <br>
          <h5>Choose Certificate <small> <a href="imports/lightbox.php">View</a> </small></h5>
          <div class="cc-selector">
            <input name="custInput" id="custom1" type="radio" value="certificate1" checked="checked">
            <label class="drinkcard-cc custom1" for="custom1"></label>
            <input name="custInput" id="custom2" type="radio" value="certificate2">
            <label class="drinkcard-cc custom2" for="custom2"></label>
            <input name="custInput" id="custom3" type="radio" value="certificate3">
            <label class="drinkcard-cc custom3" for="custom3"></label>
            <input name="custInput" id="custom3" type="radio" value="certificate4">
            <label class="drinkcard-cc custom3" for="custom3"></label>
          </div>
          <br>
          <div class="proceedButton">
            <button class="btn" name="button" onclick="document.location='#productDetails'">Proceed</button>
          </div>
        </div>
      </div>
      <div class="row row-p">
        <div class="col-sm col-p mr-md-3 pt-3 px-3 pt-md-5 px-md-5" id="productDetails">
          <img src="images/description.png" class="img-fluid" alt="Products to be received">
        </div>
        <div class="col-sm col-p mr-md-3 pt-3 px-3 pt-md-5 px-md-5">
          <h3>Person Details</h3>
          <small>Please fill in with details of person you're buying it for.</small><br><br>
          <form onsubmit="event.preventDefault();">
            <div class="purchaseDetails form-group">
              <label for="purName">Name</label>
              <input type="text" name="purNameInput" class="form-control" id="purName" placeholder="John Doe" required><br>
              <label for="purMessage">Your Personal Message</label>
              <textarea name="purMessageInput" class="form-control" id="purMessage" placeholder="W. Clement Stone – Aim for the moon. If you miss, you may hit a star. (max 150 char.)" maxlength="150" rows="3" cols="90"></textarea>
            </div>
            <span><input type="checkbox" id="purConfirm" name="purConfirmInput" class="chkbox" value="purConfirm" required> Confirm Details</span>
            <br><br>
            <input type="submit" name="addToCartInput" class="productType" value="Add to Cart" id="addToCartInput">
          </form>
        </div>
      </div>
    </div>
    <div class="container tabs-custom">
      <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link border-0 active" id="benefits-tab" data-toggle="tab" href="#benefits" role="tab" aria-controls="benefits" aria-selected="true">Benefits</a>
        </li>
        <li class="nav-item">
          <a class="nav-link border-0" id="details-tab" data-toggle="tab" href="#details" role="tab" aria-controls="details" aria-selected="false">Product Details</a>
        </li>
        <li class="nav-item">
          <a class="nav-link border-0" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
        </li>
        <li class="nav-item">
          <a class="nav-link border-0" id="faqs-tab" data-toggle="tab" href="#faqs" role="tab" aria-controls="faqs" aria-selected="false">FAQs</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="benefits" role="tabpanel" aria-labelledby="benefits-tab">
          <p class="tab-content-heading">BENEFITS OF OWNGALAXY</p>
          <div class="row">
            <div class="col-sm-3" align="center">
              <img src="images/whygalaxy_dark1.svg" alt="Customizable" height="180" width="120">
            </div>
            <div class="col-sm-3" align="center">
              <img src="images/whygalaxy_dark2.svg" alt="Fast Shipping" height="200" width="150">
            </div>
            <div class="col-sm-3" align="center">
              <img src="images/whygalaxy_dark3.svg" alt="Premium Packaging" height="180" width="120">
            </div>
            <div class="col-sm-3" align="center">
              <img src="images/whygalaxy_dark4.svg" alt="Desirable" height="180" width="120">
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3" align="center">
              <p class="col-heading">Highly Customizable</p>
              <p class="heading-content">All our products are uniquely customized exclusively for you.</p>
            </div>
            <div class="col-sm-3" align="center">
              <p class="col-heading">Fast, reliable shipping.</p>
              <p class="heading-content">We know the importance of a gift, and hence ship at earliest.</p>
            </div>
            <div class="col-sm-3" align="center">
              <p class="col-heading">Premium packaging.</p>
              <p class="heading-content">We make sure your gifting experience is memorable.</p>
            </div>
            <div class="col-sm-3" align="center">
              <p class="col-heading">Desirable.</p>
              <p class="heading-content">Buying Lunar land has never been so desirable and easy before.</p>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="details-tab">
          <div class="container text-center">
            <p class="col-heading">Dimensions</p>
            <div class="row">
              <div class="col-sm-3"></div>
              <div class="col-sm-6">
                <table class="table">
                  <tbody>
                    <tr>
                      <td>Lunar Claim & Deed</td>
                      <td>29 x 20 cm (Glossy Paper)</td>
                    </tr>
                    <tr>
                      <td>Moon Map</td>
                      <td>20 x 27 cm (Glossy Paper)</td>
                    </tr>
                    <tr>
                      <td>Information Page</td>
                      <td>20 x 29 cm (Matt Paper)</td>
                    </tr>
                    <tr>
                      <td>Frame</td>
                      <td>Black Wooden Frame</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-sm-3"></div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
          <p class="tab-content-heading">CUSTOMER REVIEWS</p>
          <div class="row">
            <div class="col-sm-6 review-block">
              <br>
              <?php
                try {
                  $query = "SELECT * FROM reviews";
                  $retval = mysqli_query($con, $query);
                  $rowcount = mysqli_num_rows($retval);
                  while ($row = mysqli_fetch_assoc($retval)) {
                    $authorName = $row['author'];
                    $publishDate = $row['date'];
                    $reviewRating = $row['rating'];
                    $reviewComment = $row['review'];
              ?>
              <li>
                <div class="row">
                  <div class="col-sm-2">
                    <img src="images/user_icon.svg" alt="user" height="50" width="50">
                  </div>
                  <div class="col-sm-8">
                    <div class="review-comment">
                      <p class="author-info">
                        <span class="author-comment"><?php echo $authorName; ?> &nbsp;</span>
                        <span class="date-comment"><?php echo $publishDate; ?></span>
                        <span class="rating-comment">
                          <?php
                            if ($reviewRating==1) {
                              echo '<i class="fa fa-star" aria-hidden="true"></i>';
                            }
                            else if ($reviewRating==2) {
                              echo '<i class="fa fa-star" aria-hidden="true"></i>';
                              echo '<i class="fa fa-star" aria-hidden="true"></i>';
                            }
                            else if ($reviewRating==3) {
                              echo '<i class="fa fa-star" aria-hidden="true"></i>';
                              echo '<i class="fa fa-star" aria-hidden="true"></i>';
                              echo '<i class="fa fa-star" aria-hidden="true"></i>';
                            }
                            else if ($reviewRating==4) {
                              echo '<i class="fa fa-star" aria-hidden="true"></i>';
                              echo '<i class="fa fa-star" aria-hidden="true"></i>';
                              echo '<i class="fa fa-star" aria-hidden="true"></i>';
                              echo '<i class="fa fa-star" aria-hidden="true"></i>';
                            }
                            else {
                              echo '<i class="fa fa-star" aria-hidden="true"></i>';
                              echo '<i class="fa fa-star" aria-hidden="true"></i>';
                              echo '<i class="fa fa-star" aria-hidden="true"></i>';
                              echo '<i class="fa fa-star" aria-hidden="true"></i>';
                              echo '<i class="fa fa-star" aria-hidden="true"></i>';
                            }
                          ?>
                        </span>
                      </p>
                      <p class="review-comment"><?php echo $reviewComment; ?></p>
                    </div>
                  </div>
                </div>
              </li>
              <br>
              <?php
                  }
                }
                catch (\Exception $e) {
                echo $e;
                }
              ?>
            </div>
            <div class="col-sm-6 review-form">
              <p class="tab-content-heading">Write a review</p>
              <p> Your email will not be posted with review. Please fill the required fields.<span class="required">*</span></p>
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <div class="rating form-group">
                  <label for="rating"><span class="required">*</span>Your Rating:</label>&nbsp;&nbsp;&nbsp;
                  <span><input type="radio" name="rating" id="str5" class="form-control" value="5"><label for="str5"><i class="fa fa-star" aria-hidden="true"></i></label></span>
                  <span><input type="radio" name="rating" id="str4" class="form-control" value="4"><label for="str4"><i class="fa fa-star" aria-hidden="true"></i></label></span>
                  <span><input type="radio" name="rating" id="str3" class="form-control" value="3"><label for="str3"><i class="fa fa-star" aria-hidden="true"></i></label></span>
                  <span><input type="radio" name="rating" id="str2" class="form-control" value="2"><label for="str2"><i class="fa fa-star" aria-hidden="true"></i></label></span>
                  <span><input type="radio" name="rating" id="str1" class="form-control" value="1"><label for="str1"><i class="fa fa-star" aria-hidden="true"></i></label></span>
                </div>
                <br><br>
                <div class="form-group">
                  <label for="review">Your review:<span class="required">*</span></label>
                  <textarea class="form-control" name="review" id="review" rows="3" required></textarea>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="reviewAuthor">Name:<span class="required">*</span></label>
                    <input type="text" class="form-control" name="reviewAuthor" id="reviewAuthor" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="authorEmail">Email:<span class="required">*</span></label>
                    <input type="email" class="form-control" name="authorEmail" id="authorEmail" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-dark" name="reviewSubmit">Submit</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="tab-pane fade" id="faqs" role="tabpanel" aria-labelledby="faqs-tab">
          <div class="faq-pane">
            <p class="faq-heading">Do you take bulk orders?</p>
            <p class="faq-content">Yes, we take bulk orders for Family, corporate gifting, wedding plans, colleges (graduation gift), NGOs, etc. Please send us an <a href="mailto:customercare.owngalaxy@gmail.com?subject=bulk+order" style="color:cyan">email here</a> and specify your requirements.</p>
            <p class="faq-heading">How long does it take to deliver an order?</p>
            <p class="faq-content">Since each map is custom-made, we take 2-3 working days to design, print your map and other documents. Additional 2-3 days for shipping to any metro city in India, 5-7 days to any other location in India, 10-12 days for countries other than India. So if you’re planning to gift this for a specific occasion, be sure to order at least 2 weeks in advance just to be safe.</p>
            <p class="faq-heading">How do I make a payment?</p>
            <p class="faq-content">We accept online payments via <i>Paytm</i>. We will soon be adding more payment methods. We do not provide Cash on Delivery service due to customized nature of the product.</p>
            <p class="faq-heading">What does the document include?</p>
            <p class="faq-content">The documents include the Deed (CERTIFICATE OF OWNERSHIP) , Land map, Information about your land, personalized message and a welcome card.</p>
            <p class="faq-heading">Do you accept returns?</p>
            <p class="faq-content">Sorry, since each document is made specifically for you, we will not be able to accept return as we will not have any further use of the product. In rare cases of damage during transit, we will send you a fresh piece at no cost.</p>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <?php include("imports/footer.inc"); ?>
  <script type="text/javascript" src="js/lightbox.js"></script>
  <script type="text/javascript">
  <?php
    if(isset($_GET['i'])) {
      $temp = $_GET['i'];if ($temp == 'crater') {
        echo "var typeSelected = 'PLATO';";
      }
      elseif ($temp == 'mountain') {
        echo "var typeSelected = 'TAURUS MOUNTAINS';";
      }
      elseif ($temp == 'near') {
        echo "var typeSelected = 'BAY OF RAINBOW';";
      }
      else {
        echo "var typeSelected = 'ORIANTALE';";
      }
    }
  ?>
    var areaSelected = '1 acre';
    var certSelected = 'certificate1';
    var typeInput = new Array();
    var areaInput = new Array();
    var certInput = new Array();
    var nameInput = new Array();
    var msgInput = new Array();
    var priceInput = new Array();
    var total = 0;
    function productSelector() {
      typeSelected = document.getElementById("typeSelector").value;
      areaSelected = document.getElementById("areaSelector").value;
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.open("POST", "processing.php", true);
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.send("type=" + typeSelected + "&area=" + areaSelected);
      xmlhttp.onload = function() {
        if (this.readyState == 4 && this.status == 200) {
          var price = parseInt(this.responseText);
          document.getElementById("priceDisplay").innerHTML = price;
        } else {
          document.getElementById("priceDisplay").innerHTML = "NaN";
        }
      };
    }

    document.getElementById("addToCartInput").addEventListener("click", insertData);

    function insertData() {
      certSelected = document.querySelector('input[name="custInput"]:checked').value;
      var localLength = localStorage.length;
      if (localLength!=0) {
        typeInput.push(JSON.parse(localStorage.getItem("type")));
        areaInput.push(JSON.parse(localStorage.getItem("area")));
        certInput.push(JSON.parse(localStorage.getItem("cert")));
        priceInput.push(JSON.parse(localStorage.getItem("price")));
        nameInput.push(JSON.parse(localStorage.getItem("name")));
        msgInput.push(JSON.parse(localStorage.getItem("msg")));
        typeInput.push(typeSelected);
        areaInput.push(areaSelected);
        certInput.push(certSelected);
        nameInput.push(document.getElementById("purName").value);
        msgInput.push(document.getElementById("purMessage").value);
        priceInput.push(parseInt(document.getElementById("priceDisplay").textContent));
        localStorage.setItem("name", JSON.stringify(nameInput));
        localStorage.setItem("msg", JSON.stringify(msgInput));
        localStorage.setItem("type", JSON.stringify(typeInput));
        localStorage.setItem("area", JSON.stringify(areaInput));
        localStorage.setItem("cert", JSON.stringify(certInput));
        localStorage.setItem("price", JSON.stringify(priceInput));
        for (var i = 0; i < priceInput.length; i++) {
          total = total+priceInput[i];
        }
        localStorage.setItem("total", total);
      }
      else{
        typeInput.push(typeSelected);
        areaInput.push(areaSelected);
        certInput.push(certSelected);
        nameInput.push(document.getElementById("purName").value);
        msgInput.push(document.getElementById("purMessage").value);
        priceInput.push(parseInt(document.getElementById("priceDisplay").textContent));
        localStorage.setItem("name", JSON.stringify(nameInput));
        localStorage.setItem("msg", JSON.stringify(msgInput));
        localStorage.setItem("type", JSON.stringify(typeInput));
        localStorage.setItem("area", JSON.stringify(areaInput));
        localStorage.setItem("cert", JSON.stringify(certInput));
        localStorage.setItem("price", JSON.stringify(priceInput));
      }
    }

  </script>
  <script>
  $(document).ready(function(){
  // Check Radio-box
    $(".rating input:radio").attr("checked", false);
    $('.rating input').click(function () {
        $(".rating span").removeClass('checked');
        $(this).parent().addClass('checked');
    });
    $('input:radio').change(
      function(){
        var userRating = this.value;
    });
  });
  </script>

</body>

</html>
