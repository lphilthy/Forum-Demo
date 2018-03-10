<!--
    new post page
    interface
-->
<!DOCTYPE html>

<?php
session_start();


if(empty($_SESSION['username'])){
    include './destroy.php';
    header("Location:../index.php");
    exit();
}

$username = $_SESSION['username'];
?>

<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="author" content="Celine">
    <link rel="icon" type="image/png" href="../img/icon.png">

    <title>Sport Forum</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="../css/theme.css" rel="stylesheet">
    <link href="../css/post.css" rel="stylesheet">

    <!-- New post javascript-->
    <script src="../js/dropdown.js"></script>

</head>

<body data-gr-c-s-loaded="true">

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

            </ul><!--end nav-tabs-->
        </div>

    </nav><!--end nav-->

    <div class="container">
        <div class="page-header">
            <h3>Create New Thread</h3>
        </div>

        <a name="top"></a><!-- Top -->

        <form role="form" action="./savenewpost.php" method="post">
            <div class="form-group">
                <input type="text" name="title" class="form-control title" maxlength="30" placeholder="Input title">
                <textarea name="content" class="form-control post-content" rows="10" placeholder="Enput content"></textarea>

                <button type="submit" class="btn btn-lg btn-primary">Publish</button>

            </div>
        </form>

    </div>

</body>

</html>