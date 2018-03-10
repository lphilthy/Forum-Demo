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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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

    <div class="container" >

        <div class="page-header text-center" >
            <img src="logo.png" style="width: 70%">
            
        </div>

        <a name="top"></a><!-- back to top -->

        <!-- gallery-->
    <div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="1.jpg" style="width:100%">
  <div class="text">Stephen Curry injury update: Warriors star (ankle) sits two-game trip for treatment</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="2.jpg" style="width:100%">
  <div class="text">Browns make blockbuster trade, send DeShone Kizer to Packers for Damarious Randall</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="3.jpg" style="width:100%">
  <div class="text">Jordan Montgomery nails down the No. 5 spot in Yankees rotation</div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>


<script>
    var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-5ths ">
                <h2 >Latest Threads</h2>
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
    </div>

    <!-- Container (News Section) -->
<div id="news" class="container-fluid">
  <div class="text-center">
    <h2>Weekly Special</h2>
    <h4>Update everyday!</h4>
  </div>
  <div class="row slideanim">
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Schedules</h1>
        </div>
        <div class="panel-body">
          <p>calender</p>
          <p>1</p>
          <p>2</p>
          <p>3</p>
          <p>4</p>
        </div>
        <div class="panel-footer">
          
          <button class="btn btn-lg">MORE</button>
        </div>
      </div>      
    </div>     
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Stars</h1>
        </div>
        <div class="panel-body">
            <p><a href="http://www.google.com">A</a></p>
            <p><a href="http://www.google.com">B</a></p>
            <p><a href="http://www.google.com">C</a></p>
            <p><a href="http://www.google.com">D</a></p>
            <p><a href="http://www.google.com">E</a></p>
            
            
        </div>
        <div class="panel-footer">
          
          <button class="btn btn-lg">MORE</button>
        </div>
      </div>      
    </div>       
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Twitter</h1>
        </div>
        <div class="panel-body">
          <p>A</p>
          <p>B</p>
          <p>C</p>
          <p>D</p>
          <p>E</p>
        </div>
        <div class="panel-footer">
          
          <button class="btn btn-lg">MORE</button>
        </div>
      </div>      
    </div>    
  </div>
</div>

    
    
    <!-- subscription form-->
    <div class="jumbotron text-center" >
             
             <h2>Subscribe Sports World</h2>
             <h4>Get latest sports news!</h4>
             
             <form>
                <div class="input-group">
                    <input type="email" class="form-control" size="50" placeholder="Email Address" required>
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-primary">Subscribe</button>
                    </div>
                </div>
             </form>
           
        </div>

    
    
    
    
</div> <!-- /container -->

</body>

</html>