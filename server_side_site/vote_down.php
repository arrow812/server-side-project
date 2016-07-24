
<?php
session_start();
require_once('includes/connection.php');
require_once('includes/vote.php');
require_once('includes/images.php');
require_once('includes/types.php');

$oVote = new Vote();

$oVote->iImageId = $_GET['imageid'];
$oVote->iValue = -1 ;
$oVote->iUserId = $_SESSION['user_id'];

$oVote->save();



// echo '<pre>';
// print_r($oImage->iTypeId);
// echo '</pre>';

$iCurrentTypeId =

//header('Location: main.php');
header('Location: main.php?typeid='.$iTypeId.');
?>