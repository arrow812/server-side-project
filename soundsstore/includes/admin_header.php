<?php 
session_start();

require_once('genremanager.php');
require_once('view.php');
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sounds Store</title>

	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	

<nav id = "navcolor" class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand nav-title" href="main.php">Sounds Store</a>
    </div>
   <!--  <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li> -->


<!-- //getting data from model    -->   

      <?php $aGenres = GenreManager::getGenres();
//sending data to view for rendering
          echo View::RenderAdminNav($aGenres);
       ?>
      <!-- <li><a href="#">Rock</a></li>
      <li><a href="#">Pop</a></li>
      <li><a href="#">Hip Hop</a></li>
      <li><a href="#">Folk</a></li> 
    </ul> -->
    <ul class="nav navbar-nav navbar-right">
      <li><a href="addproduct.php">Add Product</a></li>
      <li><a href="addgenre.php">Add Genre</a></li>
       <li><a href="userdetails.php">My Details</a></li>


      <?php 
      if(isset($_SESSION['userid'])==true){
       echo '<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>';
     }else{
      echo '  <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';

     }

       ?>

     <!--  <li><a href="#">My Orders</a></li> 
      <li><a href="#">Shopping Cart</a></li> 
      <li><a href="registeruser.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
    
      
    </ul>
  </div>
</nav>