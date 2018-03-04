<!--
    main page
    interface
-->

<!DOCTYPE html>
<?php
    session_start();
?>


<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="author" content="Celine">
    <link rel="icon" type="image/png" href="../img/icon.png">

    <title>Sport Forum</title>

    <!-- Custom styles for this template -->
    <link href="../css/theme.css" rel="stylesheet">
    <script src="../js/dropdown.js"></script>

    <?php

    if(empty($_SESSION['username']))
    {
        include './destroy.php';//destory session
        exit();
    }
    $username=$_SESSION['username'];
    $admin = $_SESSION['admin'];
    ?>

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
                        <li><a href="./changeinfo.php">Change Password</a></li>
                        <li><a href="./destroy.php">Log out</a></li>
                    </ul>
                </li>

                <li><a href="./catalog.php">Home</a></li>
                <li><a href="#top">Top</a></li>
                <li><a href="./newpost.php">New Thread</a></li>

                <?php
                    //1=admin, 0=normal user
                    if($admin==1)
                    {
                        echo '<li><a href="./manage.php">Management Panel</a></li>';
                    }
                ?>


            </ul><!--end nav-tabs-->

        </div>

    </nav><!--end nav-->

    <div class="container">

        <div class="jumbotron" >
            <h1 >Sport</h1>
        </div>

        <a name="top"></a><!-- back to top -->

        <div class="row">
            <div class="col-md-5ths">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Thread</th>
                            <th>Author</th>
                            <th>Last Submitted Time</th>
                            <th>Origin Post Time</th>
                            <?php
                            if($admin==1)
                            {
                            echo '<th>Manage</th>';
                            }
                            ?>
                        </tr>
                    </thead>

                    <tbody>

                        <?php

                            require './dbconnect.php';
                            $res = mysqli_query($con, 'select * from list order by latest_reply DESC ;');
                            while($row = mysqli_fetch_array($res)) {
                                echo '<tr>';
                                if ($row['no']) {
                                    echo '<td><a href="post.php?no=' .$row['no'].'">' . $row['title'] . '</a></td>';
                                    echo '<td>' . $row['author'] . '</td>';
                                    echo '<td>' . $row['latest_reply'] . '</td>';
                                    echo '<td>' . $row['time'] . '</td>';

                                    if($admin==1) {
                                        echo '<td><a href="delpost.php?no=' .$row['no'].'">Delete</a></td>';
                                    }
                                }
                                echo'</tr>';

                            }
                            mysqli_free_result($res);
                            mysqli_close($con);

                        ?>
                    </tbody>
                </table>

            </div> <!-- /col-md-6 -->

        </div><!-- /row -->

    </div> <!-- /container -->

</body>

</html>