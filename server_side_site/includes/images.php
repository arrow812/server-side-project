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
    public $iScore;


    public function __construct(){
        $this->iId=0;
        $this->sFile='';
        $this->iTypeId=0;
        $this->iUserId=0;
        $this->iScore=0;
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


        $sSQL = "SELECT SUM(value) score
            FROM votes
            WHERE image_id =".$iId;

        $oResultSet = $oConnection->query($sSQL);

        $aRow = $oConnection->fetch($oResultSet);
        $this->iScore = $aRow['score'];
    }


    public function save(){
        $oConnection = new Connection();

        if($this->iId == 0){

            $sSQL = "INSERT INTO images (file, type_id, user_id) 
                    VALUES ( '".$this->sFile."', '".$this->iTypeId."', '".$this->iUserId."')";

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


   public function delete(){

        $oConnection = new Connection;

        $sSQL = "DELETE FROM images
				WHERE id=1818 ";


        //die($this->iId);

        $oConnection->query($sSQL);

        if ($oConnection->query($sSQL) == true) {
            echo 'Image Deleted';
        } else {
            echo 'error deleting Image ';
        }
    }
}


//testing
//
//$oImage = new Image;

// $oImage->sFile='testing.jpg';
//
//$oImage->load(1799);
//$oImage->delete();
//
//// $oImage->save();
//
// echo '<pre>';
// print_r($oImage);
// echo '</pre>';

