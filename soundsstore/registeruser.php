

<?php 


// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

require_once('includes/connection.php');
require_once('includes/user.php');
require_once('includes/header.php');
require_once('includes/form.php');

//this is a POST request, Create a new page
if(isset($_POST['submit'])==true){

	$oUser = new User();

	$oUser->sUserName = $_POST['login_name'];
	$oUser->sPassWord = password_hash($_POST['password'],PASSWORD_DEFAULT);
	$oUser->sFirstName = $_POST['first_name'];
	$oUser->sLastName = $_POST['last_name'];
	$oUser->sAddress = $_POST['address'];
	$oUser->sTelephone = $_POST['telephone'];
	$oUser->sEmail = $_POST['email_address'];

	$oUser->save();

	//redirect to success.php page

	header('Location: login.php');

}

$oForm = new Form();
$oForm->open();
$oForm->makeTextArea('User Name','login_name');
$oForm->makeTextArea('First Name','first_name');
$oForm->makeTextArea('Last Name','last_name');
$oForm->makeTextArea('Email','email_address');
$oForm->makeTextArea('Password','password');
$oForm->makeTextArea('Re enter Password','password');
$oForm->makeTextArea('Address','address');
$oForm->makeTextArea('Phone','telephone');
$oForm->makeSubmit('Submit');
$oForm->close();

?>

<!-- /* ================================= 
//   Page Content
// ==================================== */ -->

<div class="jumbotron">
		   <div class=" text-center container">
		     <h3>Sign Up</h3>
		     <h4>To keep updated with all the new releases and promotions at Sounds Store</h4>
		     <p></p>
		   </div>
		 </div>

	<div class="container-fluid row">
	  <div class="text-center col-xs-12 col-md-5 col-md-offset-3">

		<!-- <form class="text-center form-horizontal"> -->

		 <?php 
		  echo $oForm->sHTML;

		 ?>		

	</div>
</div>


 <?php   
 require_once('includes/footer.php');
 ?>

