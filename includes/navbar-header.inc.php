<?php
    session_start();
    $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    if(strpos($url, 'includes')!==false){
        include 'class-autoload.inc.php';
    }
    else {
        include 'includes/class-autoload.inc.php';
    }
?>
<!doctype html>
<html>
<head>
    <meta charset = "utf-8">
    <meta http-equiiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Website</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styles">
    <link rel="stylesheet" href="css/bootstrap-social.css">
</head>
<body>
<nav class="navbar navbar-dark navbar-expand-sm fixed-top">
        <div class="container">
           <a class="navbar-brand mr-auto" href="/MainPage"><img src="/img1/logo" height="30" width="30"></a>
           <div class="collapse navbar-collapse" id="Navbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="/MainPage"><span class="fa fa-home fa-lg"></span> Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/AboutMe"><span class="fa fa-info fa-lg"></span> About</a></li>
                    <li class="nav-item"><a class="nav-link" href="/Recipes"><span class="fa fa-list fa-lg"></span> Recipes</a></li>
                    <li class="nav-item"><a class="nav-link" href="/Contact"><span class="fa fa-address-card fa-lg"></span> Contact</a></li>
                </ul>     
                <?php
                    if (isset($_SESSION['userId'])) {
                        echo '<form action="includes/logout.inc.php" method="POST">
                                    <button type="submit" name="logout-submit" style="background-color: #5AAAAE; color: floralwhite;><span class="fa fa-sign-out"></span>Logout</button>
                               </form>';   
                    }
                    else {?>
                        <a href="login.php">
                        <button type="submit" id="loginbutton" style="background-color: #5AAAAE; color: floralwhite;">
                        <span class="fa fa-sign-in"></span>Login
                        </button></a>
                        <a href="signup.php" style="text-decoration: none; color: floralwhite;">
                            &nbsp; Sign Up!
                        </a><?php
                    }
                ?>        
            </div>   
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <header class="jumbotron">
        <div class="container">
            <div class="row row-header">
                <div class="col-12 col-sm-9">
                    <h1>Skillet Diaries</h1>
                    <p>Dear diet, things just aren't looking good for both of us. It's not me, it's you. 
                        You're too much work. You're boring and I can't stop cheating on you.
                    </p>
                </div>
                <div class="col-12 col-sm-3">
                	<div class="col-12 col-sm align-self-center">
                    <img src="/img1/logo" class="img-fluid">
                	</div>
                </div>                
            </div>
        </div>
    </header>
</html>