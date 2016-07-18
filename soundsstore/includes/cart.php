<?php 

class Cart{
	public $aContents;


	public function __construct(){
		$this->aContents = [];

	}


	public function add ($iProductId){
		if(isset($this->aContents[$iProductId])== false){
			//add Product, quantity = 1
			$this->aContents[$iProductId]=1;

		}else{
			//quantity = 1
			$this->aContents[$iProductId]++;

		}
	}


	public function remove($iProductId){
		//decrease qty by 1
		$this->aContents[$iProductId]--;
		

		//if qty becomes 0 remove product from list
		if($this->aContents[$iProductId]<=0){
			unset($this->aContents[$iProductId]);
		}
	}

}


//testing

// $oCart = new Cart;
// $oCart->add(6);
// $oCart->add(6);
// $oCart->add(6);
// $oCart->add(6);


// foreach($oCart->aContents as $iProductId=>$iQuantity){
// 	echo 'Product'.$iProductId.'x'.$iQuantity.'<br>';
// }


// echo '<pre>';
// print_r($oCart);
// echo '<pre>';



 ?>