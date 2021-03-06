<?php
	require "connection.php" ;
	$link = mysqli_connect($host , $user ,$password , $db);
	session_start();
	
	

?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/home_page.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <title>Bloggersnest</title>
</head>
<body>
	<div>
		<div class = "header">
			<div class="container">
				<h1 class = "header_name" >Bloggers' Nest!</h1>
				
				
				<?php
				if(isset($_SESSION['username']))
				{
					?>
					<a href="logout.php"> <button class ="header_login_button" > Logout </button> </a>
					
					<a href="private_page.php"> <button class ="header_login_button"> <?php echo $_SESSION['username'];?> </button> </a>
					
					
				<?php
				}
				else
				{
					?>
					
				
					
					
				
				<a href = "login_page.php"><button class = "header_login_button" >Login/Register</button> </a> 	
				
				<?php
				
				}
				?>
			</div >
			
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
	
		<div class="slider">
			<div class="container-fluid">
			   
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" data-interval="7000" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1" data-interval="7000"></li>
						<li data-target="#myCarousel" data-slide-to="2" data-interval="7000"></li>
					</ol>

					<!-- Wrapper for slides -->
					<div class="carousel-inner">
						<div class="item active">
							<img src="images/pen.jpg" alt="Los Angeles" style="width:100%;">
						</div>

						<div class="item">
							<img src="images/tea.jpg" alt="Chicago" style="width:100%;">
						</div>
				
						<div class="item">
							<img src="images/writer.jpg" alt="New york" style="width:100%;">
						</div>
					</div>

					<!-- Left and right controls -->
					<a class="left carousel-control" href="#myCarousel" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#myCarousel" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>

		</div>
		
		<div class = "bottom">
			<h6>&copy; 2018 AUST CSE 3.1, ALL RIGHTS RESERVED </h6>
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