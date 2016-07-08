<?php 

	include_once('includes/header.php');

	if(isset($_SESSION['userid'])==false){
	header('Location: login.php');
	}

	include_once('includes/connection.php');
	include_once('includes/user.php');
	include_once('includes/form.php');

	?>
	
		
	<div class="jumbotron">
		   <div class=" text-center container">
		     <h3>Edit User Details</h3>
		     <h4>edit your details</h4>
		     <p></p>
		   </div>
		 </div>



	<div class="container-fluid row">
	  	<div class="  col-md-8 col-md-offset-2">

<?php

	$iUserId = $_SESSION['userid'];

	// if(isset($_GET['userid'])==true){
	// 	$iUserId= $_GET['userid'];
	// }

	$oUser = new User();
	$oUser->load($iUserId);

//echo print_r($oUser);
	//make sticky data for form

	$aStickyData=[];

	$aStickyData['login_name'] = $oUser->sUserName;
	$aStickyData['password'] = $oUser->sPassWord;
	$aStickyData['first_name'] = $oUser->sFirstName;
	$aStickyData['last_name'] = $oUser->sLastName;
	$aStickyData['address'] = $oUser->sAddress;
	$aStickyData['telephone'] = $oUser->sTelephone;
	$aStickyData['email_address'] = $oUser->sEmail;

	$oForm = new Form();


	$oForm->aData = $aStickyData;

	if(isset($_POST['submit']) == true){
		$oUser->sFirstName =$_POST['first_name'];
		$oUser->sLastName =$_POST['last_name'];
		$oUser->sPassWord =$_POST['password'];
		$oUser->sAddress =$_POST['address'];
		$oUser->sTelephone =$_POST['telephone'];
		$oUser->sEmail =$_POST['email_address'];
		$oUser->sUserName =$_POST['login_name'];

		$oUser->save();

		header ('Location: main.php');
	}


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
	

	 '<a class="btn btn-primary" href="main.php" role="button">Update</a>';
		 

		 echo $oForm->sHTML;


// echo '<pre>';
// echo print_r($aStickyData);
// echo '<pre>';



 require_once('includes/footer.php');
 ?>
	










 