
<?php

require_once('includes/header.php');

?>



    <form class="form">
  <h3>ADD IMAGE</h3>
<!--   <fieldset class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
    <small class="text-muted">We'll never share your email with anyone else.</small>
  </fieldset> -->
  <fieldset class="form-group">
    <label for="exampleSelect1">Select Image Label</label>
    <select class="form-control" id="exampleSelect1">
      <option>Landscape</option>
      <option>Moody</option>
      <option>Escape</option>
      <option>Architecture</option>
    </select>
  </fieldset>
  
<!--   text area could be for $sContent <fieldset class="form-group">
    <label for="exampleTextarea">Example textarea</label>
    <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
  </fieldset> -->
  <fieldset class="form-group">
    <label for="exampleInputFile">Image input</label>
    <input type="file" class="form-control-file" id="exampleInputFile">
    <small class="text-muted">Images must be over this big...</small>
  </fieldset>
  <div class="radio">
    <label>
      <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
      This Image is your work blah blah 
    </label>
  </div>
 
  
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


<?php
require_once('includes/footer.php');
?>