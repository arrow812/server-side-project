<?php
session_start();
require_once('includes/connection.php');
require_once('includes/vote.php');

$oVote = new Vote();


$oVote->iImageId = $_GET['imageid'];
$oVote->iValue = 1 ;
$oVote->iUserId = $_SESSION['user_id'];

$oVote->save();



// echo '<pre>';
// print_r($oVote);
// echo '</pre>';

//redirect

header('Location: main.php');
?>


