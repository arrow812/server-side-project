<?php
    require_once('includes/header.php');
//     require_once('add_to_cart.php');
    require_once('includes/connection.php');



$iCurrentGenreId = 1;

  if(isset($_GET['genreid'])==true){
  $iCurrentGenreId=$_GET['genreid'];
  }

$oGenre = new Genre();
$oGenre->load($iCurrentGenreId);
echo View::renderGenre($oGenre);


    require_once('includes/footer.php');