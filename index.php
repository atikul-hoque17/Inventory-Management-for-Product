<?php

session_start();
error_reporting (1);
include("dbConfig.php");



if (isset($_REQUEST['login']))
			{
			/*	echo "<pre>";
					print_r($_REQUEST);
				echo "</pre>";
			*/				
				extract($_REQUEST);
						echo	$username;
						echo	$password;
							
						$sql="SELECT * FROM user WHERE email='$username' AND password='$password'";
								
						$result = mysqli_query($conn, $sql);

						if (mysqli_num_rows($result) > 0) {
							// output data of each row
							while($row = mysqli_fetch_array($result)) {
							echo	$_SESSION['name']=$row['name'];
							echo	 $_SESSION['id']=$row['id'];
							echo	 $_SESSION['email']=$row['email'];		
							echo	 $_SESSION['category']=$row['category'];	
							
							header("location:inventory.php");
							}
						} else {
							//echo "0 results";
						}

							
							
						
			}





 ?>




<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Inventory</title>  
 <link rel="stylesheet" href="css/style.css">
   
</head>

<body>

<?php
				if(!isset($_SESSION["id"])){
					?>
					 <div class="wrapper">
						<div class="container">
							<h1>Welcome</h1>
							
							<form class="form" action="index.php" method="GET">
								<input type="text" name='username' placeholder="Username" required/>
								<input type="password"name="password"  placeholder="Password" required/>
								<button type="submit" name="login" id="login-button">Login</button>
							</form>
						</div>
					
						<ul class="bg-bubbles">
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
						</ul>
					</div>
					
					<?php
					}else{
						header("location:inventory.php");
					}
?>
 
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

</body>

</html>
