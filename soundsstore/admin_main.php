<?php 
require_once('includes/admin_header.php');
require_once('includes/connection.php');



$iCurrentGenreId = 1;

  if(isset($_GET['genreid'])==true){
  $iCurrentGenreId=$_GET['genreid'];
  }

$oGenre = new Genre();
$oGenre->load($iCurrentGenreId);
echo View::renderAdminGenre($oGenre);


    require_once('includes/footer.php');


 ?>