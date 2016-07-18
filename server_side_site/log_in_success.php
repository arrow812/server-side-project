<?php

//require_once('includes/view.php');
//require_once('includes/connection.php');
//require_once('includes/form.php');
require_once('includes/header.php');
//require_once('includes/user.php');

echo'<h1>LOGIN SUCCESSFUL</h1>';
header( "refresh:1;url=main.php" );

//echo'<pre>';
//print_r($_SESSION['user_id']);
//echo'</pre>';

require_once('includes/footer.php');

