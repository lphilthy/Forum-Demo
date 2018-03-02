<?php

/**
 * delete a user's comments
 * function
 */

    header("Content-type: text/html; charset=utf-8");

    session_start();

    //login check
    if(empty($_SESSION['username']))
    {
        include './destroy.php';
        header("Location:../index.php");
        exit();
    }

    $Cno = $_GET['Cno'];//comment number
    $Pno = $_GET['Pno'];//post number

    print_r($Cno."<br>");
    print_r($Pno."<br>");

    //connect to db
    require './dbconnect.php';

    //delete number Cno. comment
    $res = mysqli_query($con, "delete from comment where Cno = '$Cno'");


    if(mysqli_affected_rows($con)) {
        print_r("delete succeeded<br>");
    }
    else {
        print_r("delete failed<br>");
    }


    header("Location:./post.php?no=$Pno");
    mysqli_free_result($res);
    mysqli_close($con);
    exit;

?>