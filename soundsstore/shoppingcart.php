<!-- /* ================================= 
  PHP require
==================================== */ -->

<?php 


require_once('includes/header.php');
require_once('includes/view.php');

 $oCart = $_SESSION['cart'];

 echo View::renderCart($oCart);

	// echo $oCart->$sHTML;

?>

<!-- /* ================================= 
//   Page Content
// ==================================== */ -->


<!-- <div class="col-xs-12 col-md-9">

<h2>Your Cart</h2>
<a class="keepShopping" href="home.php"><p>Keep shopping</p></a>
<table class="table table-bordered">
	<tr>
		<th>Product name</th>
		<th>Price</th>
		<th>Quantity</th>
		<th></th>
		<th>Total</th>
	</tr>
	<tr>
		<td>Product name</td>
		<td>Price</td>
		<td>Quantity</td>
		<td><a href=""><span class="glyphicon glyphicon-remove"</span></a></td>
		<td>Total</td>
	</tr>

	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>Order Total</td>
		<td>$</td>
	</tr>

</table>

	<div class="total text-right">
	<button class="btn btn-default" type="submit">Checkout</button>
	</div>
</div> -->

<!-- /* ================================= 
//   PHP require
// ==================================== */ -->

<?php

require_once('includes/footer.php');
 
?>