<?php
require_once('includes/connection.php');
require_once('includes/header.php');
require_once('includes/types.php');

//'<pre>';
//echo print_r($_SESSION['user_id']);
//'<pre>';


//check to see if we have typeId in query string
if(isset($_GET['typeid'])==true){
    $iCurrentTypeId = $_GET['typeid'];
    $oType = new Type();
    $oType->load($iCurrentTypeId);
    echo View::renderType($oType);

}else{

        $aImages = TypeManager::listImages();
        echo View::renderAllImages($aImages);
    }

?>

    <!-- Intro Header -->
<!--     <header class="intro" style="background-image:url(image/a.jpg)">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading"></h1>
                        <p class="intro-text">image</p>
                        <a href="#about" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                        <a href="#about" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-up animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>



   


    <!-- About Section -->
    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Not So Many Images??..</h2>
                <p>Upload some of your own...</p>
                <a href="http://startbootstrap.com/template-overviews/grayscale/">The theme is open source, and you can use it for any purpose, personal or commercial</a>
            </div>
        </div>
    </section>

   


    <!-- jQuery -->
    <!-- <script src="js/jquery.js"></script> -->

    <!-- Bootstrap Core JavaScript -->
    <!-- <script src="js/bootstrap.min.js"></script> -->

    <!-- Plugin JavaScript -->
   <script src="js/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
   <!--  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script> -->

    <!-- Custom Theme JavaScript -->
    <script src="js/grayscale.js"></script>

<!--    footer includes social media -->

<?php
require_once('includes/footer.php');
?>