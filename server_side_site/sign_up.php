<?php


require_once('includes/header.php');
require_once('includes/form.php');
require_once('includes/user.php');


if(isset($_POST['submit'])==true){

    $oUser = new User();

    $oUser->sFirstName = $_POST['first_name'];
    $oUser->sLastName = $_POST['last_name'];
    $oUser->sEmail = $_POST['email'];
    $oUser->sPassword = $_POST['password'];

    $oUser->save();

//    header('location: main.php');

}

    $oForm = new Form();
    $oForm->open('SIGN UP','sign up to add images!');
    $oForm->makeTextInput('first_name','First Name','Enter First Name','');
    $oForm->makeTextInput('last_name','Last Name','Enter Last Name','');
    $oForm->makeTextInput('email','Email','Enter Email','we will never share your email ');
    $oForm->makeTextInput('password','Password','Enter Password','');
    $oForm->makeTextInput('password','Re-Enter Password','Re-Enter Password','');
    $oForm->radio('i agree to the terms and conditions');
    $oForm->submit('Join');
    $oForm->close();


  echo $oForm->sHTML;


require_once('includes/footer.php');

?>

<!---->
<!--<form class="form">-->
<!--<h3>SIGN UP</h3>-->
<!--  <fieldset class="form-group">-->
<!--    <label for="exampleInputEmail1">Email address</label>-->
<!--    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">-->
<!--    <small class="text-muted">We'll never share your email with anyone else.</small>-->
<!--  </fieldset>-->
<!---->
<!---->
<!---->
<!--  <fieldset class="form-group">-->
<!--    <label for="firstname">First Name</label>-->
<!--    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter First Name">-->
<!--  </fieldset>-->
<!---->
<!--  <fieldset class="form-group">-->
<!--    <label for="lastname">Last Name</label>-->
<!--    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Last Name">-->
<!--  </fieldset>-->
<!---->
<!--  <fieldset class="form-group">-->
<!--    <label for="exampleInputPassword1">Password</label>-->
<!--    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">-->
<!--  </fieldset>-->
<!---->
<!---->
<!---->
<!--  <!-- <fieldset class="form-group">-->
<!--    <label for="profilepic">Profile Picture</label>-->
<!--    <input type="file" class="form-control-file" id="exampleInputFile">-->
<!--    <small class="text-muted">optional</small>-->
<!--  </fieldset> -->
<!--  -->
<!--  <div class="radio ">-->
<!--    <label>-->
<!--      <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3 toggle">-->
<!--      I am not a Robot-->
<!--    </label>-->
<!--  </div>-->
<!--  -->
<!--  <button type="submit" name="submit" class="btn btn-primary">Submit</button>-->
<!--</form>-->

