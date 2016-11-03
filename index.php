<?php
require_once 'core/init.php';
include 'includes/head.php';
include 'includes/navigation.php';
include 'includes/headerfull.php';
include 'includes/leftbar.php';

$sql = "SELECT * FROM products WHERE featured = 1";
$result = $db->query($sql);
?>
    <!-- main content -->
  <div class="col-md-8">
    <div class="row">
      <h2 class="text-center">Feature Products</h2>
      <?php while($product = mysqli_fetch_assoc($result)) : ?>
         <!--var_dump($product);  it´s useful to debug and see what is in action-->
          <div class="col-md-3">
            <h4><?= utf8_encode($product['title']);?></h4>
            <img src="<?= $product['image'];?>" alt="<?= $product['title'];?>" class="img-thumb"/>
            <p class="list-price text-danger">List Price: <s>$<?= $product['list_price'];?></s></p>
            <p class="price">Our Price: $<?= $product['price'];?></p>
            <button type="button" class="btn btn-sm btn-success" onclick="detailsmodal(<?= $product['id'];?>)">Details</button>
          </div>
      <?php endwhile; ?>
    </div>
  </div>
  
  <?php
  include 'includes/rightbar.php';
  include 'includes/footer.php';
   ?>
