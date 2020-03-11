<style>

/* */
body {margin:0;}

.navbar {
	background-color: #31495d;
	position: fixed;
	top: 0;
	width: 100%;
	height: 50px;
	border-radius: 0;
}

.dropbtn {
  background-color: #31495d;
  color: white;
  padding: 14px 10px 8px 5px;
  font-size: 14px;
  border: none;
}


.main {
  padding: 16px;
  margin-top: 30px;
  height: 1500px; /* Used in this example to enable scrolling */
}




/*Search Menu Design start */


input[name="search"] {
	width: 200px;
	height: 35px;
	margin-top: 8px;
	box-sizing: border-box;
	border: 2px solid #ccc;
	border-radius: 4px;
	font-size: 16px;
	background-color: white;
	background-image: url('searchicon.png');
	background-position: 10px 10px;
	background-repeat: no-repeat;
	/* padding: 8px 2px 12px 40px; */
	-webkit-transition: width 0.4s ease-in-out;
	transition: width 0.4s ease-in-out;
	text-align: center;
}

input[name="search"]:focus {
    width: 100%;
}

/*Search Menu Design finish */

/*footer Design start */

 footer {
    background-color: #31495d;
    color: #f5f5f5;
    padding: 15px;
}

footer a {
    color: #f5f5f5;
}

footer a:hover {
    color: #777;
    text-decoration: none;
}
/*footer Design finish */



/*mainbody Design start */

.mainbody{
	margin-top:30px;
	width:100%
	height:500px;
	background-color:red;
	overflow:hidden;
	
}

.bg-1 {
      background: #fff;
      color: #bdbdbd;
  }
  .bg-1 h3 {color: #3b9f0f;}
  .bg-1 p {font-style: italic;}
  .list-group-item:first-child {
      border-top-right-radius: 0;
      border-top-left-radius: 0;
  }

/*mainbody Design finish */
.mainbody {
	margin-top: 30px;
	width: 100% height:500px;
	background-color: white;
	overflow: hidden;
}

</style>




<?php

session_start();
error_reporting (1);
include("dbConfig.php");


 $ssn_name=$_SESSION["name"];
 $ssn_id=$_SESSION["id"];
 //echo $ssn_id;
					if(isset($_REQUEST['logout'])){
					session_destroy();
					header("location:index.php");
					}

					if(!isset($ssn_id)){
					session_destroy();
					header("location:index.php");
					}
					
?>




<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"></link>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>



</head>
<body>

<?php
include('header.php');
 ?>

 <div class="mainbody">
 
 <?php
			if(isset($_REQUEST['additems'])){
			include('insertproduct.php');
			}
			elseif(isset($_REQUEST['addcategory'])){
			include('insertcategory.php');
			}
			elseif(isset($_REQUEST['addvendor'])){
			include('insertvendor.php');
			}
			elseif(isset($_REQUEST['vendors'])){
			include('allvendors.php');
			}
			elseif(isset($_REQUEST['category'])){
			include('allcategory.php');
			}			
			elseif(isset($_REQUEST['sales'])){
			include('salesitem.php');
			}
			elseif(isset($_REQUEST['deliverylist'])){
			include('alldelevery.php');
			}
			elseif(isset($_REQUEST['clients'])){
			include('allclients.php');
			}
			elseif(isset($_REQUEST['editproduct'])){
			include('editproduct.php');
			}
			elseif(isset($_REQUEST['addvoucher'])){
			include('insertvoucher.php');
			}
			elseif(isset($_REQUEST['products'])){
			include('itemlistall.php');
			}
			elseif(isset($_REQUEST['vendor_page'])){
			include('allvendorwithpagination.php');
			}
			elseif(isset($_REQUEST['product_page'])){
			include('allproductwithpagination.php');
			}
			elseif(isset($_REQUEST['sales_page'])){
			include('allsalewithpagination.php');
			}
			elseif(isset($_REQUEST['client_page'])){
			include('allclientwithpagination.php');
			}
			elseif(isset($_REQUEST['delivery_page'])){
			include('alldeliverywithpagination.php');
			}
			elseif(isset($_REQUEST['produtinfo'])){
			include('printproduct.php');
			}
			elseif(isset($_REQUEST['del'])){
			include('itemlistall.php');
			}
			
			elseif(isset($_REQUEST['delvendor'])){
			include('allvendors.php');
			}
			elseif(isset($_REQUEST['delcategory'])){
			include('allcategorymain.php');
			}
			else{				
				?>
				<div class="jumbotron">
				  <div class="container text-center">
					<h1>Kiddy Buddy !!!</h1>      
					<p>Wlcome to our Kiddy Buddy Management process... :)</p>
				  </div>
				</div>
				<?php
			}
			
 ?>
		 
		
 </div>
 
 <?php include("footer.php"); ?>




</body>
</html>



<script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>