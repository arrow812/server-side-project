
<?php


require_once('connection.php');

class Order{
	public $iId;
	public $sOrderDate;
	public $sDeliveryDate;
	public $sStatus;
	public $iCustomerId;
	public $aContents;
	// public $iQuantity;

	public function __construct(){
		$this->iId = 0;
		$this->sOrderDate ='';
		$this->sDeliveryDate ='';
		$this->sStatus ='';
		$this->iCustomerId = 0;
		$this->aContents= [];
		// $this->iQuantity='';


	}


	public function save(){

		$oConnection = new Connection;


		if($this->iId == 0){

			$sSQL = "INSERT INTO orders (order_date, delivery_date, status, customer_id) 
			VALUES ( '".$this->sOrderDate."', '".$this->sDeliveryDate."', '".$this->sStatus."', '".$this->iCustomerId."')";
			

			echo $sSQL;

			$bSuccess = $oConnection->query($sSQL);

			if($bSuccess == true){
				$this->iId = $oConnection->getInsertId();
			}
		}

	}


	public function attach($iProductId,$iQuantity){

		$oConnection = new Connection;

		//to this id we want to attach product id and quantity id
		$sSQL= "INSERT INTO order_product (order_id, product_id, quantity) 
				VALUES ('".$this->iId."', '".$iProductId."', '".$iQuantity."')";//notice there is no $this->iProductID!!

		$oResult = $oConnection->query($sSQL);
		//reload order after attachment(load itself)
		$this->load($this->iId);

	}



	public function load($iId){

		$oConnection = new Connection();



		$sSQL = "SELECT id,order_date,delivery_date,status,customer_id
				FROM orders
				WHERE id = ".($iId);

		$oResultSet = $oConnection->query($sSQL);

		$aRow = $oConnection->fetch($oResultSet);

		$this->iId= $aRow['id'];
		$this->sOrderDate= $aRow['order_date'];
		$this->sDeliveryDate= $aRow['delivery_date'];
		$this->sStatus= $aRow['status'];
		$this->iCustomerId= $aRow['customer_id'];


		//loading contents of order
		$sSQL = "SELECT product_id,quantity
				FROM order_product 
				WHERE order_id=".$iId;

		$oResultSet = $oConnection->query($sSQL);

		while($aRow = $oConnection->fetch($oResultSet)){
			$iProductId = $aRow['product_id'];
			$iQuantity = $aRow['quantity'];

			$this->aContents[$iProductId]= $iQuantity;

		}

	}

}

//'product_id'

// $oOrder = new Order();
// $oOrder->load(2);
// $oOrder->attach('7','2');
// $oOrder->sOrderDate = '2016-10-12';
// $oOrder->sDeliveryDate = '2016-10-17';
// $oOrder->sStatus='nottPending';
// $oOrder->iCustomerId = 5;
// $oOrder->save();

// echo '<pre>';
// print_r($oOrder);
// echo '</pre>';


?>