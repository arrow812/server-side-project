
<?php

require_once('includes/header.php');
require_once('includes/user.php');
require_once('includes/view.php');

if(isset($_SESSION['userid']) == false){
	header('Location:login.php');

}
?>

<div class="jumbotron">
		   <div class=" text-center container">
		     <h3>User Details</h3>
		     <h4>To keep updated.</h4>
		     <p></p>
		   </div>
		 </div>


	<div class="container-fluid row">
	  	<div class="  col-md-8 col-md-offset-2">
	  
<?php

$iUserId = $_SESSION['userid'];
$oUser = new User();
$oUser->load($iUserId);
echo View::renderUserDetails($oUser);
?>
 <a class="btn btn-primary container-fluid col-xs-12" href="edituser.php" role="button"> Edit </a>
		</div>
	</div>
 
 <?php   
 require_once('includes/footer.php');
 ?>

