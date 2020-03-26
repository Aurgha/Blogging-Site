<?php
	require "connection.php" ;
	$link = mysqli_connect($host , $user ,$password , $db);
	session_start();

	//for reg part
	if(isset($_POST['reg_submit']))
	{
		$c_name = $_POST['con_name'] ;
		$c_mail = $_POST['con_mail'];
		$c_cntct = $_POST['con_contact'];
		$c_text = $_POST['text'] ;
		
		$reg_sql = "insert into `contact_us` (`ConName`, `ConEmail`, `ConContact`, `ConText`) values ('$c_name','$c_mail','$c_cntct','$c_text')" ;
		
		mysqli_query($link , $reg_sql) ;
	}
	
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/contact.css" />
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
                		<?php
				if(isset($_SESSION['username']))
				{
					?>
					<a href="logout.php"> <button class ="header_login_button"> Logout </button> </a>
					
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
					<h2><i>Contact Us</i></h2>
					<p>Email : bloggersnest@gmail.com</p>
					<p>Moblie : +8801731513519</p>
				</div>
				
				<div class = "col-md-6 col-sm-6 col-xs-12">
					<h2><i>Tell Us Something...</i></h2>
					<form class = "form-container" method = "POST">
						<div class="form-group">
							<label for="ConName">Name</label>
							<i><input type="text" class="form-control" name="con_name" placeholder="Enter Your Full Name"></i>
						</div>
						<div class="form-group">
							<label for="ConEmail">Email Address</label>
							<i><input type="text" class="form-control" name="con_mail" placeholder="Enter Your Email Address"></i>
						</div>
						<div class="form-group">
							<label for="ConContact">Contact Number</label>
							<i><input type="text" class="form-control" name="con_contact" placeholder="Enter Contact Number"></i>
						</div>
						<div class="form-group">
							<label for="ConText">Your Opinion</label>
							<i><textarea class="form-control" name="text" placeholder="Your valuable suggestions....."></textarea></i>
						</div>
						
					  <button type="submit" class="btn btn-success btn-block" name = "reg_submit">Send</button>
					</form>
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