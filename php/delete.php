<?php

/**
 * admin delete
 * 1 = user
 * 2 = thread
 * 3 = comment
 *
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

    if($_SESSION['admin'] != 1) // not a admin
    {
        header("Location:./catalog.php");
        exit();
    }

    $name = $_GET['name'];//chosen name

    /*
     * 1 = delete this user
     * 2 = delete this user's threads
     * 3 = delete this user's comments
     * */
    $do = $_GET['do'];

    require './dbconnect.php';

    if($do == 1) //delete user
    {
        //delete user who username is $name
        $res = mysqli_query($con, "delete from members where username = '$name'");

        if(mysqli_affected_rows($con)) {
            print_r("delete user success<br>");
        }
        else {
            print_r("delete user failed<br>");
        }
    }

    else if($do == 2)//delete thread
    {

        $res = mysqli_query($con, "delete from list where author = '$name'");

        if(mysqli_affected_rows($con)) {
            print_r("delete thread success<br>");
        }
        else {
            print_r("delete thread failed<br>");
        }
    }
    else if($do == 3)//delete comment
    {

        $res = mysqli_query($con, "delete from comment where Cauthor = '$name'");

        if(mysqli_affected_rows($con)) {
            print_r("delete comment success<br>");
        }
        else {
            print_r("delete comment failed<br>");
        }
    }

    header("Location:./manage.php");
    mysqli_close($con);
    exit();

?>