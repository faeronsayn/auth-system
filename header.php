<?php 
include 'as-config.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
		<title>Authentication System made by Maaz Ali</title>
	</head>

<body style data-twttr-renderd="true">

	<header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
    	<div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/auth_system/">Auth System</a>
                </div>
                
                <div class="collapse navbar-collapse" id="navbar-collapse-1">
                
                    <ul class="nav navbar-nav">
                        <li><a href="/">Maaz Ali</a></li>
                        <li><a href="https://github.com/faeronsayn/auth-system">github</a></li>
                    </ul>            
                
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Register</a></li>
                    </ul>
                </div>
            
        </div>
	</header>

	<div id="notify-user"></div>

	<div class="container" style="padding-top: 70px;">