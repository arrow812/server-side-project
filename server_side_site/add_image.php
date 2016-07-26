
<?php
ob_start();
require_once('includes/header.php');
require_once('includes/connection.php');
require_once('includes/form.php');
require_once('includes/type_manager.php');
require_once('includes/images.php');

// echo'<pre>';
// echo print_r($oForm);
// echo'</pre>';


if(!isset($_SESSION['user_id'])){
header('Location: log_in.php');
}

//error_reporting(E_ALL);


$oForm = new Form();

    if(isset($_POST['submit'])== true){

        //move the file to the permanent location

        $aFileDetails = $_FILES['file'];
        $sNewName = time().$aFileDetails['name'];
        $to = dirname(".").'/image/'.$sNewName;

        move_uploaded_file($aFileDetails['tmp_name'],$to);


        //$target_dir = "uploads/";

        

        $oForm->aData = $_POST;


        //testing

//        echo'<pre>';
//        echo print_r($aFileDetails);
//        echo'</pre>';

        //validate input data
//
//         echo'<pre>';
//         echo print_r($sNewName);
//         echo'</pre>';


        $oImage = new Image();

//        echo'<pre>';
//        echo print_r($_POST['id']);
//        echo'</pre>';

        $oImage->sFile = $sNewName;
        $oImage->iTypeId = $_POST['type_id'];
        $oImage->iUserId = $_SESSION['user_id'];

        $oImage->save();


//        $this->iId=$aRow['id'];
//        $this->sFile=$sNewName;
//        $this->iTypeId=$aRow['type_id'];
//        $this->iUserId=$aRow['user_id'];

}

$oForm->open('ADD IMAGE','');
$oForm->selectInput('Choose STYLE','type_id',TypeManager::listTypes());
$oForm->chooseFile('ADD IMAGE','file','');
$oForm->submitFile('ADD IMAGE');
$oForm->close();

echo $oForm->sHTML;


if(isset($_POST['submit'])){
    header('Location:main.php?typeid='.$oImage->iTypeId);
}


require_once('includes/footer.php');

?>

<!---->
<!--    <form class="form">-->
<!--  <h3>ADD IMAGE</h3>-->
<!--<!--   <fieldset class="form-group">-->
<!--    <label for="exampleInputEmail1">Email address</label>-->
<!--    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">-->
<!--    <small class="text-muted">We'll never share your email with anyone else.</small>-->
<!--  </fieldset> -->
<!--  <fieldset class="form-group">-->
<!--    <label for="exampleSelect1">Select Image Label</label>-->
<!--    <select class="form-control" id="exampleSelect1">-->
<!--      <option>Landscape</option>-->
<!--      <option>Moody</option>-->
<!--      <option>Escape</option>-->
<!--      <option>Architecture</option>-->
<!--    </select>-->
<!--  </fieldset>-->
<!--  -->
<!--<!--   text area could be for $sContent <fieldset class="form-group">-->
<!--    <label for="exampleTextarea">Example textarea</label>-->
<!--    <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>-->
<!--  </fieldset> -->
<!--      -->
<!--  <fieldset class="form-group">-->
<!--    <label for="exampleInputFile">Image input</label>-->
<!--    <input type="file" class="form-control-file" id="exampleInputFile">-->
<!--    <small class="text-muted">Images must be over this big...</small>-->
<!--  </fieldset>-->
<!--  <div class="radio">-->
<!--    <label>-->
<!--      <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>-->
<!--      This Image is your work blah blah -->
<!--    </label>-->
<!--  </div>-->
<!-- -->
<!--  -->
<!--  -->
<!--  <button type="submit" class="btn btn-primary">Submit</button>-->
<!--</form>-->



