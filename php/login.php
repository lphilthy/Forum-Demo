<?php
/**
 * login
 * function
 */

session_start();
unset($_SESSION['username']);
$_SESSION['admin']=0;

//connect to db
require './dbconnect.php';

$username = $_POST['username'];
$password = $_POST['password'];

//print_r("get: ".$username." ".$password."<br>");

//$con is connection
$res = mysqli_query($con, 'select * from members;');

while($row = mysqli_fetch_array($res))
{

    if($row['username'] == $username)
    {
        if ($row['password'] == $password)
        {
            //user and password correct, pack username and admin into session
            $_SESSION['username']=$username;
            $resAdmin = mysqli_query($con, "select admin from members where username = '$username'");
            $rowAdmin = mysqli_fetch_array($resAdmin);

            $_SESSION['admin'] = $rowAdmin['admin'];//$admin = 1 means is admin

            header("Location:./catalog.php");
            exit();
        }
        else{
            //wrong password
            mysqli_free_result($res);
            mysqli_close($con);
            include './destroy.php?no=';//destroy session
            header("Location:../index.php?no=1");
            exit();
        }
    }
}

mysqli_free_result($res);
mysqli_close($con);
include './destroy.php?no=1';//destroy session
header("Location:../index.php?no=1");//password or username wrong
exit();
?>