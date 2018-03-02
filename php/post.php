<!--
    Each Post Detail
    interface
-->
<!DOCTYPE html>

<?php session_start(); ?>
<!--
post.php格式：post.php?no=XXX&name=XXX
-->

<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="author" content="Celine">
    <link rel="icon" type="image/png" href="../img/icon.png">

    <title>Sport Forum</title>

    <!-- Custom styles for this template -->
    <link href="../css/theme.css" rel="stylesheet">
    <link href="../css/post.css" rel="stylesheet">

    <!-- New post javascript-->
    <script src="../js/dropdown.js"></script>

    <?php

    //login check
    if(empty($_SESSION['username']))
    {
        include './destroy.php';
        header("Location:../index.php");
        exit();
    }

    $admin = $_SESSION['admin'];
    $postno = $_GET['no'];
    $username = $_SESSION['username'];

    ?>

</head>

<body data-gr-c-s-loaded="true">

    <!-- Fixed navbar -->
    <nav class="navbar navbar-fixed-top" role="navigation" >

        <div class="container">

            <ul class="nav nav-tabs">
                <li role="presentation" class="" id="tab-head"
                    onclick="clickDrop()"
                    aria-expanded="false" >
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

        </ul><!--end nav-tabs-->
    </div>

</nav><!--end nav-->

    <?php

        require './dbconnect.php';

        $res = mysqli_query($con, "select * from list where no = $postno;");
        $row = mysqli_fetch_array($res);

        /*
        print_r("title: ".$row['title']."<br>");
        print_r("author: ".$row['author']."<br>");
        print_r("content: ".$row['content']."<br>");
        print_r("time: ".$row['time']);
        */
    ?>
    <div class="container">

        <div class="page-header">
            <h2>
                <?php
                echo ($row['title']);
                ?>
            </h2>
        </div>

        <p>Author：
            <?php
            echo ($row['author']);
            ?>
        </p>

        <div class="well">
            <p>
                <?php
                echo ('<div class="text-content">'.$row['content'].'</div>');
                ?>
            </p>
        </div>

        <div class="page-header">
            <h3>Comment</h3>
        </div>

        <?php
        $sql = "select * from comment where Pno = $postno";
        $res = mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($res))
        {
            echo '<div class = "well"><div class="text-content">'.$row['Ccontent'].'</div>';
            echo '<br>';
            echo '<div class="text-info">User：'.$row['Cauthor'];
            echo '<br>';
            echo 'Time：'.$row['Cdate'].'&nbsp;&nbsp;&nbsp;&nbsp;';

            //if admin, add delete option
            if($admin==1) {
                echo '<a href="delcomment.php?Cno='.$row['Cno'].'&Pno='.$postno.'">Delete</a>
                </div>';
            }
            echo "</div>";
            echo "</div>";


        }
        ?>

        <div class="page-header">
            <h3>Reply</h3>
        </div>

        <form role="form" action="./savecomment.php?no=<?php echo "$postno"; ?>" method="post">
            <div class="form-group">

                <textarea name="content"
                          class="form-control post-content"
                          rows="3" placeholder="Input reply"></textarea>

                <button type="submit" class="btn btn-lg btn-primary">Publish</button>

            </div>
        </form>


    </div><!--end container-->



</body>

</html>