<?php
   require_once $_SERVER['DOCUMENT_ROOT'].'/ecommerce2/core/init.php';
   unset($_SESSION['SBUser']);
   header('Location: login.php');
 ?>
