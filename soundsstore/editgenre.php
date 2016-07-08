<?php

require_once('includes/header.php');
require_once('includes/connection.php');
require_once('includes/genres.php');
require_once('includes/form.php');


$iUserId = $_SESSION['userid'];

$iCurrentGenre = 1;

if(isset($_GET['genreid'])==true){
    $iCurrentGenreId = $_GET['genreid'];
}

$oGenre = new Genre();
$oGenre->load($iCurrentGenre);

$aStickyData = [];

$aStickyData['genre_name']=$oGenre->sGenreName;
$aStickyData['genre_description']=$oGenre->sGenreDescription;

$oForm= new Form;

$oForm->aData=$aStickyData;

if(isset($_POST['submit'])==true){
    $oGenre->sGenreName=$_POST['genre_name'];
    $oGenre->sGenreDescription=$_POST['genre_description'];
    $oGenre->save();

    header('Location:main.php');

}


$oForm->open();
$oForm->makeTextArea('Genre','$sGenre');
$oForm->makeTextArea('Genre Description','$sGenreDescription');
$oForm->makeSubmit('edit','submit');
$oForm->close();

$oGenre->load(2);
echo'<pre>';
print_r($oGenre);
echo'</pre>';


?>
