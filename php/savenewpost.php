<?php

/**
 * save new post
 * function
 */

session_start();

if(empty($_SESSION['username'])){
    include './destroy.php';\
    header("Location:../index.php");
    exit();
}


require './dbconnect.php';


$username = $_SESSION['username'];
$title = $_POST['title'];
$content = $_POST['content'];

//save title,content,author to table list
$sql = "insert into list (title,content,author) VALUES ('$title','$content','$username')";
$res = mysqli_query($con, $sql);

if(mysqli_affected_rows($con))
{
    echo "save succeeded";
    header("location:./catalog.php");
    exit();
}
else
{
    echo "save failed";
    header("location:./catalog.php?state=1");
    exit();
}// send status code.

mysqli_free_result($res);
mysqli_close($con);

?>