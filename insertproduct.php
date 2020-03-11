

<style>
	
 th{
font-size: 12px;
}	
 td{
font-size: 12px;
}
</style>
		
<?php

session_start();
error_reporting (1);

// Fetch the year, month and day
    $year = date(Y);
    $month = date(m);
    $day = date(d);

    // Merge them into a string accepted by the input field
    $date_string = "$year-$month-$day";

 
 if (isset($_REQUEST['addproduct']))
{
/*	echo "<pre>";
		print_r($_REQUEST);
	echo "</pre>";
*/	
	extract($_REQUEST);

$filename = $_FILES["file"]["name"];


$stocks=0;








$sql = ("select * from items where 	productcode = '$productcode'");
$result = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($result);
if($rows >0){

	?>	
														  
	<div style="width: 400px;margin: auto;" class="alert alert-danger alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		<strong>Warning!</strong> Sorry This already have in product list.
	 </div>	

	<?php	


}else{


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
			
		$sqladd="INSERT INTO items VALUES ('','$productcode','$name', '$vendorprice', '$rtlprice', '$quantity','$totalprice' ,'$payamount', '$vendorname', '$purchasedate', '$lastpaydate','$newImagename', '$stocks')";
			$result = mysqli_query($conn, $sqladd);		
				
			if($result){
			
				move_uploaded_file($_FILES["file"]["tmp_name"], "images/" . $newImagename);
				?>
				<div class="container">  
				  <div class="alert alert-success alert-dismissable">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
					<strong>Success!</strong>Product has been successfully inserted.
				  </div>
				</div>

				<?php		
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


}




}
 
 ?>


<style>
.panel-primary {
	border-color: #eaeaea;
}
</style>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

  <script>
  $(function() {
    $( "#skills" ).autocomplete({
      source: 'autocompletevendor.php'
    });
  });
  </script>

			<br>

            <div class="panel panel-primary" style="width:750px;margin:5px auto 5px">
              <div class="panel-heading">Add Items</div>
              <div class="panel-body">


                <form action="inventory.php?additems" method="POST" enctype="multipart/form-data" data-toggle="validator" role="form">

				<div class="form-group">
                      <label class="control-label" for="inputName">Product Code</label>
                      <input name='productcode' class="form-control" data-minlength="5" data-error="Enter product code.Minimum 5 Characters" id="inputName" placeholder="Product Code (CKA-KS03)"  type="text" required />
                      <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                      <label class="control-label" for="inputName">Product Name</label>
                      <input name='name' class="form-control" data-minlength="5" data-error="Enter Product Name.Minimum 5 Characters" id="inputName" placeholder="Product Name"  type="text" required />
                      <div class="help-block with-errors"></div>
                  </div>
				  
                  <div class="form-group">
                      <label class="control-label" for="inputName">Vendor Price</label>
                      <input name='vendorprice' class="form-control" data-minlength="2"data-error="Enter Vendor Pric.Minimum 2 Characters" id="vendorprice" placeholder="Vendor Price"  type="number" required />
                      <div class="help-block with-errors"></div>
                  </div>
				  
                  <div class="form-group">
                      <label class="control-label" for="inputName">Selling Price</label>
                      <input name="rtlprice"class="form-control"data-minlength="2"data-error="Enter Selling Price.Minimum 2 Characters" id="" placeholder="Selling Price"  type="number" required />
                      <div class="help-block with-errors"></div>
                  </div>
				  
				  <div class="form-group">
                      <label class="control-label" for="inputName">Quantity</label>
                      <input name="quantity"class="form-control"data-minlength="1"data-error="Enter Quantity.Minimum 1 Characters"  id="quantity" placeholder="Product Quantity"  type="number" required onkeyup="add()" />
                      <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                      <label class="control-label" for="inputName">Total</label>
                      <input name="totalprice"class="form-control"data-minlength="1"data-error="Enter Name.Minimum 1 Character"  id="c" placeholder="Total Price of Purchase"  type="number" required />
                      <div class="help-block with-errors"></div>
                  </div>
				  
				  <div class="form-group">
                      <label class="control-label" for="inputName">Pay Amount</label>
                      <input name="payamount" class="form-control"data-minlength="2"data-error="Enter Pay Amount.Minimum 2 Characters"  id="inputName" placeholder="Pay Amount"  type="number" required />
                      <div class="help-block with-errors"></div>
                  </div>
                   
				  				  
				  <div class="form-group">
                      <label class="control-label" for="inputName">Vendor Name</label>
                      <input name="vendorname"class="form-control" data-minlength="1"data-error="Enter Name.Minimum 1 Charecter"  id="skills" placeholder="Vdndor Name"  type="text" required />
                      <div class="help-block with-errors"></div>
                  </div>
				  
				  <div class="form-group">
                      <label class="control-label" for="inputName">Purchase Date  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                      <input type="date" id="purchasedate" name="purchasedate" value="<?php print($date_string); ?>" />
                      <div class="help-block with-errors"></div>
                  </div>
				  
				  <div class="form-group">
                      <label class="control-label" for="inputName">Last Payment Date &nbsp;&nbsp;&nbsp;</label>
                      <input type="date" id="lastpaydate" name="lastpaydate" value="<?php print($date_string); ?>" />
                      <div class="help-block with-errors"></div>
                  </div>

                   <div class="form-group">
                      <label class="control-label" for="inputName">Product Image</label>
                     <input type="file" class="input-field" name="file" value="" placeholder="" required/>
                      <div class="help-block with-errors"></div>
                  </div>
				  
				  		 
				  
			      <div class="form-group">
                      <button name="addproduct"class="btn btn-primary" type="submit">
                          Submit
                      </button>
                  </div>
				  
                </form>


              </div>
            </div>
        </div>


<script type="text/javascript">
   
function add() {
  var x = parseInt(document.getElementById("vendorprice").value);
  var y = parseInt(document.getElementById("quantity").value)
  document.getElementById("c").value = x * y;
}

</script>        