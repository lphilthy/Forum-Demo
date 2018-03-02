<!DOCTYPE html>
<!--
administrator management panel.
interface.
-->
<?php
    session_start();
    if(empty($_SESSION['username']))
    {
        include './destroy.php';
        header("Location:../index.php");
        exit();
    }
    $username = $_SESSION['username'];
    if($_SESSION['admin'] != 1)//admin check
    {
        header("Location:./catalog.php");
        exit();
    }
?>

<!--main page-->

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="author" content="Celine">
    <link rel="icon" type="image/png" href="../img/icon.png">

    <title>Sport Forum</title>

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
    <link href="../css/theme.css" rel="stylesheet">
    <script src="../js/dropdown.js"></script>
    <script src="../js/manage.js"></script>

</head>

<body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-fixed-top nav-manage" role="navigation" >

        <div class="container">

            <ul class="nav nav-tabs nav-manage">
                <li role="presentation" class="" id="tab-head" onclick="clickDrop()" aria-expanded="false" >

                    <a class="navbar-brand dropdown-toggle" data-toggle="dropdown" >
                        <?php echo "$username"; ?>
                        <span class="caret">
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="./changeinfo.php">Change Password</a></li>
                        <li><a href="./destroy.php">Log out</a></li>
                    </ul>
                </li>

                <li><a href="./catalog.php">Home</a></li>
                <li><a href="#top">Top</a></li>
                <li><a href="./newpost.php">New Thread</a></li>

            </ul><!-- /nav-tabs -->
        </div><!--/container -->
    </nav><!-- /nav -->

    <div class="container-fluid">

        <a name="top"></a><!-- to top -->

        <div class="row">

            <div class="left">

                <ul class="nav nav-sidebar">

                    <li class="active" id="btn-user" onclick="btn_click(1)">
                        <a href="#user">Manage User</a>
                    </li>

                    <li id="btn-manage" onclick="btn_click(2)">
                        <a href="#content">Manage Content</a>
                    </li>

                </ul>

            </div><!--end left-->

            <div class = right>

                <a name="user"></a>

                <h2 class="sub-header"></h2>


                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Delete this user</th>
                            <th>Delete all posts of this user</th>
                            <th>Delete all thread create from this user</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php

                        require './dbconnect.php';

                        //return all user info except this user
                        $res = mysqli_query($con, "select * from members where username <> '$username';");
                        while($row = mysqli_fetch_array($res))
                        {
                            //build the info form
                            echo '<tr>';
                            echo '<td>' . $row['username'] . '</td>';
                            echo '<td><a href="delete.php?name=' .$row['username'].'&do=1">Delete User</a></td>';
                            echo '<td><a href="delete.php?name=' .$row['username'].'&do=2">Delete Thread</a></td>';
                            echo '<td><a href="delete.php?name=' .$row['username'].'&do=3">Delete Comments</a></td>';
                            echo'</tr>';
                        }
                        mysqli_free_result($res);
                        mysqli_close($con);

                        ?>

                    </tbody>
                </table>



                <a name="content"></a>
                <h2 class="sub-header"">Manage Content</h2>

                <Button class="btn  btn-primary" onClick="location.href='./deleteAll.php?no=1'">Delete all threads</Button>
                &nbsp &nbsp &nbsp
                <Button class="btn  btn-primary" onClick="location.href='./deleteAll.php?no=2'">Delete All Users</Button>

            </div><!--end right-->

        </div><!-- /row -->


    </div>

</body>
</html>