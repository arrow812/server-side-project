<?php

require_once('includes/connection.php');
require_once('includes/admin_header.php');
require_once('includes/genres.php');
require_once('includes/form.php');


$oForm = new Form();

    if(isset($_POST['submit'])==true){
        $oForm->aData = $_POST;

        $oGenre = new Genre();

//        $oGenre->iId= $_POST['genre_id'];
        $oGenre->sGenreName= $_POST['genre_name'] ;
        $oGenre->sGenreDescription = $_POST['genre_description'] ;
        
        $oGenre->save();

   
   header('Location:main.php');
        
//    echo'<pre>';
//     print_r($oGenre);
//    echo'</pre>';

    }

    $oForm->open();
    $oForm->makeTextArea('Genre','genre_name');
    $oForm->makeTextArea('Description','genre_description');
    $oForm->makeSubmit('add');
    $oForm->close();


?>



<div class="jumbotron">
    <div class=" text-center container">
        <h3>Add Genre</h3>
        <h4>Add a new genre</h4>
        <p>	<!-- <a class="btn btn-primary" href="edituser.php" role="button">Edit User Details</a> --></p>
    </div>
</div>

<div class="container-fluid row">
    <div class="text-center col-xs-12 col-md-5 col-md-offset-3">

        <?php echo $oForm->sHTML; ?>
        <!-- <a class="btn btn-primary" href="edituser.php" role="button">Edit User Details</a> -->

    </div>

</div>

<!--
// echo'<pre>';
// print_r($oProduct);
// echo'</pre>'; -->

<?php
require_once('includes/footer.php');
?>
