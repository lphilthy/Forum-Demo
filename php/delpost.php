<?php

/**
 * delete a user's comments
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

    //post number
    $Pno = $_GET['no'];
    print_r($Pno."<br>");

    require './dbconnect.php';

    //delete no $Pno post
    $res = mysqli_query($con, "delete from list where no = '$Pno'");

    if(mysqli_affected_rows($con)) {
        print_r("delete post success<br>");
    }
    else {
        print_r("delete post failed<br>");
    }

    //delete comment
    $res = mysqli_query($con, "delete from comment where Pno = '$Pno'");


    if(mysqli_affected_rows($con)) {
        print_r("delete comment success<br>");
    }
    else {
        print_r("delete comment failed<br>");
    }

    header("Location:./catalog.php");
    mysqli_close($con);

?>