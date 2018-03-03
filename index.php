<!DOCTYPE html>

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="author" content="Celine">
    <link rel="icon" type="image/png" href="img/icon.png">

    <title>Sport Forum</title>

    <!-- Custom styles for this template -->
    <link href="./css/register.css" rel="stylesheet">

    <script src="./js/register.js"></script>


  	</head>

  	<body>

   	<div class="container">

   	 	<header>
   	 		<span class="title">Sport World</span>
    		<span class="author">by Team 7</span>

    		<br>
    		<button id="btn-login" onclick="pw1()">Login</button>
    		<button id="btn-register" onclick="pw2()">Register</button>

    	</header>


    	<form class="form" id="myForm" role="form" action="./php/login.php" method="post">

            <input type="text" name="username" class="form-control" placeholder="Username" required="" autofocus="">

            <input type="password" id="pw1" name="password" class="form-control" placeholder="Password" required="">

            <div id="pw2"></div>


            <button type="submit" id="btn-submit">Log in</button>

            <label class="help-info">Need Help? Contact us: help@hello.world</label>

            <?php

            if(!empty($_GET['no'])){

                //Haven't got this user
                if($_GET['no'] == 1){
                    echo ("<div class='alert alert-danger' style='text-align:center; font-size: 15px;' role='alert' id='alert-info'>
                                <strong>Oops, that's not a match.</strong>
                            </div>");
                }
                //Register successful.
                else if($_GET['no'] == 2){
                    echo ("<div class='alert alert-success' style='text-align:center; font-size: 15px;' role='alert' id='alert-info'>
                                <strong>Registered succeed! Now login!</strong>
                            </div>");
                }
            }

            ?>

      </form>



    </div> <!-- /container -->


</body>

</html>
