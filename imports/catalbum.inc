<div class="album">
    <div class="container">
      <?php
        include("dbcon.inc");
        if (isset($_GET['cat'])) {
          $catr = $_GET['cat'];
          $cat = ucfirst($catr);
      ?>
      <h5 class="card-text"><?php echo $cat; ?></h5>
      <br>
      <form action="index.html" method="get">
      <div class="row">
        <?php
          $sql = "SELECT * FROM book WHERE cat = '$cat'";
          $retval = mysqli_query($con,$sql);
          $rowcount=mysqli_num_rows($retval);
          $category = array();
          $bid = array();
          $name = array();
          $author = array();
          $price = array();
          $image = array();
          $imageurl = array();
          $i = 0;
          while ($row=mysqli_fetch_assoc($retval)) {
              //$category[$i] = $row['cat_name'];
              $bid[$i] = $row['b_id'];
              $name[$i] = $row['b_name'];
              $author[$i] = $row['b_author'];
              $price[$i] = $row['b_price'];
              $image[$i] = $row['b_image'];
              $imageurl[$i] = "books/".$image[$i];
              $i++;
            }
            for ($i=0; $i <$rowcount ; $i++) {
          ?>
        <div class="col-md-3">
          <div class="card mb-4 box-shadow">
            <a href="product.php?bookid=<?php echo $bid[$i]; ?>"><img class="card-img-top" src="<?php echo $imageurl[$i];?>" alt="Card image cap"></a>
            <div class="card-body">
              <strong class="card-text"><?php echo $name[$i]; ?></strong>
              <br>
              <p><?php echo $author[$i]; ?></p>
              <small class="text-muted"><?php echo "Price: ₹ ".$price[$i]; ?></small>
            </div>
          </div>
        </div>
      <?php
          }
        }
        else {
        ?>
        <h5 class="card-text">All Categories</h5>
        <br>
        <form action="index.html" method="get">
        <div class="row">
        <?php
          $sql = "SELECT * FROM book";
          $retval = mysqli_query($con,$sql);
          $rowcount=mysqli_num_rows($retval);
          $category = array();
          $bid = array();
          $name = array();
          $author = array();
          $price = array();
          $image = array();
          $imageurl = array();
          $i = 0;
          while ($row=mysqli_fetch_assoc($retval)) {
              //$category[$i] = $row['cat_name'];
              $bid[$i] = $row['b_id'];
              $name[$i] = $row['b_name'];
              $author[$i] = $row['b_author'];
              $price[$i] = $row['b_price'];
              $image[$i] = $row['b_image'];
              $imageurl[$i] = "books/".$image[$i];
              $i++;
            }
            for ($i=0; $i <$rowcount ; $i++) {
          ?>
          <div class="col-md-3">
            <div class="card mb-4 box-shadow">
              <a href="product.php?bookid=<?php echo $bid[$i]; ?>"><img class="card-img-top" src="<?php echo $imageurl[$i];?>" alt="Card image cap"></a>
              <div class="card-body">
                <strong class="card-text"><?php echo $name[$i]; ?></strong>
                <br>
                <p><?php echo $author[$i]; ?></p>
                <small class="text-muted"><?php echo "Price: ₹ ".$price[$i]; ?></small>
              </div>
            </div>
          </div>
        <?php
            }
          }
        ?>
      </div>
    </form>
    </div>
  </div>
