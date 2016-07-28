<?php
ob_start();
session_start();
require_once('type_manager.php');
require_once('view.php');
require_once('connection.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pixette</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/grayscale.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9] -->

    


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    

        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    

</head>



<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="main.php">
                    <i class="fa fa-picture-o"></i>  <span class="light"></span> Pixette
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">




                <?php
                $aTypes = TypeManager::getTypes();

                 echo View::renderNav($aTypes);



//                <!-- <div class="dropdown nav navbar-nav">
//                      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">View by Type
//                          <span class="caret"></span></button>
//                      <ul class="dropdown-menu">
//                      <li class="hidden"><a href="#page-top"></a></li> -->
//                          <!-- <li><a href="#">Moody</a></li>
//                          <li><a href="#">Landscape</a></li>
//                          <li><a href="#">Escape</a></li>
//                          <li><a href="#">Architecture</a></li> -->
//                      <!-- </ul>
//                </div> -->

$sHTML='<ul class="nav navbar-nav ">';

                    if(isset($_SESSION['user_id'])){

                        $sHTML.= ' <li>
                                   <a class="page-scroll" href="add_image.php">Add Image</a>
                               </li>
                              
                               <li>
                                   <a class="page-scroll" href="edit_user.php">edit_user</a>
                               </li>
                
                               <li>
                                 <a class="page-scroll" href="log_out.php">log out</a>
                               </li>


                               <li>
                                 <button class="btn btn-primary"><i class="fa fa-angle-up animated"></i></button>

                                                          
                               </li>';



                    }


                  if(!isset($_SESSION['user_id'])){

                      $sHTML.= '<li>
                             <a class="page-scroll" href="log_in.php">Login</a>
                         </li>
                         
                         <li>
                             <a class="page-scroll" href="sign_up.php">Sign Up</a>
                         </li>';
                  }

$sHTML.= '</ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>';

 echo $sHTML;

?>
 <script>
    $(document).ready(function(){
        $("button").click(function(){
            $(".toggle").toggle(100);
        });
    });
</script>

<script>
function collapseNavbar(){$(".navbar").offset().top>50?$(".navbar-fixed-top").addClass("top-nav-collapse"):$(".navbar-fixed-top").removeClass("top-nav-collapse")}function init(){var e={zoom:15,center:new google.maps.LatLng(40.67,(-73.94)),disableDefaultUI:!0,scrollwheel:!1,draggable:!1,styles:[{featureType:"water",elementType:"geometry",stylers:[{color:"#000000"},{lightness:17}]},{featureType:"landscape",elementType:"geometry",stylers:[{color:"#000000"},{lightness:20}]},{featureType:"road.highway",elementType:"geometry.fill",stylers:[{color:"#000000"},{lightness:17}]},{featureType:"road.highway",elementType:"geometry.stroke",stylers:[{color:"#000000"},{lightness:29},{weight:.2}]},{featureType:"road.arterial",elementType:"geometry",stylers:[{color:"#000000"},{lightness:18}]},{featureType:"road.local",elementType:"geometry",stylers:[{color:"#000000"},{lightness:16}]},{featureType:"poi",elementType:"geometry",stylers:[{color:"#000000"},{lightness:21}]},{elementType:"labels.text.stroke",stylers:[{visibility:"on"},{color:"#000000"},{lightness:16}]},{elementType:"labels.text.fill",stylers:[{saturation:36},{color:"#000000"},{lightness:40}]},{elementType:"labels.icon",stylers:[{visibility:"off"}]},{featureType:"transit",elementType:"geometry",stylers:[{color:"#000000"},{lightness:19}]},{featureType:"administrative",elementType:"geometry.fill",stylers:[{color:"#000000"},{lightness:20}]},{featureType:"administrative",elementType:"geometry.stroke",stylers:[{color:"#000000"},{lightness:17},{weight:1.2}]}]},t=document.getElementById("map");map=new google.maps.Map(t,e);var l="img/map-marker.png",o=new google.maps.LatLng(40.67,(-73.94));new google.maps.Marker({position:o,map:map,icon:l})}$(window).scroll(collapseNavbar),$(document).ready(collapseNavbar),$(function(){$("a.page-scroll").bind("click",function(e){var t=$(this);$("html, body").stop().animate({scrollTop:$(t.attr("href")).offset().top},1500,"easeInOutExpo"),e.preventDefault()})}),$(".navbar-collapse ul li a").click(function(){"dropdown-toggle active"!=$(this).attr("class")&&"dropdown-toggle"!=$(this).attr("class")&&$(".navbar-toggle:visible").click()});var map=null;google.maps.event.addDomListener(window,"load",init),google.maps.event.addDomListener(window,"resize",function(){map.setCenter(new google.maps.LatLng(40.67,(-73.94)))});</script>

