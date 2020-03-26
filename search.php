<?php
	require "connection.php" ;
	$link = mysqli_connect($host , $user ,$password , $db);
	session_start();
	?>
	
	<?php
	$search = $_GET['search'] ;
	$search = htmlspecialchars($search);
	$search = mysql_real_escape_string($search);
	
	$sql = "select `Title` , `Img` , `Writing` from `posts` where `Title` like '%" . $search . "%'";
	$result=mysqli_query($link,$sql);
	
	
	while($row=mysqli_fetch_assoc($result)){
			?>
			
		
		<div style="margin:120px 80px 80px 80px;">
			<h1><?php echo $row['Title']?></h1>
			
			<img src="<?php echo $row['Img']?>" width= "32%" height = "24%"  />
			<p><?php echo $row['Writing']?></p>
		</div>
		<?php
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
					
					<a href=""> <button class ="header_login_button"> <?php echo $_SESSION['username'];?> </button> </a>
					
					
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