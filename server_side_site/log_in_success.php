<?php

//require_once('includes/view.php');
//require_once('includes/connection.php');
//require_once('includes/form.php');
require_once('includes/header.php');
//require_once('includes/user.php');

$sHTML= '<section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>LOG IN SUCCESS!!</h2>
                
            </div>
        </div>
    </section>';

echo $sHTML;


header( "refresh:1;url=main.php" );

//echo'<pre>';
//print_r($_SESSION['user_id']);
//echo'</pre>';

require_once('includes/footer.php');

