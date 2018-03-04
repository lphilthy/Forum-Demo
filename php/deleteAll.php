<?php

/**
 * delete all threads or users
 * function
 */

    header("Content-type: text/html; charset=utf-8");
    session_start();
    if(empty($_SESSION['username']))
    {
        include './destroy.php';//destroy db connection
        header("Location:../index.php");
        exit();
    }
    $username=$_SESSION['username'];


    //catch no. if no = 1 means delete thread
    $no=$_GET['no'];

    require './dbconnect.php';

    if($no==1)//delete all threads
    {
        $res = mysqli_query($con, "truncate table list");
        if(mysqli_affected_rows($con)) {
            print_r("delete comments succeeded<br>");
        }
        else {
            print_r("delete comments failed<br>");
        }
    }
    if($no==2)//delete all users
    {
        $res = mysqli_query($con, "delete from members where username <> '$username';");

        if(mysqli_affected_rows($con)) {
            print_r("delete users succeeded<br>");
        }
        else {
            print_r("delete users failed<br>");
        }
    }

    header("location:./manage.php");
    mysqli_close($con);
    exit();

?>