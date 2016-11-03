<?php
//This script is to pass the id info updated from database
  require_once '../core/init.php';

  $id = ((isset($_POST['id']))?$_POST['id']:'');
  $id = (int)$id; // for security purposes have to be integer
  $sql = "SELECT * FROM products WHERE id='$id'";
  $r = $db->query($sql);
  $product = mysqli_fetch_assoc($r);
  // Brand dynamic data straction
  $brand_id = (($product['brand_id'])?$_POST['brand_id']:'');
  $sql = "SELECT brand FROM brand WHERE id='$brand_id'";
  $br = $db->query($sql);
  $brand = mysqli_fetch_assoc($br);
  //Size dynamic data straction
$sizestring = $product['sizes'];
$sizestring = rtrim($sizestring,',');
$sizestring = rtrim($sizestring,',');
$size_array = explode(',',$sizestring);
?>

<!-- Details Modal -->
<?php ob_start();?> <!-- will open or read all info in this page -->
<div class="modal fade details-1" id="details-modal" tabindex="-1" role="dialog" aria-labelledby="details-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" onclick="closeModal()" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title text-center"><?= utf8_encode($product['title']);?></h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <span id="modal_errors" class="bg-danger"></span>
            <div class="col-sm-6">
              <div class="center-block">
                <img src="<?= $product['image'];?>" alt="<?= $product['title'];?>" class="details img-responsive">
              </div>
            </div>
            <div class="col-sm-6">
              <h4>Details</h4>
              <p><?= nl2br($product['description']);?></p> <!-- nl2br preserve line breaks -->
              <hr>
              <p>Price: $<?= $product['price'];?></p>
              <p>Brand: <?= $brand['brand'];?></p>
              <form action="add_cart.php" method="post" id="add_product_form">
                <input type="hidden" name="product_id" value="<?=$id?>">
                <input type="hidden" name="available" id="available" value="">
                <div class="form-group">
                  <div class="col-xs-3">
                    <label for="quantity">Quantity:</label>
                    <input type="number" class="form-control" id="quantity" min="0" name="quantity"><!--min is not to show minus numbers in the box -->
                  </div><div class="col-xs-9"></div>
                </div><br><br><br><br>
                <div class="form-group">
                  <label for="size">Size:</label>
                  <select name="size" id="size" class="form-control">
                    <option value=""></option>
                    <?php foreach($size_array as $string){
                        $string_array = explode(':', $string);
                        $size = $string_array[0];
                        $available = $string_array[1];
                        if($available > 0){
                        echo '<option value="'.$size.'" data-available="'.$available.'">'.$size.' ('.$available.' Available)</option>';
                        }
                      } ?>

                  </select>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default" onclick="closeModal()">Close</button>
        <button class="btn btn-warning" onclick="add_to_cart();return false;"><span class="glyphicon glyphicon-shopping-cart">Add To Cart</span></button>
      </div>
  </div>
  </div>
</div>

<script>
    jQuery("#size").change(function(){
      var available = jQuery("#size option:selected").data("available");
      jQuery("#available").val(available);
    });

    function closeModal(){
    jQuery('#details-modal').modal('hide');
    setTimeout(function(){
      jQuery('#details-modal').remove();
      jQuery('.modal-backdrop').remove();
    },500);
  }

</script>
 <?php echo ob_get_clean();?><!-- this gonna clean memory buffer -->
