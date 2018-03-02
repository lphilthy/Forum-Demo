<?php
/**
 * register
 * function
 */
header("Content-type: text/html; charset=utf-8");

//connect to the database
require './dbconnect.php';

$username = $_POST['username'];
$password = $_POST['password'];

print_r("post: ".$username." ".$password."<br>");

//$con is the connection between web and db

$sql = "insert into members(username,password) VALUES ('$username','$password')";
$res = mysqli_query($con, $sql);

if(mysqli_affected_rows($con))
{
    //succeed
    header("location:../index.php?no=2");
}
else{
    //Failed;
    header("location:../index.php");
}

mysqli_free_result($res);
mysqli_close($con);
exit();
?>