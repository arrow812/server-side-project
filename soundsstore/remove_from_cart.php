<?php 

require_once('includes/cart.php');

session_start();

if(isset($_SESSION['userid'])==false){
	header('Location:login.php');

}


$oCart = $_SESSION['cart'];
$iProductId = $_GET['productid'];
$oCart->remove($iProductId);

header('Location:shoppingcart.php');


 ?>