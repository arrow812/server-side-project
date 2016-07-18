<?php
require_once('includes/view.php');
require_once('includes/connection.php');
require_once('includes/header.php');
require_once('includes/user.php');
require_once('includes/form.php');

//session_unset();

$sMessage = '';

$oForm = new Form();

$oForm->open('LOG IN','');
$oForm->makeTextInput('email','Email','Enter Email','');
$oForm->makeTextInput('password','Password','Enter Password','');
$oForm->submit('Sign In');
$oForm->close();


if(isset($_POST['submit']) == true){
    //echo('test 1');
   $oUser= new User();
   $bSuccess = $oUser->loadByEmail($_POST['email']);

   if($bSuccess == true){

      if($_POST['password'] == $oUser->sPassword){

          $_SESSION['user_id'] = $oUser->iId;

          //die(print_r($_SESSION));
            //var_dump($_SESSION);

//          echo'<pre>';
//          print_r($_SESSION['user_id']);
//          echo'</pre>';

            header('Location: log_in_success.php');
      }
   }

    $sMessage = 'password and email didnt match';
}

    echo $oForm->sHTML;
    echo $sMessage;

//  echo'<pre>';
//  print_r($oForm);
//  echo'</pre>';

  require_once('includes/footer.php');