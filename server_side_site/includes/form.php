<?php

require_once'connection.php';
require_once'user.php';



class Form{

	public $sHTML;
	public $aData;
	public $aError;

	public function __construct(){
		$this->sHTML='';
		$this->aData=[];
		$this->aError=[];
	}

	public function open($sFormName,$sH6){

		$this->sHTML.='<form action="" method="POST" enctype="multipart/form-data" class="form">
    	<h3>'.$sFormName.'</h3>
    	<h5>'.$sH6.'</h5>'
		;
	}

	public function close(){
		$this->sHTML .='</form>';
	}

	public function makeTextInput($sInputName,$sLabel,$sPlaceholder,$sSmallText){
		$sData ='';

        //sticky data
        if(isset($this->aData[$sInputName])==true){
			$sData = $this->aData[$sInputName];
        }

//		echo(print_r($sData));

		$this->sHTML .='<fieldset class="form-group" >
    	                <label for="'.$sInputName.'">'.$sLabel.'</label>
    	                <input type="text" class="form-control" id="'.$sInputName.'" name="'.$sInputName.'" 
    	                        placeholder="'.$sPlaceholder.'" value="'.$sData.'">
    	                <small class="text-muted">'.$sSmallText.'</small>
  		                </fieldset>';
	}


	public function submit($sLabel){
        $this->sHTML .='<button type="submit" name="submit" class="btn btn-primary">'.$sLabel.'</button>';
    }

	public function submitFile($sLabel){
		$this->sHTML .='<button type="submit" name="submit" value="Upload Image" class="btn btn-primary">'.$sLabel.'</button>';
	}


    public function radio($sLabel){
        $this->sHTML .='<div class="radio ">
                       <label>
                       <input type="radio"  id="'.$sLabel.'"  name="'.$sLabel.'" value="option3 toggle">
                        '.$sLabel.'
                       </label>
                       </div>';
    }


    public function chooseFile($sLabel,$sInputName,$sSmallText)
	{
		$this->sHTML .= '<fieldset class="form-group">
                        <label for="'.$sInputName.'">' . $sLabel . '</label>
                        <input type="file" class="form-control-file" id="'.$sInputName.'" name="'.$sInputName.'">
                        <small class="text-muted">' .$sSmallText. '</small>
                        </fieldset>';
	}


    public function selectInput($sLabel,$sInputName, $aOptions){

        $this->sHTML.='<fieldset class="form-group">
        <label for="'.$sInputName.'">'.$sLabel.'</label>
         <select class="form-control" id="'.$sInputName.'" name="'.$sInputName.'">';

        foreach($aOptions as $sValue=>$sText){
            $this->sHTML .='<option value="'.$sValue.'">'.$sText.'</option>';
		}
//      <option>Landscape</option>
//      <option>Moody</option>
//      <option>Escape</option>
//      <option>Architecture</option>
        $this->sHTML.='</select></fieldset>';

    }

}


?>