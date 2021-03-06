<?php

require_once('connection.php');
require_once('images.php');

class Type{

	public $iId;
	public $sTypeName;
	public $aImages;
	public $iVisible;

	public function __construct(){
		$this->iId=0;
		$this->sTypeName='';
		$this->aImages=[];
		$this->iVisible=1;
	}

	public function load($iId){

		$oConnection = new Connection();

		$sSQL = 'SELECT id, type_name FROM types WHERE id = '.$iId;

		$oResultSet= $oConnection->query($sSQL);

		$aRow = $oConnection->fetch($oResultSet);

		$this->iId= $aRow['id'];
		$this->sTypeName= $aRow['type_name'];

		//query all type IDs of the image
		$sSQL =
			'SELECT images.id, SUM(value) score
			FROM images
			LEFT OUTER JOIN votes ON images.id=image_id
			WHERE type_id = '.$iId .' GROUP BY images.id
			ORDER BY score DESC';

		
		
		// echo($sSQL);

		$oResultSet = $oConnection->query($sSQL);

		//Fetch page IDs from the result set
		while($aRow = $oConnection->fetch($oResultSet)){
			$iTypeId= $aRow['id'];
			$oImage = new Image;
			$oImage ->load($iTypeId);
			$this->aImages[] = $oImage; // add more at the end of array

		}
	}



	public function save(){
		$oConnection = new Connection;

		if($this->iId == 0){

		$sSQL = "INSERT INTO types (type_name) 
                    VALUES ('".$oConnection->escape($this->sTypeName)."'".$this->iVisible."')";

		$bSuccess =  $oConnection->query($sSQL);

			if($bSuccess== true) {
			$this->iId = $oConnection->getInsertId();


			}
		}
	}
}


//testing
//
//$oType = new Type;
//$oType->sTypeName = 'Trees';
//$oType->save();
////
//echo '<pre>';
//print_r($oType);
//echo '</pre>';


?>

