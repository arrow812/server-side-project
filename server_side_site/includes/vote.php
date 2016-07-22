

<?php

class Vote{

    public $iId;
    public $iValue;
    public $iUserId;
    public $iImageId;


    public function __construct(){
        $this->iId=0;
        //$this->iValue=0;
        $this->iUserId=0;
        $this->iImageId=0;

    }


    public function save(){

        $oConnection = new Connection;

        
        $sSQL = "INSERT INTO votes (value, user_id, image_id) 
                VALUES ('".$this->iValue."', '".$this->iUserId."', '".$this->iImageId."')";

        $bSuccess =  $oConnection->query($sSQL);

        if($bSuccess== true){
                $this->iId = $oConnection->getInsertId();

        }
    }


    // public function remove(){

    //     $oConnection = new Connection;

    //     $sSQL = "INSERT INTO votes (value, user_id, image_id) 
    //             VALUES ('-1', '".$this->iUserId."', '".$this->iImageId."')";


    // }


}


