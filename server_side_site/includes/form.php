<?php


class Form{

	public $sHTML;
	public $aData;
	public $aError:

	public function __construct(){
		$this->sHTML='';
		$this->aData=[];
		$this->aError=[];
	}




	public function open($sFormName){

		$this->sHTML .='<form action="" method="POST" class="form">
    	<h3>'.$this->$sFormName.'</h3>';

	}

	public function close(){

		$this->sHTML .='</form>';

	}


	public function makeTextInput($sInput,$sLabel,$sPlaceholder,$sSmallText){

		$this->sHTML .='<fieldset class="form-group">
    	<label for="Email">'.$this->sLabel.'</label>
    	<input type="email" class="form-control" id="'.$this->sInput.'" name="'.$this->sInput.'" placeholder="'.$this->sPlaceholder.'">
    	<small class="text-muted">'.$this->smallText.'</small>
  		</fieldset>';

	}




}














?>