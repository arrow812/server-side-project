<?php
ob_start(); 
require_once('includes/header.php');

//die(print_r($_SESSION));

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

if(!isset($_SESSION['user_id'])){

    //die(print_r($_SESSION));

    header('Location: sign_up.php');

}

require_once('includes/connection.php');
require_once('includes/form.php');
require_once('includes/user.php');


$iUserId = $_SESSION['user_id'];

$oUser = new User();
$oUser->load($iUserId);


$aStickyData = [];
$aStickyData['email'] = $oUser->sEmail;
$aStickyData['first_name'] = $oUser->sFirstName;
$aStickyData['last_name'] = $oUser->sLastName;
$aStickyData['password'] = $oUser->sPassword;


//echo '<pre>';
//echo print_r($iUserId);
//echo '<pre>';


$oForm = new Form();

$oForm->aData = $aStickyData;

if(isset($_POST['submit'])==true){

    $oUser->sFirstName = $_POST['first_name'];
    $oUser->sLastName = $_POST['last_name'];
    $oUser->sEmail = $_POST['email'];
    $oUser->sPassword = $_POST['password'];

    $oUser->save();

    header('location: main.php');

}

//$oForm = new Form();
$oForm->open('EDIT DETAILS','');
$oForm->makeTextInput('','first_name','First Name','Enter First Name','');
$oForm->makeTextInput('','last_name','Last Name','Enter Last Name','');
$oForm->makeTextInput('','email','Email','Enter Email','');
//$oForm->makeTextInput('password','Password','Enter Password','');

$oForm->submit('UPDATE');

$oForm->close();


echo $oForm->sHTML;

// echo '<pre>';
// echo print_r($_SESSION['user_id']);
// echo '<pre>';


require_once('includes/footer.php');

?>

