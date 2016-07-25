<?php
session_start();
require_once('includes/connection.php');
require_once('includes/vote.php');
require_once('includes/types.php');



if(!isset($_SESSION['user_id'])){
	Header('Location:log_in.php');
}else
	{

	$oVote = new Vote();
	$oVote->iImageId = $_GET['imageid'];
	$oVote->iValue = 1 ;
	$oVote->iUserId = $_SESSION['user_id'];
	$oVote->save();
	
	$oImage = new Image();
	$oImage->load($_GET['imageid']);


	
	 // echo '<pre>';
	 // print_r($oVote);
	 // echo '</pre>';
	
	//redirect

	header('Location: main.php?typeid='.$oImage->iTypeId);
  
	  }
?>


