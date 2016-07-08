<?php 
require_once('connection.php');
require_once('products.php');

class Genre{
	public $iId;
	public $sGenreName;
	public $sGenreDescription;
	public $aProducts;

	public function __construct(){
		$this->iId= 0;
		$this->sGenreName= "";
		$this->sGenreDescription= "";
		$this->aProducts= [];
	}//end of construct function


	public function load($iId){
		$oConnection = new Connection();

		$sSQL = 'SELECT id, genre_name, genre_description 
				FROM genres 
				WHERE id = '.$iId;

	$oResultSet = $oConnection->query($sSQL);

	$aRow = $oConnection->fetch($oResultSet);

	$this->iId = $aRow['id'];
	$this->sGenreName = $aRow['genre_name'];
	$this->sGenreDescription= $aRow['genre_description'];

	$sSQL = 'SELECT id FROM products WHERE genre_id='.$iId;

	$oResultSet = $oConnection->query($sSQL);

	//fetch ids from the result set use a while loop

		while($aRow = $oConnection->fetch($oResultSet)){
			$iProductId = $aRow['id'];

			$oProduct = new Product();
			$oProduct->load($iProductId);
			$this->aProducts[] = $oProduct;  // add more at the end of array
		}
	}//end of load function



	public function save(){//edit page function

		$oConnection = new Connection;

		$sSQL= "INSERT INTO genres (id, genre_name, genre_description) 
				VALUES (NULL, '".$this->sGenreName."', '".$this->sGenreDescription."')";

			$bSuccess = $oConnection->query($sSQL);

			//check for successful creation
			if($bSuccess == true){
				$this->iId = $oConnection->getInsertId();

			}//end of if statement

	}//end of save function

}//end of Genre class



// $oGenre = new Genre();
// $oGenre->load(3);
// $oGenre->sProductName= '';
// $oGenre->save();

// $oGenre = new Genre();
// $oGenre->load(3);

// echo '<pre>';
// print_r($oGenre);
// echo '</pre>';

 ?>