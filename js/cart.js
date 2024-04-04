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
        xmlhttp.open("POST", "getcode.php", true);
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
  }
