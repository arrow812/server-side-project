<?php 

require_once('includes/connection.php');
require_once('includes/admin_header.php');
require_once('includes/products.php');
require_once('includes/form.php');

// echo'<pre>';
// echo print_r($_FILES);
// echo'</pre>';

$oForm = new Form();

// echo'<pre>';

// echo print_r($sNewName);

// echo'</pre>';
	

	if(isset($_POST['submit'])==true){


		//move the file to the permanent location

		$aFileDetails = $_FILES['photo'];
		$sNewName = time().$aFileDetails['name'];
		$to = dirname(".").'/assets/images/album_covers/'.$sNewName;

		move_uploaded_file($aFileDetails['tmp_name'],$to);

		$oForm->aData = $_POST;
	
	//validate input data
	if($_POST['artist_name'] == ''){
			$oForm->addError('artist_name','Fill in');
	}

	if($_POST['album_name'] == ''){
			$oForm->addError('album_name','Fill in');
	}

	if($_POST['price'] == ''){
			$oForm->addError('price','Fill in');
	}

	if($_POST['year'] == ''){
			$oForm->addError('year','Fill in');
	}

	if(count($oForm->aErrors) == 0){

		$oProduct = new Product();

		$oProduct->iId=$_POST['id'];
		$oProduct->sAlbumName = $_POST['album_name'];
		$oProduct->sDescription = $_POST['description'];
		$oProduct->iPrice = $_POST['price'];
		$oProduct->sPhoto = $sNewName;
		$oProduct->iGenreId = $_POST['genre_id'];
		$oProduct->iYear = $_POST['year'];
		$oProduct->sArtistName = $_POST['artist_name'];
		
		$oProduct->save();
		
//redirect browser to the new page
		header('Location:main.php?genreid='.$oProduct->iGenreId);

		// die(print_r($_POST));

	}
}

	$oForm->open();
	$oForm->makeTextArea('Artist Name', 'artist_name');
	$oForm->makeTextArea('Album Name', 'album_name');
	$oForm->makeSelectInput('Genre ID', 'genre_id',GenreManager::listGenres());
	$oForm->makeTextArea('Description', 'description');
	$oForm->makeTextArea('Price', 'price');
	$oForm->makeFileInput('Photo', 'photo');
	$oForm->makeTextArea('Year', 'year');
	$oForm->makeSubmit('Add Product','submit');

	$oForm->close();

	 ?>

	<div class="jumbotron">
		   <div class=" text-center container">
		     <h3>Add Product</h3>
		     <h4>Add a new product</h4>
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




