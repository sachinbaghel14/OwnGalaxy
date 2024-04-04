  <?php
    if (isset($_SESSION['user'])) {
  ?>
  <button type="button" class="btn btn-sm btn-outline-secondary" name="details">
    Details </button>
  <?php
  }
  else {
    ?>
    <button type="button" class="btn btn-sm btn-outline-secondary" name="details">
    <a href="signin.php" onMouseOver="this.style.color='white'"  onMouseOut="this.style.color='gray'">Details</a></button>
    <?php
        }
    ?>
