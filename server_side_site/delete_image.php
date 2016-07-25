<?php

require_once('includes/connection.php');
require_once('includes/images.php');


$oImage = new Image;

$oImage->load($_GET['imageid']);

$oImage->delete();


// die($oImage->iTypeId);

header('Location:main_admin.php?typeid='.$oImage->iTypeId);

