<?php 

require_once('includes/connection.php');
require_once('includes/user.php');


class User{

	public $iId;
	public $sUserName;
	public $sPassWord;
	public $sFirstName;
	public $sLastName;
	public $sAddress;
	public $sTelephone;
	public $sEmail;


	public function __construct(){
	$this->iId ='';
	$this->sUserName ='';
	$this->sPassWord ='';
	$this->sFirstName ='';
	$this->sLastName ='';
	$this->sAddress ='';
	$this->sTelephone ='';
	$this->sEmail ='';

	}


	public function save(){

	$oConnection = new Connection; 

	$sSQL= "INSERT INTO users(id, username, password, first_name, last_name, address, telephone, email) 
			VALUES (NULL, '".$this->sUserName."', '".$this->sPassWord."', '".$this->sFirstName."', '".$this->sLastName."', '".$this->sAddress."', '".$this->sTelephone."', '".$this->sEmail."');"

	$bSuccess = $oConnection->query($sSQL);

		if($bSuccess == true){
		$this->iId = $oConnection->getInsertId();
		}
	}


	public function load($iId){
		$oConnection = new Connection;

		$sSQL= "SELECT id, user_name, password, first_name, last_name, address, telephone,email
				FROM users
				WHERE id =".$iId;

		$oResultSet = $oConnection->query($sSQL);

		$aRow = $oConnection->fetch($oResultSet);

		$this->iId = $aRow['id'];
		$this->sUserName = $aRow['user_name'];
		$this->sPassWord = $aRow['password'];
		$this->sFirstName = $aRow['first_name'];
		$this->sLastName = $aRow['last_name'];
		$this->sAddress = $aRow['address'];
		$this->sTelephone = $aRow['telephone'];
		$this->sEmail = $aRow['email'];
	}
}



// $oSubject->load(3);


 ?>