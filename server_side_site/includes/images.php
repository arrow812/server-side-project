<?php
/**
 * Created by PhpStorm.
 * User: aramisgoodwin
 * Date: 5/07/16
 * Time: 4:30 PM
 */

require_once('connection.php');
require_once('types.php');



class Image{
    public $iId;
    public $sFile;
    public $iTypeId;
    public $iUserId;


    public function __construct(){
        $this->iId=0;
        $this->sFile='';
        $this->iTypeId=0;
        $this->iUserId=0;
    }


    public function load($iId){

        $oConnection = new Connection();

            $sSQL = "SELECT id,file,type_id,user_id 
	        FROM images
	        WHERE id =".($iId);
       
        $oResultSet = $oConnection->query($sSQL);

        $aRow = $oConnection->fetch($oResultSet);

        $this->iId = $aRow['id'];
        $this->sFile = $aRow['file'];
        $this->iTypeId = $aRow['type_id'];
        $this->iUserId = $aRow['user_id'];
    }

        
    public function save(){
        $oConnection = new Connection();

        if($this->iId == 0){

            $sSQL = "INSERT INTO images (file, type_id, user_id) 
                    VALUES ( '".$this->sFile."', '".$this->iTypeId."', '".$this->iUserId."');";

            $bSuccess =  $oConnection->query($sSQL);

            if($bSuccess== true){
                $this->iId = $oConnection->getInsertId();

            }else{
                //update
                $sSQL = "UPDATE 
                        SET file = '".$this->sFile."', type_id = '".$this->iTypeId."', user_id = '".$this->iUserId."' 
                        WHERE images = ".$this->iId;

            }
        }
    }
}


//testing

// $oImage = new Image;

// $oImage->sFile='testing.jpg';
// $oImage->load(2);
//// $oImage->iUserId= 17;
//
//// $oImage->save();
//
// echo '<pre>';
// print_r($oImage);
// echo '</pre>';

