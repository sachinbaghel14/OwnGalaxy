<!-- # @Author: Rishika Gupta <rishika>
# @Date:   2020-08-20T23:44:50+05:30
# @Email:  riishikagupta@gmail.com
# @Project: OwnGalaxy
# @Filename: cart.php
# @Last modified by:   rishika
# @Last modified time: 2020-09-08T03:00:05+05:30
# @Copyright: Visitron -->
<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cart OwnGalaxy</title>
    <?php include("imports/bootstrap.inc"); ?>
    <link rel="stylesheet" href="css/cart.css">
  </head>
  <body class="bg-light vsc-initialized">
    <?php include("imports/nav.inc"); ?>
    <div class="container content">
    <div class="row">
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span>Summary</span>
          <span class="badge badge-secondary badge-pill" id="productCount">0</span>
        </h4>
        <ul class="list-group mb-3" id="ul-group">
          <li class="list-group-item d-flex justify-content-between bg-light" id="promoBox">
            <div class="text-success">
              <h6 class="my-0">Promo code</h6>
              <small id="coupon"></small>
            </div>
            <span class="text-success" id="discountAmt"></span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (INR)</span>
            <strong  id="totalAmt">
              Transaction amount (total-discount)
            </strong>
          </li>
        </ul>
          <div class="input-group">
            <input type="text" class="form-control" id="couponCode" placeholder="Promo code" maxlength=6>
            <div class="invalid-feedback">
              Cannot be empty.
            </div>
            <div class="input-group-append">
              <button class="btn btn-secondary" onclick="applyCode()">Redeem</button>
            </div>
          </div>
      </div>

      <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Checkout</h4>
        <?php
          if (!isset($_SESSION['user'])) {
        ?>
        <p class="warning">Please <a href="login">login</a> to proceed.</p>
        <?php
          }
          else{
        ?>
        <form class="needs-validation" action="<?php echo htmlspecialchars('processcart.php');?>" method="POST">
          <div class="mb-3">
            <label for="fullName">Full name</label>
            <input type="text" class="form-control" name="nameInput" id="fullName"  placeholder="John Doe" required>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="emailInput" id="email" placeholder="you@example.com" required>
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="number">Contact Number <abbr title="Please don't put country code">(+91)</abbr> </label>
              <input type="text" class="form-control" name="numberInput" id="number" placeholder="No country code" maxlength="10" pattern="[0-9]{10}" required>
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control"  name="addressInput" id="address" placeholder="1234 Main St" required>
            <div class="invalid-feedback">
              Please enter your shipping address.
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 mb-3">
              <label for="state">State</label>
              <input type="text" class="form-control"  name="stateInput" id="state" placeholder="Maharashtra" required>
              <div class="invalid-feedback">
                Valid state required.
              </div>
            </div>
              <div class="col-md-4 mb-3">
                <label for="city">City</label>
                <input type="text" class="form-control"  name="cityInput" id="city" placeholder="Mumbai" required>
                <div class="invalid-feedback">
                  Valid city required.
                </div>
              </div>
            <div class="col-md-4 mb-3">
              <label for="zip">Zip</label>
              <input type="text" class="form-control"  name="zipInput" id="zip" placeholder="400001" required>
              <div class="invalid-feedback">
                Zip code required.
              </div>
            </div>
          </div>
          <hr class="mb-4">
          <input type="submit" class="btn btn-dark btn-lg btn-block" name="placeOrderInput" value="Checkout">
        </form>
        <?php
          }
        ?>
      </div>
    </div>
  </div>
  <div style="display:none;"><div class="niice-bar" id="niice-bar">
      <div class="boards">
      </div>
      <div class="loading-spinner">Loading…</div>
      <div class="error-text">
        <span class="msg"></span>
        <span class="close-cross">×</span>
      </div>
  </div>
  </div>
  <?php include("imports/footer.inc"); ?>
  <script type="text/javascript">
  var getNull = localStorage.getItem("type");
  if ((getNull == 'null') || (getNull == 'undefined') || (getNull == '[]')) {
    localStorage.clear();
  }
  var localLength = localStorage.length;
  if (localLength != 0) {
    var code = localStorage.getItem("code");
    var amt = localStorage.getItem("total");
    var discount;
    if (localStorage.getItem("discount")!=null) {
      discount = localStorage.getItem("discount");
      var tot = parseInt(amt) - parseInt(discount);
    }
    else{
      discount=0;
      var tot = parseInt(amt);
    }

    document.getElementById("coupon").innerHTML = code;
    document.getElementById("discountAmt").innerHTML = '-₹ ' + discount;
    var name = JSON.parse(localStorage.getItem("name")) + "";
    var msg = JSON.parse(localStorage.getItem("msg")) + "";
    var type = JSON.parse(localStorage.getItem("type")) + "";
    var area = JSON.parse(localStorage.getItem("area")) + "";
    var cert = JSON.parse(localStorage.getItem("cert")) + "";
    var nameArr = name.split(",");
    var msgArr = msg.split(",");
    var typeArr = type.split(",");
    var areaArr = area.split(",");
    var certArr = cert.split(",");
    document.getElementById("productCount").innerHTML = typeArr.length;
    var total = 0;
    var price = new Array();
    var itemPrice = JSON.parse(localStorage.getItem("price")) + "";
    var itemPrArr = itemPrice.split(",");

    function remove(item) {
      var i = item;
      if (i > -1) {
        nameArr.splice(i, 1);
        msgArr.splice(i, 1);
        typeArr.splice(i, 1);
        areaArr.splice(i, 1);
        certArr.splice(i, 1);
        itemPrArr.splice(i, 1);
        localStorage.setItem("name", JSON.stringify(nameArr));
        localStorage.setItem("msg", JSON.stringify(msgArr));
        localStorage.setItem("type", JSON.stringify(typeArr));
        localStorage.setItem("area", JSON.stringify(areaArr));
        localStorage.setItem("cert", JSON.stringify(certArr));
        localStorage.setItem("price", JSON.stringify(itemPrArr));
        location.reload();
      }
    }

    for (var i = 0; i < typeArr.length; i++) {
      var li = document.createElement("li");
      var div = document.createElement("div");
      var h6 = document.createElement("h6");
      var br = document.createElement("br");
      var smLand = document.createElement("small");
      var smName = document.createElement("small");
      var span = document.createElement("span");
      var smRmv = document.createElement("small");

      var promoBox = document.getElementById("promoBox");
      var ul = document.getElementById("ul-group");

      li.setAttribute('class', 'list-group-item d-flex justify-content-between lh-condensed');
      // li.appendChild(document.createTextNode());

      h6.setAttribute('class', 'my-0');
      smLand.setAttribute('class', 'text-muted');
      smName.setAttribute('class', 'text-muted');
      span.setAttribute('class', 'text-muted');
      smRmv.setAttribute('style', 'cursor:pointer');
      smRmv.setAttribute('onclick', 'remove(' + i + ')');

      h6.setAttribute('id', 'productName');
      smLand.setAttribute('id', 'landArea');
      smName.setAttribute('id', 'nameOnCert');
      span.setAttribute('id', 'priceDisplay');

      h6.appendChild(document.createTextNode(typeArr[i]));
      smLand.appendChild(document.createTextNode(areaArr[i] + " for "));
      smName.appendChild(document.createTextNode(nameArr[i]));

      div.appendChild(h6);
      div.appendChild(smLand);
      div.appendChild(br);
      div.appendChild(smName);

      smRmv.appendChild(document.createTextNode('Remove'));
      span.appendChild(document.createTextNode('₹ ' + itemPrArr[i]));
      span.appendChild(br);
      span.appendChild(br);
      span.appendChild(smRmv);

      li.appendChild(div);
      li.appendChild(span);

      ul.insertBefore(li, promoBox);
      total = total + parseInt(itemPrArr[i]);
      document.getElementById("totalAmt").innerHTML = '₹ ' + (total - parseInt(discount));
      localStorage.setItem("total", (total - discount));
    }

    function applyCode() {
      var code = document.getElementById("couponCode").value;
      if (code != '') {
        document.getElementById("coupon").innerHTML = code;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("POST", "processing.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("code=" + code);
        xmlhttp.onload = function() {
          if (this.readyState == 4 && this.status == 200) {
            var amount = parseInt(this.responseText);
            total = total - amount;
            document.getElementById("discountAmt").innerHTML = '-₹ ' + amount;
            document.getElementById("totalAmt").innerHTML = '₹ ' + total;
            localStorage.setItem("total", total);
            localStorage.setItem("code", code);
            localStorage.setItem("discount", amount);
          }
        };
      }
    }
    //insert into Cart
    var typeOfLand = new Array();
    var landArea = new Array();
    var nameOnCertificate = new Array();
    var certificateType = new Array();
    var personalMsg = new Array();
    var total;
    var transactionAmount;
    typeOfLand = JSON.parse(localStorage.getItem('type'));
    landArea = JSON.parse(localStorage.getItem('area'));
    nameOnCertificate = JSON.parse(localStorage.getItem('name'));
    certificateType = JSON.parse(localStorage.getItem('cert'));
    personalMsg = JSON.parse(localStorage.getItem('msg'));
    total = JSON.parse(localStorage.getItem('total'));
    transactionAmount = parseInt(total);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", "processcart.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("addToCart=1&type=" + typeOfLand + "&area=" + landArea + "&nameOnCert=" + nameOnCertificate + "&certType=" + certificateType + "&msg=" + personalMsg + "&txnAmt=" +transactionAmount);
    xmlhttp.onload = function() {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
      }
    };
  }
  </script>
</body>
</html>
