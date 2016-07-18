<?php 
require_once('includes/view.php');
require_once('includes/connection.php');
require_once('includes/form.php');
require_once('includes/header.php');
require_once('includes/user.php');

$sMessage = '';

$oForm = new Form();
$oForm->open();
$oForm->makeTextArea('User Name','login_name');
$oForm->makeTextArea('Password','password');
$oForm->makeSubmit('Submit');
$oForm->close();



if(isset($_POST['submit'])==true){

	$oUser= new User();
	$bSuccess = $oUser->loadByUserName($_POST['login_name']);
	if($bSuccess == true){

		if(password_verify($_POST['password'],$oUser->sPassWord) == true){
			$_SESSION['userid'] = $oUser->iId;

			//add session to cart
			$oCart = new Cart();
			// $oCart->add(2);//testing for now..
			// $oCart->add(8);//testing for now..
			// $oCart->add(5);//testing for now..
			// $oCart->add(3);//testing for now..
			// $oCart->add(8);//testing for now..
			// $oCart->add(5);//testing for now..
			// $oCart->add(3);//testing for now..
			// $oCart->add(3);

			$_SESSION['cart'] = $oCart;


			header('Location: userdetails.php');
		}
	}

	$sMessage = 'Please try again';
}

?>

<div class="jumbotron">
		   <div class=" text-center container">
		     <h3>Sign In</h3>
		     <h4></h4>
		     <p></p>
		   </div>
		 </div>

	<div class="container-fluid row">
	  <div class="text-center col-xs-12 col-md-5 col-md-offset-3">

		<!-- <form class="text-center form-horizontal"> -->

		 <?php 

		  echo $oForm->sHTML;
		  echo $sMessage;

		  // echo'<pre>';
		  // print_r($oForm);
		  // echo'</pre>';

		 ?>	

	</div>
</div>


 <?php   
 require_once('includes/footer.php');
 ?>