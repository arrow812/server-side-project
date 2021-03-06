
<?php

require_once('connection.php');


class User{
    public $iId;
    public $sFirstName;
    public $sLastName;
    public $sEmail;
    public $sPassword;
    public $bAdmin;

    
    public function __construct(){
        $this->iId= 0;
        $this->sFirstName='';
        $this->sLastName='';
        $this->sEmail='';
        $this->sPassword='';
        $this->bAdmin = 0;

    }
    
    public function save(){

        $oConnection = new Connection;

        if($this->iId == 0){
            $sSQL= "INSERT INTO users (password, first_name, last_name, email)
				    VALUES ('".$oConnection->escape($this->sPassword)."', '".$oConnection->escape($this->sFirstName)."', '".$oConnection->escape($this->sLastName)."', '".$oConnection->escape($this->sEmail)."')";

            $bSuccess = $oConnection->query($sSQL);

            if($bSuccess ==True){
                $this->iId = $oConnection->getInsertID();
            }

        }else{
            $sSQL= "UPDATE users
	 				SET first_name = '".$oConnection->escape($this->sFirstName)."', last_name = '".$oConnection->escape($this->sLastName)."', email = '".$oConnection->escape($this->sEmail)."'
					WHERE id=".$this->iId;

        // echo $sSQL;

            $oConnection->query($sSQL);
        }
    }


    //not required for this project
    public function load($iId){
        $oConnection = new Connection;

        $sSQL =  "SELECT id, password, first_name, last_name, email
                    FROM users 
                   WHERE id=". $oConnection->escape($iId);
        
//        echo $sSQL;
        
        $oResultSet= $oConnection->query($sSQL);
        
        $aRow = $oConnection->fetch($oResultSet);

        $this->iId = $aRow['id'];
        $this->sFirstName = $aRow['first_name'];
        $this->sLastName = $aRow['last_name'];
        $this->sEmail = $aRow['email'];
        $this->sPassword = $aRow['password'];


    }

    public function loadByEmail($sEmail){

        $oConnection = new Connection;

        $sSQL = "SELECT id, password, first_name, last_name, email, admin
                 FROM users
                 WHERE email ='".$oConnection->escape($sEmail)."'";

        $oResultSet = $oConnection->query($sSQL);

        $aRow = $oConnection->fetch($oResultSet);

        if($aRow == true){
        $this->iId = $aRow['id'];
        $this->sFirstName = $aRow['first_name'];
        $this->sLastName = $aRow['last_name'];
        $this->sEmail = $aRow['email'];
        $this->sPassword = $aRow['password'];
        $this->bAdmin = $aRow['admin'];

            return true;
        }else{
            return false;
        }
    }
}

//$oUser = new User();
////
//$oUser->load(2);
//$oUser->loadByEmail('qwerty@qaz.com');
//
//
// echo '<pre>';
// print_r($oUser);
// echo '</pre>';

