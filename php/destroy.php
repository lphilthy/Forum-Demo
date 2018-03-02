<?php

/*destroy session & cookies
 * function
*/

//session_start();

// reset all value
$_SESSION = array();

// destroy cookies
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000
    );
}

// destroy session
session_destroy();

if(empty($_GET['no']))
{
    header("Location:../index.php");
}
echo $_GET['no'];

?>