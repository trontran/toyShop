<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATN TOYS</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="image/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
:root {
--green-color: #008000;
--purple-color: #6c14d0;
}

section nav {
display: flex;
align-items: center;
justify-content: space-around;
box-shadow: 0 0 8px rgba(0, 0, 0, 0.6);
background: lightgreen;
position: fixed;
top: 0;
left: 0;
right: 0;
z-index: 100;
}

section nav .logo{
font-size: 35px;
color: green;
margin: 5px 0;
cursor: pointer;
position: relative;
left: -4%;
}

section nav .logo span{
color: green;
text-decoration: underline;
}

section nav ul{
list-style: none;
margin: 0;
padding: 0;
}

section nav ul li{
display: inline-block;
margin: 0 15px;
}

section nav ul li a{
text-decoration: none;
color: black;
transition: 0.2s;
}

section nav ul li a:hover{
color: var(--green-color);
}

section nav div .nav-link {
color: black;
margin: 0 15px;
display: inline-block;
transition: 0.2s;
}

section .main .main_content{
display: flex;
align-items: center;
justify-content: space-around;
}

section .main .main_content .main_text h1{
font-size: 90px;
line-height: 70px;
font-family: 'pyxidium quick';
background: linear-gradient(to right, var(--green-color), var(--purple-color));
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;
position: relative;
top: 45px;
left: 5%;
}

section .main .main_content .main_text h1 span{
font-size: 70px;
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;
}

section .main .main_content .main_text p{
width: 600px;
text-align: justify;
line-height: 21px;
position: relative;
top: 85px;
left: 5%;
}

section .main .main_content .main_image img{
    width: 400px;
    margin-right: 20px; 
    margin-bottom: 20px; 
}

section .main .social_icon{
position: absolute;
top: 50%;
left: 98%;
transform: translate(-50%,-50%);
font-size: 19px;
}

section .main .social_icon i{
margin: 8px 0;
cursor: pointer;
transition: 0.3s;
}

section .main .social_icon i:hover{
    color: #c72092;
}
</style>
<body>

    <section>
        <nav>
            <div class="logo">
                <h1>ANT TOY<span>s</span></h1>
            </div>

            <ul>    
                <li><a href="index.php">Home</a></li>
                <li><a href="allproduct.php">Products</a></li>
                <li><a href="search.php">Search</a></li>
	
            </ul>
		<div class="Products">
            <a href="sum.php" class="nav-link">Summary Revenue</a>
            <a href="addstores.php" class="nav-link">ADD Store</a>
            <a href="addproduct.php" class="nav-link">ADD Product</a>
            <a href="liststore.php" class="nav-link">Information Store</a>
            
						<?php
						session_start();
						if(isset($_SESSION['user_name'])):
                            $username = $_SESSION['user_name'];
						?>	 
						<a href="login.php" class="nav-link" style="color:red;text-decoration:"> Welcome Back! <?=$_SESSION['user_name']?></a>
						<a href="logout.php" class="nav-link">Logout</a>
						<?php 
						else :		
						?>
						<a href="login.php" class="nav-link">Login</a>
						<a href="register.php" class="nav-link">Register</a>
						<?php
						endif;
						?>
					</div>
        </nav>
	
        <div class="main" id="Home">
            <div class="main_content">
                <div class="main_text">
                    <h1>Toys<br><span>Collection</span></h1>
                </div>
                <div class="main_image">
                    <img src="image/marvel.png">
                </div>
            </div>

        </div>

    </section>
