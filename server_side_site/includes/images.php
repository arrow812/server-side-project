<?php
/**
 * Created by PhpStorm.
 * User: aramisgoodwin
 * Date: 5/07/16
 * Time: 4:30 PM
 */

require_once('connection.php');


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

            $sSQL ="SELECT id,file,type_id,user_id 
				  FROM images
				  WHERE id = ".$oConnection->($iId);

            $oResultSet = $oConnection->query($sSQL);

            $aRow = $oConnection->fetch($oResultSet);

            $this->iId=$aRow['id'];
            $this->sFile=$aRow['file'];
            $this->iTypeId=$aRow['type_id'];
            $this->iUserId=$aRow['user_id'];


        }

}

$oImage = new Image;

$oImage->load(5);

echo '<pre>';
print_r($oImage);
echo '</pre>';

