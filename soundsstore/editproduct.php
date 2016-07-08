<?php
require_once('includes/header.php');
require_once('includes/connection.php');
require_once('includes/products.php');
require_once('includes/form.php');

$iUserId = $_SESSION['userid'];


$iCurrentProductId = 1;

if(isset($_GET['productid'])==true){
	$iCurrentProductId=$_GET['productid'];
}


$oProduct = new Product();
$oProduct->load($iCurrentProductId);


$aStickyData = [];
$aStickyData['album_name']=$oProduct->sAlbumName;
$aStickyData['description']= $oProduct->sDescription;
$aStickyData['price']= $oProduct->iPrice;
$aStickyData['photo']= $oProduct->sPhoto;
$aStickyData['genre_id']= $oProduct->iGenreId;
$aStickyData['year']= $oProduct->iYear;
$aStickyData['artist_name']= $oProduct->sArtistName;


$oForm = new Form();


$oForm->aData=$aStickyData;  //assign sticky data to form
//NEED!!! if submit button clicked _POST new data to DB...
if(isset($_POST['submit'])==true){
	$oProduct->sAlbumName=$_POST['album_name'];
	$oProduct->sDescription=$_POST['description'];
	$oProduct->iPrice=$_POST['price'];
	$oProduct->sPhoto=$_POST['photo'];
	$oProduct->iGenreId=$_POST['genre_id'];
	$oProduct->iYear=$_POST['year'];
	$oProduct->sArtistName=$_POST['artist_name'];

	$oProduct->save();


// echo '<pre>';
// echo print_r($oProduct);
// echo '<pre>';

	header('Location:admin_main.php?genreid='.$oProduct->iGenreId);
}

$oForm->open();
$oForm->makeTextArea('Artist','artist_name');
$oForm->makeTextArea('Album','album_name');
$oForm->makeContentArea('Description','description');
$oForm->makeTextArea('Price','price');
$oForm->makeFileI('Photo','photo');
$oForm->makeTextArea('Genre ID','genre_id');
$oForm->makeTextArea('Year','year');
$oForm->makeSubmit('update','submit');
$oForm->close();


// $oProduct->load(3);
//     echo'<pre>';
//     print_r($oProduct);
//      echo'</pre>';

?>

<div class="jumbotron">
	<div class=" text-center container">
		<h3>Edit Product</h3>
		<h4></h4>
		<p>	<!-- <a class="btn btn-primary" href="edituser.php" role="button">Edit User Details</a> --></p>
	</div>
</div>

<div class="container-fluid row">
	<div class="text-center col-xs-12 col-md-5 col-md-offset-3">

		<?php
		echo $oForm->sHTML;
		require_once('includes/footer.php');
		?>

	</div>

</div>

   
