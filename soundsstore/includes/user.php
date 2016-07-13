<?php 

require_once('connection.php');

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

		if($this->iId == 0){

			$sSQL= "INSERT INTO users(username, password, first_name, last_name, address, telephone, email) 
				VALUES ('".$this->sUserName."', '".$this->sPassWord."', '".$this->sFirstName."', '".$this->sLastName."', '".$this->sAddress."', '".$this->sTelephone."', '".$this->sEmail."')";

			$bSuccess = $oConnection->query($sSQL);

			if($bSuccess == true){
				$this->iId = $oConnection->getInsertId();
			}
		}else{

			$sSQL= "UPDATE users
	 				SET username = '".$this->sUserName."', password = '".$this->sPassWord."', first_name = '".$this->sFirstName."', 	last_name = '".$this->sLastName."', address = '".$this->sAddress."', telephone = '".$this->sTelephone."', email = '".$this->sEmail."' 
					 WHERE id = ".$oConnection->escape($this->iId);

			$oConnection->query($sSQL);
		}
	
	}


	public function load($iId){
		$oConnection = new Connection;

		$sSQL= "SELECT id, username, password, first_name, last_name, address, telephone, email
				FROM users
				WHERE id =".$oConnection->escape($iId);

		$oResultSet = $oConnection->query($sSQL);

		$aRow = $oConnection->fetch($oResultSet);

		$this->iId = $aRow['id'];
		$this->sUserName = $aRow['username'];
		$this->sPassWord = $aRow['password'];
		$this->sFirstName = $aRow['first_name'];
		$this->sLastName = $aRow['last_name'];
		$this->sAddress = $aRow['address'];
		$this->sTelephone = $aRow['telephone'];
		$this->sEmail = $aRow['email'];
	}


	public function loadByUserName($sUserName){
		$oConnection = new Connection;

		$sSQL= "SELECT id, username, password, first_name, last_name, address, telephone, email
				FROM users
				WHERE username ='".$oConnection->escape($sUserName)."'";

		//echo $sSQL;

		$oResultSet = $oConnection->query($sSQL);

		$aRow = $oConnection->fetch($oResultSet);

		if($aRow == true){

		$this->iId = $aRow['id'];
		$this->sUserName = $aRow['username'];
		$this->sPassWord = $aRow['password'];
		$this->sFirstName = $aRow['first_name'];
		$this->sLastName = $aRow['last_name'];
		$this->sAddress = $aRow['address'];
		$this->sTelephone = $aRow['telephone'];
		$this->sEmail = $aRow['email'];

			return true;
		}else{
			return false;
		}
	}
}


 $oUser = new User();
// // $oUser->loadByUserName('steph.pan');
  $oUser->load(1);
// $oUser->sFirstName = 'Aramis';
// $oUser->save();

 echo '<pre>';
 print_r($oUser);
 echo '</pre>';

 ?>