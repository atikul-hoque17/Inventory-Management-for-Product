<?php

session_start();
error_reporting (1);
include("dbConfig.php");

 



//For Edit Product Payment


 if (isset($_REQUEST['editproduct']))
{

/*	echo "<pre>";
		print_r($_REQUEST);
	echo "</pre>";
*/	

	extract($_REQUEST);

  	$chngramount=	$lastpay+$payamount;

	$sqlUpdate="UPDATE `items` SET `payamount` = '$chngramount',`lastpaydate` = '$lastpaydate' WHERE `id` = $pro_id;";
	$result = mysqli_query($conn, $sqlUpdate);			
			if($result){
					header("location:$rdlink");						
				} else {
				echo "Invalid Data";
				}

		
}
	


//For Delete Product
	
 if (isset($_REQUEST['del']))
{

	extract($_REQUEST);
	echo $del_id;

	$sqlDel="DELETE FROM items WHERE id='$del_id';";
	$result = mysqli_query($conn, $sqlDel);				
				if($sqlDel){
					header("location:inventory.php?products");						
				} else {
				echo "Invalid Data";
				}
			
}	
	








//For Edit Product info



 if (isset($_REQUEST['editproinfo']))
{

	extract($_REQUEST);	
	echo "<pre>";
		print_r($_REQUEST);
	echo "</pre>";

echo $filename = $_FILES["file"]["name"];	


if($filename != ""){
	
	
	$filename = $_FILES["file"]["name"];
	//$file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
	$file_ext = substr($filename, strripos($filename, '.')); // get file name
	$filesize = $_FILES["file"]["size"];
	//$allowed_file_types = array('.doc','.docx','.rtf','.pdf','jpg','jpeg','png');	
	$allowed_file_types = array('.doc','.docx','.rtf','.pdf','.jpg','.jpeg','.png');
	if (in_array($file_ext,$allowed_file_types) && ($filesize < 2000000))
	{	
		// Rename file
			$temp = explode(".",$filename);
			$newImagename = rand(1,9999999) . '.' .end($temp);
			
		$sqlupDate="UPDATE `inventory`.`items` SET `productcode` = '$productcode',`name` = '$productname', `vendorprice` = '$vendorprice', `rtlprice` = '$rtlprice', `quantity` = '$quantity', `totalprice` = '$totalprice', `payamount` = '$payamount', `vendorname` = '$vendorname', `image` = '$newImagename' WHERE `items`.`id` = $pro_id";
		$result = mysqli_query($conn, $sqlupDate);
			
			if($result){
			
				move_uploaded_file($_FILES["file"]["tmp_name"], "images/" . $newImagename);
				
				 $file= 'images/'.$images;
				 unlink($file);
							
				header("location: $rdlink");
				} else {
				echo "Invalid Data";
				}
					
	}
	elseif (empty($file_basename))
	{	
		// file selection error
		echo "Please select a file to upload.";
	} 
	elseif ($filesize > 200000)
	{	
		// file size error
		echo "The file you are trying to upload is too large.";
	}
	else
	{
		// file type error
		echo "Only these file typs are allowed for upload: " . implode(', ',$allowed_file_types);
		unlink($_FILES["file"]["tmp_name"]);
	}
	
	
}else{

$sqlupDate="UPDATE `inventory`.`items` SET `productcode` = '$productcode', `name` = '$productname', `vendorprice` = '$vendorprice', `rtlprice` = '$rtlprice', `quantity` = '$quantity', `totalprice` = '$totalprice', `payamount` = '$payamount', `vendorname` = '$vendorname', `image` = '$images' WHERE `items`.`id` = $pro_id";
	$result = mysqli_query($conn, $sqlupDate);

	header("location: $rdlink");
}


		
}




// For Edit Vendor Name

 if (isset($_REQUEST['editvendor']))
{

/*	echo "<pre>";
		print_r($_REQUEST);
	echo "</pre>";
*/	

	extract($_REQUEST);  	

	$sqlUpdate="UPDATE vendor SET `vendorname` = '$vendorname' WHERE `vendor`.`id` = $vendor_id;";
	$result = mysqli_query($conn, $sqlUpdate);			
			if($result){
					header("location:$rdlink");						
				} else {
				echo "Invalid Data";
				}

		
}

// For Edit Vendor Name

 if (isset($_REQUEST['editcategory']))
{

/*	echo "<pre>";
		print_r($_REQUEST);
	echo "</pre>";
*/	

	extract($_REQUEST);  	

	$sqlcatUpdate="UPDATE category SET `categoryname` = '$categoryname' WHERE `category`.`id` = $categoryid;";
	$result = mysqli_query($conn, $sqlcatUpdate);			
			if($result){
					header("location:$rdlink");						
				} else {
				echo "Invalid Data";
				}

		
}


if (isset($_REQUEST['editclient']))
{

/*	echo "<pre>";
		print_r($_REQUEST);
	echo "</pre>";

*/
	extract($_REQUEST);  	

	$sqlUpdateclient="UPDATE `customers` SET  `customername` = '$customername', `customeradress` = '$customeradress', `customeremail` = '$customeremail', `customerphone` = '$customerphone' WHERE `customers`.`id` = $customer_pro_id;";
	$resultclient = mysqli_query($conn, $sqlUpdateclient);			
			if($resultclient){
					header("location:$rdlink");						
				} else {
				echo "Invalid Data";
				}
		
}


// For Delete Vendor Name

if (isset($_REQUEST['dltvendor']))
{

/*	echo "<pre>";
		print_r($_REQUEST);
	echo "</pre>";
*/

	extract($_REQUEST);

  	
	$sqlDelven="DELETE FROM vendor WHERE id='$dltvenid';";
	$result = mysqli_query($conn, $sqlDelven);				
				if($sqlDelven){
					header("location:inventory.php?vendors");						
				} else {
				echo "Invalid Data";
				}

}
// For Delete Vendor Name

if (isset($_REQUEST['delcategory']))
{

/*	echo "<pre>";
		print_r($_REQUEST);
	echo "</pre>";
*/

	extract($_REQUEST);

  	
	$sqlDelcat="DELETE FROM category WHERE id='$delcategoryid';";
	$result = mysqli_query($conn, $sqlDelcat);				
				if($sqlDelcat){
					header("location:inventory.php?category");						
				} else {
				echo "Invalid Data";
				}

}



//Delevery Done Portion

 if (isset($_REQUEST['deleverydone']))
{

	echo "<pre>";
		print_r($_REQUEST);
	echo "</pre>";
	

	extract($_REQUEST);  	

	$sqldeleveryadd="INSERT INTO deleveryinfo VALUES ('','$salescode','$product_id','$saleprice','$salequantity','$s_total','$s_payamount','$saledate')";
	$resultadddelvery = mysqli_query($conn, $sqldeleveryadd);			
			
			if($resultadddelvery){
											
			$sqlsaleDel="DELETE FROM salesitem WHERE salescode='$salescode';";
			$resultseldlt = mysqli_query($conn, $sqlsaleDel);				
				if($resultseldlt){
					header("location:inventory.php?deliverylist");
				} else {
				echo "Invalid Data";
				}


			}

		
}
 
 ?>