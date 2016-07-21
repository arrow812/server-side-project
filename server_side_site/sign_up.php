<?php


require_once('includes/header.php');
require_once('includes/form.php');
require_once('includes/user.php');

$oForm = new Form();

    if(isset($_POST['submit'])==true) {

        if($_POST['first_name'] == ''){
            $oForm->addError('first_name','Required');
        }

        if($_POST['last_name'] == ''){
            $oForm->addError('last_name','Required');
        }
        if($_POST['email'] == ''){
            $oForm->addError('email','Required');
        }

        if($_POST['password'] == ''){
            $oForm->addError('password','Required');
        }


        if ($_POST['password'] != $_POST['password1']){
            $oForm->addError('password','Passwords Must Match');
        }

        //die(print_r($_POST));

        if(!isset($_POST['termsAgreed'])){
            $oForm->addError('termsAgreed','Please Agree with Terms and Conditions');

            //die('terms agreed failed');
        }

        //die('terms agreed passed');

        if (count($oForm->aErrors) == 0) {


            $oUser = new User();
            $oUser->sFirstName = $_POST['first_name'];
            $oUser->sLastName = $_POST['last_name'];
            $oUser->sEmail = $_POST['email'];
            $oUser->sPassword = password_hash($_POST['password'],PASSWORD_DEFAULT);


            $oUser->save();

            header('location: sign_up_success.php');
        }
    }

        $oForm->open('SIGN UP','sign up to add images!');
        $oForm->makeTextInput('','first_name','First Name','Enter First Name','');
        $oForm->makeTextInput('','last_name','Last Name','Enter Last Name','');
        $oForm->makeTextInput('','email','Email','Enter Email','we will never share your email ');
        $oForm->makeTextInput('password','password','Password','Enter Password','');
        $oForm->makeTextInput('password','password1','Re-Enter Password','Re-Enter Password','');
        $oForm->checkbox('i agree to the terms and conditions','termsAgreed');
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

