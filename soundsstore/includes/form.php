<?php 

//to store html/data of the form
class Form{

	public $sHTML;
	public $aData;
	public $aErrors;

	public function __construct(){
		$this->sHTML = '';
		$this->aData = [];
		$this->aErrors = [];
	}

	//form  building methods

	public function open(){							//enctype needed to send files!!
		$this->sHTML .='<form action="" method="POST" enctype="multipart/form-data" class="text-center form-horizontal">';
	}

	public function close(){
		$this->sHTML .='</form>';
	}

	public function makeContentArea($sLabel,$sInputName){
		$sData ='';

			//looking for sticky data of input
		if(isset($this->aData[$sInputName])==true){
			$sData = $this->aData[$sInputName];
		}

		$this->sHTML.='<div class="form-group">
		    <label for="'.$sInputName.'" class="col-sm-4 control-label">'.$sLabel.'</label>
		    <div class="col-sm-8">

		      <textarea  rows="5" cols="40" class="form-control" id="'.$sInputName.'" name="'.$sInputName.'" placeholder="'.$sLabel.'" >'.$sData.'</textarea>
		    	</div>
		  	</div>';
	}


	public function makeTextArea($sLabel,$sInputName){
		$sData = '';

			//looking for sticky data of input
		if(isset($this->aData[$sInputName])==true){
			$sData = $this->aData[$sInputName];
		}


		$sError = ''; //looking for error input
		if(isset($this->aErrors[$sInputName])==true){
			$sError = $this->aErrors[$sInputName];

		}

		$this->sHTML.='<div class="form-group">
		    <label for="'.$sInputName.'" class="col-sm-4 control-label">'.$sLabel.'</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" id="'.$sInputName.'" name="'.$sInputName.'" placeholder="'.$sLabel.'" value="'.$sData.'">
		    	</div>
		  	</div>';

		$this->sHTML .= '<p>'.$sError.'<p>';
	}

	

	public function makeSelectInput($sLabel,$sInputName,$aOptions){
		$sData = '';

			//looking for sticky data of input
		if(isset($this->aData[$sInputName])==true){
			$sData = $this->aData[$sInputName];
		}


		$sError = ''; //looking for error input
		if(isset($this->aErrors[$sInputName])==true){
			$sError = $this->aErrors[$sInputName];

		}

		$this->sHTML.='<div class="form-group">
		    <label for="'.$sInputName.'" class="col-sm-4 control-label">'.$sLabel.'</label>
		    <div class="col-sm-8">
		      <select class="form-control" id="'.$sInputName.'" name="'.$sInputName.'" >';


		foreach($aOptions as $sValue=>$sText){
			$this->sHTML .='<option value="'.$sValue.'">'.$sText.'</option>';
		}



		$this->sHTML .='</select></div></div>';

		$this->sHTML .='<p>'.$sError.'<p>';
	}



	// public function makeNumber($sLabel,$sInputName){
	// 	$sData ='';

	// 		//looking for sticky data of input
	// 	if(isset($this->aData[$sInputName])==true){
	// 		$sData = $this->aData[$sInputName];
	// 	}

	// 	$this->sHTML.='<div class="form-group">
	// 	    <label for="'.$sInputName.'" class="col-sm-4 control-label">'.$sLabel.'</label>
	// 	    <div class="col-sm-8">
	// 	      <input type="text" class="form-control" id="'.$sInputName.'" name="'.$sInputName.'" placeholder="'.$sLabel.'" value="'.$sData.'">
	// 	    	</div>
	// 	  	</div>';
	// }

	Public function makeFileInput($sLabel,$sInputName){
		$sError = '';

		$sError = ''; //looking for error input
		if(isset($this->aErrors[$sInputName])==true){
			$sError = $this->aErrors[$sInputName];

		}

		$this->sHTML.='<div class="form-group">
		    <label for="'.$sInputName.'" class="col-sm-4 control-label">'.$sLabel.'</label>
		    <div class="col-sm-8">
		      <input type="file" class="form-control" id="'.$sInputName.'" name="'.$sInputName.'" placeholder="'.$sLabel.'">
		    	</div>
		  	</div>';

		$this->sHTML .= '<p>'.$sError.'<p>';
	}




	public function makeSubmit($sLabel){
		$this->sHTML .='<div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <input type="submit" name="submit" class="btn btn-default" value="'.$sLabel.'">
		    </div>
		  </div>';
	}


	public function addError($sInputName,$sMessage){
		$this->aErrors[$sInputName]= $sMessage;
	}

}


 ?>