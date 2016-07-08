<?php

require_once('includes/header.php');

?>



    <form class="form">
    <h3>SIGN UP</h3>
<!--   <fieldset class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
    <small class="text-muted">We'll never share your email with anyone else.</small>
  </fieldset> -->



  <fieldset class="form-group">
    <label for="firstname">First Name</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter First Name">
  </fieldset>

  <fieldset class="form-group">
    <label for="lastname">Last Name</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Last Name">
  </fieldset>

  <fieldset class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </fieldset>



  <!-- <fieldset class="form-group">
    <label for="profilepic">Profile Picture</label>
    <input type="file" class="form-control-file" id="exampleInputFile">
    <small class="text-muted">optional</small>
  </fieldset> -->
  
  <div class="radio ">
    <label>
      <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3 toggle">
      I am not a Robot
    </label>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


<?php
require_once('includes/footer.php');
?>