<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="author" content="Celine">
    <link rel="icon" type="image/png" href="img/icon.png">

    <title>Sport Forum</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    

    <!-- Custom styles for this template -->
    <link href="./css/register.css" rel="stylesheet">

    <script src="./js/register.js"></script>

  	</head>

  	<body>

   	<div class="container">

   	 	<header>
   	 		<span class="title">Sports World</span>
    		<span class="author">by Team 7</span>

    		<br>
    		<button id="btn-login" onclick="pw1()">Login</button>
    		<button id="btn-register" onclick="pw2()">Register</button>

    	</header>


    	<form class="form-signin" id="myForm" role="form" action="./php/login.php" method="post">

            <input type="text" name="username" class="form-control" placeholder="Username" required="" autofocus="">

            <input type="password" id="pw1" name="password" class="form-control" placeholder="Password" required="">

            <div id="pw2"></div>
            
            <button  class="btn btn-default btn-block active" type="submit" id="btn-submit">Log in</button>

            <br>
            
            
            <label class="help-info">Need Help? Contact us: help@hello.world</label>
            
        </form>
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

            
    </div> <!-- /container -->


</body>

</html>
