<?php

require_once('connection.php');
require_once('images.php');

class Type{

	public $iId;
	public $sTypeName;
	public $aImages;

	public function __construct(){
		$this->iId=0;
		$this->sTypeName='';
		$this->aImages=[];
	}

	public function load($iId){
		$oConnection = new Connection();

		$sSQL = 'SELECT id, type_name FROM types WHERE id = '.$iId;

		$oResultSet= $oConnection->query($sSQL);

		$aRow = $oConnection->fetch($oResultSet);

		$this->iId= $aRow['id'];
		$this->sTypeName= $aRow['type_name'];

		//query all type IDs of the image
		$sSQL = 'SELECT id FROM images WHERE type_id = '.$iId;

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

}

//testing

$oType = new Type();
$oType->load(3);

echo '<pre>';
print_r($oType);
echo '</pre>';



?>

