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
    public $iVisible;


    public function __construct(){
        $this->iId=0;
        $this->sFile='';
        $this->iTypeId=0;
        $this->iUserId=0;
        $this->iScore=0;
        $this->iVisible=0;
    }

    //


    public function load($iId){

        $oConnection = new Connection();

            $sSQL = "SELECT id,file,type_id,user_id,visible 
	        FROM images
	        WHERE visible= 1
	        AND id =".($iId);
       
        $oResultSet = $oConnection->query($sSQL);

        $aRow = $oConnection->fetch($oResultSet);

        $this->iId = $aRow['id'];
        $this->sFile = $aRow['file'];
        $this->iTypeId = $aRow['type_id'];
        $this->iUserId = $aRow['user_id'];
        $this->iVisible = $aRow['visible'];


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

            $sSQL = "INSERT INTO images (file, type_id, user_id, visible); 
                    VALUES ( '".$this->sFile."', '".$oConnection->escape($this->iTypeId)."', '".$oConnection->escape($this->iUserId)."','1')";

                    

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



   public function remove(){

        $oConnection = new Connection;

        $sSQL = "UPDATE images
                  SET visible=0
                  WHERE id = ".$this->iId;


        $oConnection->query($sSQL);

   }



}

//echo ($sSQL);



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

