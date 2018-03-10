<!--
    user change password
    interface
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
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="author" content="Celine">
    <link rel="icon" type="image/png" href="img/icon.png">

    <title>Sport Forum</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="../css/theme.css" rel="stylesheet">
    <link href="../css/changeinfo.css" rel="stylesheet">

    <!-- New post javascript-->
    <script src="../js/dropdown.js"></script>

</head>

<body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-fixed-top" role="navigation" >

        <div class="container">

            <ul class="nav nav-tabs">

                <li role="presentation" class="" id="tab-head" onclick="clickDrop()" aria-expanded="false" >
                    <a class="navbar-brand dropdown-toggle" data-toggle="dropdown" >
                        <?php echo "$username"; ?>
                        <span class="caret">
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="changeinfo.php">Change Password</a></li>
                        <li><a href="./destroy.php">Log out</a></li>
                    </ul>
                </li>

                <li><a href="./catalog.php">Home</a></li>
                <li><a href="#top">Top</a></li>

            </ul><!--end nav-tabs-->
        </div>

    </nav><!--end nav-->


    <div class="container">

        <?php

            $info = 0;
            if(!empty($_GET['info']))
            {
                $info=$_GET['info'];// wrong password
            }

        ?>

        <form class="form-change" id="form" role="form" action="saveinfo.php" method="post">


            <input type="password" id="pw1" name="password1" class="form-control change" placeholder="Input Current Password">
            <input type="password" id="pw2" name="password2" class="form-control change" placeholder="Input Current New Password">


            <button class="btn btn-lg btn-primary btn-block" type="submit" id="btn-submit">Change</button>

            <?php

            //wrong password, displace alert
            if($info == 1){
                echo ("<div class='alert alert-danger' style='text-align:center; margin-top: 15px' role='alert' id='alert-info'>
                                <strong>Wrong password, please input your current password.</strong></div>");
            }
            ?>

        </form>

    </div> <!-- /container -->

</body>

</html>