<?php


class Counter{

    public $aVotes;
    public $iId;
    public $iValue;
    public $iUserId;
    public $iImageId;

    public function __construct(){
        $this->aVotes=[];
        $this->iId=0;
        $this->iValue=0;
        $this->iUserId=0;
        $this->iImageId=0;

    }

    public function add($iId){
        if(isset($this->aVotes[$iId])== false){
            $this->aVotes[$iId] = 1;
        }

    }
    
}