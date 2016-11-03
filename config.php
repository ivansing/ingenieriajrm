<?php
  define('BASEURL', $_SERVER['DOCUMENT_ROOT'].'/ecommerce2/');
  define('CART_COOKIE','SdA8ckRkOw4O');
  define('CART_COOKIE_EXPIRE',time() + (86400 *30));
  define('TAXRATE',0); // sales tax rate set to 0 if you aren´t charging tax

  define('CURRENCY' , 'usd');
  define('CHECKOUTMODE','TEST'); // change TEST TO LIVE when you are ready to go LIVE

  if(CHECKOUTMODE == 'TEST'){
    define('STRIPE_PRIVATE','sk_test_XYheUdEgQpvNbIkCrPYFQK1e');
    define('STRIPE_PUBLIC','pk_test_PkYrgvHcey9GWcwLsBiLaetr');
  }

  if(CHECKOUTMODE == 'LIVE'){
    define('STRIPE_PRIVATE','sk_live_lqwh35uV4pJAz0rrpIKaaZs0');
    dedine('STRIPE_PUBLIC','pk_live_vnTpPFYvMBUwvekvR8ZhWGhC ');
  }
