<?php

session_start();
error_reporting (1);

// Fetch the year, month and day
    $year = date(Y);
    $month = date(m);
    $day = date(d);

    // Merge them into a string accepted by the input field
    $date_string = "$year-$month-$day";

 
 if (isset($_REQUEST['insertvoucher']))
{
/*	echo "<pre>";
		print_r($_REQUEST);
	echo "</pre>";
*/
	extract($_REQUEST);


 $salescode = mt_rand(1000,99999).""; 

 $s_due=$s_total- $s_payamount;

	
	$sqladd="INSERT INTO salesitem VALUES ('','$salescode','$product_id', '$saleprice', '$salequantity','$s_total', '$s_payamount','$s_due','$saledate')";
	$result = mysqli_query($conn, $sqladd);			
			


	$sql = ("select * from items where 	productcode = '$product_id'");
		$result = mysqli_query($conn, $sql);
		//$rows = mysql_num_rows($result);
			while($post = mysqli_fetch_assoc($result)) {
						 "this is produch".$productquantity=$post["quantity"]."";
						"this is status".$productstatus=$post["status"]."";
				}
		 "this is new".$newproductstts=$productstatus+$salequantity;
	
	$sql = ("UPDATE `inventory`.`items` SET `status` = '$newproductstts' WHERE `items`.`productcode` = '$product_id'");
		 $result = mysqli_query($conn, $sql);
		//$rows = mysql_num_rows($result);



		$sqlcustomeradd="INSERT INTO customers VALUES ('','$salescode','$customername', '$customeradress', '$customeremail','$customerphone')";
		$customeradd = mysqli_query($conn, $sqlcustomeradd);

		if($customeradd){
				header("location:inventory.php?sales");					
				} else {
				echo "Invalid Data";
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
      source: 'autocomplete.php'
    });
  });
  </script>

			<br>

            <div class="panel panel-primary" style="width:750px;margin:5px auto 5px">
              <div class="panel-heading">Add Voucher</div>
              <div class="panel-body">


                <form action="inventory.php?addvoucher" method="POST" data-toggle="validator" role="form">


  				<div class="form-group">
                      <label class="control-label" for="inputName">Product Code</label>
                      <input name="product_id"class="form-control" data-minlength="1"data-error="Enter Name.Minimum 1 Charecter"  id="skills" placeholder="Type Product Code"  type="text" required />
                      <div class="help-block with-errors"></div>
                  </div>
				  
               						
				  <div class="form-group">
                      <label class="control-label" for="inputName">Quantity</label>
                      <input name="salequantity"class="form-control" data-minlength="1"data-error="Enter Name.Minimum 1 Charecter"  id="salequantity" placeholder="Product Quantity"  type="number" required />
                      <div class="help-block with-errors"></div>
                  </div>

                
                 <div class="form-group">
                      <label class="control-label" for="inputName">Selling Price for Single Product</label>
                      <input name="saleprice"class="form-control" data-minlength="2"data-error="Enter Name.Minimum 2 Charecter" id="saleprice" placeholder="Selling Price"  type="number" required onkeyup="add()" />
                      <div class="help-block with-errors"></div>
                  </div>


                  <div class="form-group">
                      <label class="control-label" for="inputName"> Grant Total</label>
                      <input name="s_total" class="form-control" data-minlength="2" data-error="Enter Name.Minimum 2 Charecter"  id="c" placeholder="Grant Total"  type="text" readonly />
                      <div class="help-block with-errors"></div>
                  </div> 

				  
				          <div class="form-group">
                      <label class="control-label" for="inputName">Pay Amount</label>
                      <input name="s_payamount" class="form-control" data-minlength="2" data-error="Enter Name.Minimum 2 Charecter"  placeholder="Pay Amount"  type="number" required />
                      <div class="help-block with-errors"></div>
                  </div>
                   

				  
				  <div class="form-group">
                      <label class="control-label" for="inputName">Purchase Date  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                      <input type="date" id="saledate" name="saledate" value="<?php print($date_string); ?>" />
                      <div class="help-block with-errors"></div>
                  </div>
				  
				 
				  
				  
				 
			
					<!-- Customer Info From Section Start From Here -->
					<div class="panel-heading" style="background-color: #817f7f;color: #fff;font-weight: bold;">Add Customer Details</div>
	              <div class="panel-body">

				  <div class="form-group">
                      <label class="control-label" for="inputName">Customer Name</label>
                      <input name='customername' class="form-control" data-minlength="5" data-error="Enter Customer Name.Minimum 5 Characters" id="inputName" placeholder="Customer Name"  type="text" required />
                      <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                      <label class="control-label" for="inputName">Adress</label>
                      <input name='customeradress' class="form-control" data-minlength="5" data-error="Enter Customer Adress.Minimum 5 Characters" id="inputName" placeholder="Dhanmondi Dhaka"  type="text" required />
                      <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                      <label class="control-label" for="inputName">Email Name</label>
                      <input name='customeremail' class="form-control" data-minlength="5" data-error="Enter Customer Email." id="inputName" placeholder="nafi@gmail.com"  type="email" required />
                      <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                      <label class="control-label" for="inputName">Phone No </label>
                      <input name='customerphone' class="form-control" data-minlength="5" data-error="Enter Product Name.Minimum 5 Characters" id="inputName" placeholder="1670239249"  type="number" required />
                      <div class="help-block with-errors"></div>
                  </div>
			

			            <div class="form-group">
                      <button name="insertvoucher"class="btn btn-primary" type="submit">
                          Submit
                      </button>
                  </div>


				

				  
                


              </div>
            </div>












				  
                </form>


              </div>
            </div>
        </div>
		

<script type="text/javascript">
   
function add() {
  var x = parseInt(document.getElementById("salequantity").value);
  var y = parseInt(document.getElementById("saleprice").value)
  document.getElementById("c").value = x * y;
}

</script>	
	