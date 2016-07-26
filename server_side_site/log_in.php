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
$oForm->makeTextInput('','email','Email','Enter Email','');
$oForm->makeTextInput('passsword','password','Password','Enter Password','');
$oForm->submit('Sign In');
$oForm->close();


if(isset($_POST['submit']) == true){
    //echo('test 1');
   $oUser= new User();
   $bSuccess = $oUser->loadByEmail($_POST['email']);

   if($bSuccess == true){

      if(password_verify($_POST['password'] ,$oUser->sPassword)==true){

          $_SESSION['user_id'] = $oUser->iId;


        if(($oUser->bAdmin)== true){
          header('Location: main_admin.php');

             }else{
              header('Location: log_in_success.php');
          }
      }

   }

    $sMessage = 'password and email didnt match';
}

    echo $oForm->sHTML;
    echo $sMessage;

// echo'<pre>';
// print_r($oUser);
// echo'</pre>';

//echo'<pre>';
//echo ('testing password');
//echo'</pre>';

  require_once('includes/footer.php');
