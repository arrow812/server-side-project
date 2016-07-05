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
            $oConnection= new Connection();

            $sSQL =
            

        }







}


