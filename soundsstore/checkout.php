<?php

require_once('includes/cart.php');

session_start();

require_once('includes/order.php');

$oCart= $_SESSION['cart'];

//create new order
$oOrder = new Order();
$oOrder->sOrderDate=date('Y-m-d');
$oOrder->sDeliveryDate=date('Y-m-d');
$oOrder->sStatus='pending';
$oOrder->iCustomerId=$_SESSION['userid'];
$oOrder->save();


foreach($oCart->aContents as $iProductId=>$iQuantity){
	$oOrder->attach($iProductId,$iQuantity);
}

//echo '<pre>';
//print_r($oOrder);
//echo '</pre>';
