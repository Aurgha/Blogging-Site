<?php
	SESSION_START();
	
	require "connection.php" ;
	$link = mysqli_connect($host , $user ,$password , $db);
	
	//for login part
	if(isset($_POST['login_submit']))
	{
		$lg_mail = $_POST['login_mail'];
		$lg_pass = $_POST['login_pass'];
		
		$login_sql = "select `User_name` , `User_id` from login where User_email = '" . $lg_mail . "' and User_pass = '" . $lg_pass . "' limit 1" ;
		$result = mysqli_query($link , $login_sql);
		$U_name = mysqli_fetch_assoc($result) ;
		$name = $U_name["User_name"] ;
		//$U_id = $U_name["User_id"] ; 
		
		
		
		
		if(mysqli_num_rows($result) == 1)
		{
			$_SESSION['username'] = $name ;
			//$_SESSION['user_id'] = $U_id ;
			header("refresh:1 url=index.php");
			exit() ;
		}
		
		else{
			echo "Wrong Info";die();
			exit() ;
		}
	}
	
	//for reg part
	if(isset($_POST['reg_submit']))
	{
		$r_name = $_POST['reg_name'] ;
		$r_mail = $_POST['reg_mail'];
		$r_pass = $_POST['reg_pass'];
		$r_contact = $_POST['reg_contact'] ;
		
		$reg_sql = "insert into `login` (`User_name`, `User_email`, `User_contact`, `User_pass`) values ('$r_name','$r_mail','$r_contact','$r_pass')" ;
		
		mysqli_query($link , $reg_sql) ;
	}
	
?>



<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/login.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <title>Bloggersnest</title>
</head>
<body >
	<div>
		<div class = "header">
		
			<div class="container">
				<h1 class = "header_name" >Bloggers' Nest!</h1>  	
			</div>
			
			<div class="menu-icon">
				<span> </span>
				<span> </span>
				<span> </span>
			</div>
		
		</div>
		
		<div class = "sidebar">
			<ul class = "menu">
				<li><a href =" index.php ">Home</a></li>
				<li><a href =" write.php ">Write</a></li>
				<li><a href =" read.php ">Read</a></li>
				<li><a href =" " onclick="return false;" id="cat">Categories</a></li>
				<li><a href =" " class="subcat" style="display:none; margin-left:25px">-National</a></li>
				<li><a href =" " class="subcat" style="display:none; margin-left:25px">-International</a></li>
				<li><a href =" contact_us.php">Contact us!</a></li>
			</ul>
			
		</div>
		
		<div class = "container-fluid " id= "backgrnd">
			<div class = "row">
				<div class = "col-md-6 col-sm-6 col-xs-12">
					<h2>Login Here</h2>
					<form class = "form-container" method = "POST" action = "#">
						<div class="form-group">
							<label for="LoginEmail1">Email address</label>
							<input type="email" class="form-control" name="login_mail" placeholder="Email">
						</div>
						<div class="form-group">
							<label for="LoginPassword1">Password</label>
							<input type="password" class="form-control" name="login_pass" placeholder="Password">
						</div>
						
					  <button type="submit" class="btn btn-success btn-block" name = "login_submit" id = "MyLoginBtn">Login</button>
					</form>
				</div>
				<div class = "col-md-6 col-sm-6 col-xs-12">
					<h2>Register Here</h2>
					<form class = "form-container" method = "POST">
						<div class="form-group">
							<label for="RegName">Full Name</label>
							<input type="text" class="form-control" name="reg_name" placeholder="Enter Your Full Name">
						</div>
						<div class="form-group">
							<label for="RegEmail">Email Address</label>
							<input type="text" class="form-control" name="reg_mail" placeholder="Enter Your Email Address">
						</div>
						<div class="form-group">
							<label for="RegContact">Contact Number</label>
							<input type="text" class="form-control" name="reg_contact" placeholder="Enter Contact Number">
						</div>
						<div class="form-group">
							<label for="RegPassword">Password</label>
							<input type="password" class="form-control" name="reg_pass" placeholder="Enter Password">
						</div>
					  <button type="submit" class="btn btn-success btn-block" name = "reg_submit">Register</button>
					</form>
				</div>
			</div>
		</div>
		
		
		<div class = "bottom">
			<h6>&copy; 2018 AUST CSE 3.1, ALL RIGHTS RESERVED </h6>
		</div>
	</div>

	<div id="myModal" class="modal">

		<div class="modal-content">
			<span class="close">&times;</span>
			<p>Welcome</p>
		</div>

	</div>
	
</body>
</html>

<script>
$(document).ready(function(){
	on=false;
	subCatOn=false;
	$(".sidebar").hide();
	$(".menu-icon").click(function(){
		if(on==true)
		{
			$(".sidebar").hide();
			$(".subcat").hide();
			on=false;
			subCatOn=false;
		}
		else{
			$(".sidebar").show();
			on=true;
		}
		
	});
	$("#cat").click(function(){
		if(subCatOn==true)
		{
			$(".subcat").hide();
			subCatOn=false;
		}
		else{
			$(".subcat").show();
			subCatOn=true;
		}
	});
});
</script>