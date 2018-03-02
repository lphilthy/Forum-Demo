<?php

/**
 * save user info
 * function
 */


header("Content-type: text/html; charset=utf-8");
session_start();
if(empty($_SESSION['username']))
{
    include './destroy.php';
    header("Location:../index.php");
    exit();
}
$username=$_SESSION['username'];

$no=$_GET['no'];

$password = $_POST['password1'];

require './dbconnect.php';

$res = mysqli_query($con, "select password from members where username = '$username'");

$row = mysqli_fetch_array($res);

//change password
if($row['password'] == $password)
{

    $password2 = $_POST['password2'];

    $res = mysqli_query($con, "update members set password = '$password2' where username = '$username'");

    if(mysqli_affected_rows($con))
    {
        print_r("change succeeded<br>");

    }
    else{
        print_r("change failed<br>");
    }

    header("location:./catalog.php");
    mysqli_close($con);
    exit();

}

else{
    // worong password
    print_r("current password faild");
    header("location:./changeinfo.php?info=1");
    exit();
}

?>