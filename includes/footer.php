</div><br><br>
<footer class="text-center" id="footer">&copy;Copyright 2016 Ingenieriajrm
  <div class="container">
    <div class="row bottom-rule">
      <div class="col-md-4 footer-section">
        <strong>Lo mejor en tecnologia</strong>
        <p>Lista de Correo</p>
        <form class="form-inline">
          <div class="form-group">
            <label class="sr-only" for="inputEmail">Correo</label>
            <input type="" class="form-control" id="inputEmail"
              placeholder="Ingresa tu email">
          </div>
          <button type="submit" class="btn btn-default">Suscribete</button>
        </form>
      </div>
      <div class="container-fluid">
        <div class="row">
      <div class="col-sm-5 footer-section">
    <ul class="list-inline">
        <li class="text-uppercase">Customer Service:</li>
        <li><a href="#">Returns</a></li>
        <li><a href="#">Privacy Policy</a></li>
        <li><a href="#">Our Guarantee</a></li>
        <li><a href="#">Shipping</a></li>
        <li><a href="#">Product Guides</a></li>
        <li><a href="#">Customer Care</a></li>
    </ul>
    <ul class="list-inline">
        <li class="text-uppercase">Social Media &amp; Articles:</li>
        <li><a href="#">Instagram</a></li>
        <li><a href="#">Pinterest</a></li>
        <li><a href="#">Twitter</a></li>
        <li><a href="#">Facebook</a></li>
        <li><a href="#">The Best Journal</a></li>
    </ul>
    <ul class="list-inline">
        <li class="text-uppercase">Events:</li>
        <li><a href="#">Hangout April 30</a></li>
        <li><a href="#">Makers Faire</a></li>
    </ul>
  </div>
    </div>
  </div>
</div>
</div>
</footer>

<script>
  jQuery(window).scroll(function(){
    var vscroll = jQuery(this).scrollTop();
    jQuery("#logotext").css({
      "transform" : "translate(0px, "+vscroll/2+"px)"
    });
    var vscroll = jQuery(this).scrollTop();
    jQuery("#back-flower").css({
      "transform" : "translate("+vscroll/5+"0px, -"+vscroll/12+"px)"// with the - will scroll faster
    });
    var vscroll = jQuery(this).scrollTop();
    jQuery("#fore-flower").css({
      "transform" : "translate(0px, -"+vscroll/4+"px)"// negative scroll up
    });
  });

  function detailsmodal(id){
    var data = {'id': id};
    jQuery.ajax({
      url : '/ecommerce2/includes/detailsmodal.php',
      method : 'post',
      data : data,
      success: function(data){
        jQuery('body').append(data);
        jQuery('#details-modal').modal('toggle');
      },
      error: function(){
        alert("something went wrong");
      }
    });
  }

// function update_cart(mode,edit_id,edit_size){
//   var data = {'mode' : mode, 'edit_id' : edit_id, 'edit_size': edit_size};
//   jQuery.ajax({
//     url : '/ecommerce2/admin/parsers/update_cart.php',
//     method: 'post',
//     data: data,
//     success : function(){location.reload();
//     }
//     error: function(){alert("Something went wrong");}
//   });
// }

function add_to_cart(){
  jQuery('#modal_error').html('');
  var size = jQuery("#size").val(); // we get the value from the form
  var quantity = jQuery("#quantity").val();
  var available = jQuery("#available").val();
  var error = '';
  var data = jQuery("#add_product_form").serialize(); // take the values of the form and get the parametres
  if(size == '' || quantity == '' || quantity == 0){
    error += '<p class="text-danger text-center">You must choose a size and quantity</p>';
    jQuery("#modal_errors").html(error);
    return;
  }else if(quantity > available){
    error += '<p class="text-danger text-center">There are only ' + available + ' available</p>'
    jQuery("#modal_errors").html(error);
    return;
  }else{
    jQuery.ajax({
      url : "/ecommerce2/admin/parsers/add_cart.php",
      method: 'post',
      data: data,
      success: function(){
        location.reload();
      },
      error : function(){alert("Something went wrong");}
    });
  }
}


</script>
</body>
</html>
