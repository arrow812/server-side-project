<?php 

//no attributes
class View{

	static public function renderNav($aGenres){

		$sHTML = '<ul class="nav navbar-nav">';

		//make Genres
		 for($i=0; $i<count($aGenres); $i++){
		 		$oGenre = $aGenres[$i];
		 		

		 		$sHTML.='<li><a href="main.php?genreid='.$oGenre->iId.'">'.$oGenre->sGenreName.'</li>';

		 

		 $sHTML.= '</ul>';

		 return $sHTML;
		 
	}	


    static public function renderAdminNav($aGenres){

    $sHTML = '<ul class="nav navbar-nav">';

    //make Genres
     for($i=0; $i<count($aGenres); $i++){
        $oGenre = $aGenres[$i];
        

        $sHTML.='<li><a href="admin_main.php?genreid='.$oGenre->iId.'">'.$oGenre->sGenreName.'</a><a href="delete_product.php?'.$oGenre->iId.'">DEL</a></li>';

     }

     $sHTML.= '</ul>';

     return $sHTML;
     
  } 


	static public function renderGenre($oGenre){

		$sHTML = '<div class="jumbotron">
      <div class=" text-center container">
        <h3>Welcome to Sounds Store</h3>
        <h4>'.$oGenre->sGenreName.'</h4>
        <p></p>
      </div>
    </div>

  <div class="container">
    <h3>Our favourites this month</h3>
  </div>
    <div class="container">
      <div class="row">';

      //loop to display all products by genre
      //$aProducts = $oGenre->aProducts;

      for($i=0; $i<count($oGenre->aProducts); $i++){

      	$oProduct = $oGenre->aProducts[$i];

      	 $sHTML .= '<div class="col-md-4">
        <img src="assets/images/album_covers/'.$oProduct->sPhoto.'" class="img-responsive">
          <h2>'.$oProduct->sAlbumName.'</h2>
          <h3>'.$oProduct->sArtistName.'</h3>
          <h4>'.$oProduct->iYear.'</h4>
          <p>'.$oProduct->sDescription.'</p>
          <p><a class="btn btn-default" href="add_to_cart.php?productid='.$oProduct->iId.'" role="button">Add to Cart &raquo;</a></p>
        </div>';
      }

		$sHTML .= '</div><hr>';
		return $sHTML;
	}


    static public function renderAdminGenre($oGenre){

    $sHTML = '<div class="jumbotron">
      <div class=" text-center container">
        <h3>Welcome to Sounds Store</h3>
        <h4>'.$oGenre->sGenreName.'</h4>
        <p></p>
      </div>
    </div>

  <div class="container">
    <h3>Our favourites this month</h3>
  </div>
    <div class="container">
      <div class="row">';

      //loop to display all products by genre
      //$aProducts = $oGenre->aProducts;

      for($i=0; $i<count($oGenre->aProducts); $i++){

        $oProduct = $oGenre->aProducts[$i];

         $sHTML .= '<div class="col-md-4">
        <img src="assets/images/album_covers/'.$oProduct->sPhoto.'" class="img-responsive">
          <h2>'.$oProduct->sAlbumName.'</h2>
          <h3>'.$oProduct->sArtistName.'</h3>
          <h4>'.$oProduct->iYear.'</h4>
          <p>'.$oProduct->sDescription.'</p>
          <p><a class="btn btn-default" href="editproduct.php?productid='.$oProduct->iId.'" role="button">Edit</a></p>
          <p><a class="btn btn-default" href="delete_product.php?productid='.$oProduct->iId.'" role="button">Delete</a></p>

        </div>';

      }

    $sHTML .= '</div><hr>';
    return $sHTML;

  }


static public function renderUserDetails($oUser){

    $sHTML= '<ul class="list-group col-xs-12 col-md-5 col-md-offset-3">
             <li class="list-group-item">User Name :'.$oUser->sUserName.'</li>
             <li class="list-group-item">First Name :'.$oUser->sFirstName.'</li>
             <li class="list-group-item">Last Name :'.htmlentities($oUser->sLastName).'</li>
             <li class="list-group-item">Address :'.$oUser->sAddress.'</li>
             <li class="list-group-item">Email :'.$oUser->sEmail.'</li>
             <li class="list-group-item">Telephone :'.$oUser->sTelephone.'</li>
             <li class="list-group-item">Password :'.$oUser->sPassWord.'</li>
         </ul>';

    return $sHTML;
	}

 
  static public function renderCart($oCart){
    $fTotal ='';
    $sHTML='<div class="col-xs-12 col-md-9">

      <h2>Your Cart</h2>
      <a class="keepShopping" href="main.php"><p>Keep shopping</p></a>
      <table class="table table-bordered">
        <tr>
      <th>Product name</th>
      <th>Price</th>
      <th>Quantity</th>
      <th></th>
      <th>Total</th>
    </tr>';


    foreach($oCart->aContents as $iProductId=>$iQuantity){
      $oProduct = new Product;
      $oProduct->load($iProductId);
    
    $sHTML.='<tr>
      <td>'.$oProduct->sArtistName.' - '.$oProduct->sAlbumName.'</td>
      <td>'.$oProduct->iPrice.'</td>
      <td>'.$iQuantity.'</td>
      <td><a href="remove_from_cart.php?productid='.$oProduct->iId.'"><span class="glyphicon glyphicon-remove"</span></a></td>
      <td>'.$oProduct->iPrice*$iQuantity.'</td>
    </tr>';

    $fTotal += $oProduct->iPrice*$iQuantity;

    }
    
    $sHTML.='<tr>
      <td></td>
      <td></td>
      <td></td>
      <td>Order Total</td>
      <td><strong>$'.$fTotal.'</strong></td>
      </tr>
  
     </table>
  
       <div class="total text-right">
        
        <a href = "checkout.php"><button class="btn btn-default" type="submit">Checkout</button></a>
        
       </div>
     </div>'

     ;

  return $sHTML;

  }


}

?>