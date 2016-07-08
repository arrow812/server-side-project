<?php

require_once('connection.php');


class Product{
	public $iId;
	public $sAlbumName;
	public $sDescription;
	public $iPrice;
	public $sPhoto;
	public $iGenreId;
	public $iYear;
	public $sArtistName;

	public function __construct(){
		$this->iId=0;
		$this->sAlbumName='';
		$this->sDescription='';
		$this->iPrice=0;
		$this->sPhoto='';
		$this->iGenreId=0;
		$this->iYear=0;
		$this->sArtistName='';
	}

	
	public function load($iId){
		$oConnection = new Connection();

		$sSQL = "SELECT id,album_name,description,price,photo,genre_id,year,artist_name 
				FROM products
				WHERE id = ".$oConnection->escape($iId);

		$oResultSet = $oConnection->query($sSQL);

		$aRow = $oConnection->fetch($oResultSet);
		//load data to variables
		$this->iId= $aRow['id'];
		$this->sAlbumName= $aRow['album_name'];
		$this->sDescription= $aRow['description'];
		$this->iPrice= $aRow['price'];
		$this->sPhoto= $aRow['photo'];
		$this->iGenreId= $aRow['genre_id'];
		$this->iYear= $aRow['year'];
		$this->sArtistName= $aRow['artist_name'];
	}

	public function delete(){

		$oConnection = new Connection;

		$sSQL = "DELETE FROM products
				WHERE id=".$this->iId;

		$oConnection->query($sSQL);
		echo $sSQL;

		if($oConnection->query($sSQL)==true){
			echo "Record Deleted";
		} else {
			echo "Error deleting Record";
		}
	}
	

	//function to save data to database
	public function save(){

		$oConnection = new Connection;

		if($this->iId == 0){

			$sSQL = "INSERT INTO products(album_name, description, price, photo, genre_id, year, artist_name) 
				VALUES ('".$oConnection->escape($this->sAlbumName)."',
				 '".$oConnection->escape($this->sDescription)."',
				  '".$oConnection->escape($this->iPrice)."',
				   '".$oConnection->escape($this->sPhoto)."',
				    '".$oConnection->escape($this->iGenreId)."',
				     '".$oConnection->escape($this->iYear)."',
				      '".$oConnection->escape($this->sArtistName)."')";

			$bSuccess = $oConnection->query($sSQL);
			//echo $sSQL;

			if($bSuccess == true){
			$this->iId = $oConnection->getInsertId();
			}

		}else{

			$sSQL = "UPDATE products 
					SET album_name = '".$oConnection->escape($this->sAlbumName)."',
					 description = '".$oConnection->escape($this->sDescription)."',
					  price = '".$oConnection->escape($this->iPrice)."',
					   genre_id = '".$oConnection->escape($this->iGenreId)."',
					    year = '".$oConnection->escape($this->iYear)."',
					     artist_name = '".$oConnection->escape($this->sArtistName)."' 
					WHERE id = ".$oConnection->escape($this->iId) ;


			$oConnection->query($sSQL);
			// echo $sSQL;


			}
	}

}




// $oProduct = new Product();
// $oProduct->load(31);
// $oProduct->delete();


// $oProduct->sDescription = 'abccc';
// $oProduct->sAlbumName = 'abccc';
// $oProduct->iPrice = 13;
// $oProduct->sPhoto = 'abccc';
// $oProduct->iGenreId = 2;
// $oProduct->iYear = 2000;
// $oProduct->sArtistName = 'abccc';


// $oProduct->save();

// // // $oProduct = new Product();
// // // $oProduct->load(4);

// echo '<pre>';
// print_r($oProduct);
// echo '</pre>';

?>