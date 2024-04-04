<?php
  include_once("imports/dbcon.inc");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Products</title>
  <?php
      include("imports/bootstrap.inc");
    ?>

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/buymoon.css">
</head>

<body>
  <!-- Navbar -->
  <?php include("imports/nav.inc"); ?>
  <!-- Main -->
  <main>
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light launching text-white">
      <div class="col-md-5 p-lg-5 mx-auto my-5 image-fluid">
        <h1 class="display-4 font-weight-normal">Star Maps</h1>
        <p class="lead font-weight-normal">Remember the day and place you both first met? We'll send you a customized map, the stars that were over you that night.</p>
        <a class="btn btn-outline-light" href="#">Coming soon</a>
      </div>
    </div>
    <section class="gallery-block cards-gallery">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-3">
            <div class="card bg-secondary shadow border-0 transform-on-hover">
              <a class="lightbox" href="product?i=crater">
                <div class="card-body bg-light">
                  <img src="images/product11.jpg" alt="Card Image" class="card-img-top">
                </div>
                <div class="card-header bg-white border-0">
                  <p class="title">Moon Craters</p>
                  <p class="text-muted card-text">The Moon's surface has many craters, almost all of which were formed by impacts.</p>
                </div>
              </a>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="card bg-secondary shadow border-0 transform-on-hover">
              <a class="lightbox" href="product?i=mountains">
                <div class="card-body bg-light">
                  <img src="images/product12.jpg" alt="Card Image" class="card-img-top">
                </div>
                <div class="card-header bg-white border-0">
                  <p class="title">Mountains</p>
                  <p class="text-muted card-text">Giant asteroids in the solar system formed the lunar maria and left their rims to form lunar mountains.</p>
                </div>
              </a>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="card bg-secondary shadow border-0 transform-on-hover">
              <a class="lightbox" href="product?i=near">
                <div class="card-body bg-light">
                  <img src="images/product13.jpg" alt="Card Image" class="card-img-top">
                </div>
                <div class="card-header bg-white border-0">
                  <p class="title">Plain Land (Near Side)</p>
                  <p class="text-muted card-text">The near side of the Moon is the lunar hemisphere that is permanently turned towards Earth.</p>
                </div>
              </a>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="card bg-secondary shadow border-0 transform-on-hover">
              <a class="lightbox" href="product?i=far">
                <div class="card-body bg-light">
                  <img src="images/product11.jpg" alt="Card Image" class="card-img-top">
                </div>
                <div class="card-header bg-white border-0">
                  <p class="title">Plain Land (Far Side)</p>
                  <p class="text-muted card-text">The far side of the Moon is the hemisphere of the Moon that always faces away from Earth.</p>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
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
            <p class="faq-content">Yes, we take bulk orders for Family, corporate gifting, wedding plans, colleges (graduation gift), NGOs, etc. Please send us an <a href="mailto:customercare.owngalaxy@gmail.com?subject=bulk+order">email here</a> and specify your requirements.</p>
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
  <?php
    if (isset($_POST['reviewSubmit'])) {
      try {
        $rating = htmlspecialchars(stripslashes(trim($_POST['rating'])));
        $review = htmlspecialchars(stripslashes(trim($_POST['review'])));
        $author = htmlspecialchars(stripslashes(trim($_POST['reviewAuthor'])));
        $authorEmail = htmlspecialchars(stripslashes(trim($_POST['authorEmail'])));
        $sql = "INSERT INTO reviews(`rating`, `review`, `author`, `email`) VALUES('$rating', '$review', '$author', '$authorEmail')";
        $submit = mysqli_query($con, $sql);
      }
      catch (\Exception $e) {
        echo $e;
      }
    }
  ?>
  <?php include("imports/footer.inc"); ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
  <script>
    baguetteBox.run('.cards-gallery', {
      animation: 'slideIn'
    });
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
