<?php

require_once('includes/connection.php');
require_once('includes/images.php');


$oImage = new Image;

$oImage->load($oImage->iId);

$oImage->delete();



die($oImage->iTypeId);

header('Location:main_admin.php?typeid='.$oImage->iTypeId);

// header('Location:main.php?genreid='.$oProduct->iGenreId);