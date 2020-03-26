<?php
	require "connection.php" ;
	$link = mysqli_connect($host , $user ,$password , $db);
	session_start();
	if(!isset($_SESSION['username']))
	
		header("Location:index.php");
	
?>
<?php
	require "connection.php" ;
	$link = mysqli_connect($host , $user ,$password , $db);
		
		
	if(isset($_POST["sub"])) {	
	$target_dir = "Uploads/";
	$target_file = $target_dir . basename($_FILES["imaged"]["name"]);
	if (move_uploaded_file($_FILES["imaged"]["tmp_name"], $target_file)) {
		$title = $_POST['Title'];
		$description = $_POST['text'];
		$usrname = $_SESSION['username'] ;
		mysqli_query($link,"INSERT INTO `posts` (`img`, `title`, `writing`, `User_name`) VALUES('$target_file','$title','$description', '$usrname')");
		} 
		else {
		   echo  "Sorry, there was an error uploading your file.";
		}
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
    <link rel="stylesheet" href="css/write.css" />
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
				<li><a href ="index.php">Home</a></li>
				<li><a href ="write.php ">Write</a></li>
				<li><a href ="Read.php ">Read</a></li>
				<li><a href =" " onclick="return false;" id="cat">Categories</a></li>
				<li><a href =" " class="subcat" style="display:none; margin-left:25px">-National</a></li>
				<li><a href =" " class="subcat" style="display:none; margin-left:25px">-International</a></li>
				<li><a href ="contact_us.php ">Contact us!</a></li>
			</ul>
			
		</div>
		
		<div class="formdiv">
			<form action="#" method="POST" enctype="multipart/form-data">
				
				<input type="text" style="width:100%; height:auto;" placeholder="Title" name="Title">
				<br><br>
				<label style="display:inline;">Upload an relavent image:</label> 
				<!--<input type="submit" name="upload" value="Upload imange" accept="image">
				-->
				<input style="display:inline;" type="file" name="imaged"  accept="image" >
			
				<br><br>
				<textarea name="text" placeholder="Write your blog" style="width:100%; height:200px;"></textarea>
				<br><br>
				<input type="submit" name="sub" value="Submit">
				
			</form>
		</div>
		
		
		<div class = "bottom">
			<h6>&copy; 2018 AUST CSE 3.1, ALL RIGHTS RESERVED </h6>
		</div>
	</div>

	<!-- The Modal -->
	<div id="myModal" class="modal">

	  <!-- Modal content -->
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



var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("Mybtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>