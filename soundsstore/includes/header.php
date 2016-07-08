<?php 

require_once('cart.php');
session_start();

require_once('genremanager.php');
require_once('view.php');
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sounds Store</title>
  <link rel="stylesheet" href="styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	
</head>
<body>
	

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand nav-title" href="main.php">Sounds Store</a>
    </div>
   <!--  <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li> -->


<!-- //getting data from model    -->   

      <?php $aGenres = GenreManager::getGenres();
//sending data to view for rendering
          echo View::RenderNav($aGenres);
       ?>
      <!-- <li><a href="#">Rock</a></li>
      <li><a href="#">Pop</a></li>
      <li><a href="#">Hip Hop</a></li>
      <li><a href="#">Folk</a></li> 
    </ul> -->
    <ul class="nav navbar-nav navbar-right">

      <li><a href="userdetails.php">My Details</a></li>
      <li><a href="admin_main.php">Admin</a></li>
      <li><a href="#">My Orders</a></li> 
      <li><a href="shoppingcart.php">Shopping Cart</a></li> 



      <?php 

      if(isset($_SESSION['userid'])==true){
        echo '<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>';
      }else{
       echo '<li><a href="registeruser.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';

      }
       ?>

     
<!-- 
     <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="#">HTML</a></li>
      <li><a href="#">CSS</a></li>
      <li><a href="#">JavaScript</a></li>
    </ul>
  </div> -->

      
      


    </ul>
  </div>
</nav>










