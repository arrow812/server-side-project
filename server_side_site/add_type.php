<?php
ob_start();
require_once('includes/connection.php');
require_once('includes/types.php');
require_once('includes/form.php');
require_once('includes/header_admin.php');


$oForm = new Form();

$oType = new Type();
$oType->sTypeName = isset($_GET['type_name']);
$oType->save();


    $oForm->open('Add new image type','');
    $oForm->makeTextInput('','type_name','New Type Name','New Type Name','');
    $oForm->submitFile('ADD TYPE');
    $oForm->close();

echo $oForm->sHTML;



if(isset($_POST['submit'])==true){

    header('Location:main.php?typeid='.$oType->iId);

}


require_once('includes/footer.php');