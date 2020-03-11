

<style>
	
 th{
font-size: 12px;
}	
 td{
font-size: 12px;
}
</style>

				<?php
						if(isset($_REQUEST['editproduct'])){
							$value=$_REQUEST['editproduct'];
							
						}


				?>
				
								

<br><br>

<?php
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
 ?>

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


							<div class="container">
								  <table class="table table-hover">
								  <h4>Edit Product </h4>
									<thead>
									   <tr style="background-color:#1b629f;color:#fff;">
										<th>#</th>
										<th>Sales Code</th>										
										<th>Pro.Name</th>
										<th>S.Price</th>										
										<th>Quantity</th>
										<th>G.Total</th>										
										<th>Payamount</th>
										<th>Due</th>										
										<th>Date</th>								
										<th>Action</th>
									  </tr>
									</thead>
									<tbody>	
									
							<?php
							
								$sl_no=1;
								$sql=("SELECT * FROM items WHERE id = '$value'");
								$result = mysqli_query($conn, $sql);
								$rows = mysqli_num_rows($sql);

								
								while($post = mysqli_fetch_assoc($result)){
												
											$pro_id=$post["id"];	
											$productcode=$post["productcode"];			
											$productname=$post["name"];						
											$vendorprice=$post["vendorprice"];	
											$vendorname=$post["vendorname"];					
											$rtlprice=$post["rtlprice"];
											$quantity=$post["quantity"];
											$totalprice=$post["totalprice"];
											$payamount=$post["payamount"];
											$images=$post["image"];
								
								?>
								<form class="form-horizontal" action="process.php" enctype="multipart/form-data" method="POST">
								 <tr>
													
													<input type="hidden" name="pro_id" value="<?php echo $value; ?>" id="usr">
													<input type="hidden" name="images" class="form-control" value="<?php echo $images; ?>" />
													<input type="hidden" name="rdlink" value="<?php echo $actual_link; ?>" id="usr">
													
													
													<td>													
					   								 <input name="vendorname"class="form-control" data-minlength="1"data-error="Enter Name.Minimum 1 Charecter"  id="skills" placeholder="Vdndor Name" type="text" value="<?php echo $vendorname; ?>"required />
													</td>	

													<td><input type="text" name="productcode" class="form-control" value="<?php echo $productcode; ?>" ></td>

													<td><input type="text" name="productname" class="form-control" value="<?php echo $productname; ?>" ></td>	

													<td><input type="text" name="vendorprice" class="form-control" value="<?php echo $vendorprice; ?>" id="vendorprice" ></td>	

													<td><input type="text" name="rtlprice" class="form-control" value="<?php echo $rtlprice; ?>" ></td>	

													<td><input type="text" name="quantity" class="form-control" value="<?php echo $quantity; ?>"  id="quantity" onkeyup="add()"></td>	

													<td><input type="number" name="totalprice" class="form-control" value="<?php echo $totalprice; ?>" id="c" ></td>	
												

													<td><input type="number" name="payamount" class="form-control" value="<?php echo $payamount; ?>" /></td>


													

													<td style="width: 80px;">
														<button type="submit" name="editproinfo" class="btn btn-success">
														  <span style="color:#fff" class="glyphicon glyphicon-ok"></span>  														  
														</button>
													<a style="margin-top:2px;" class="btn btn-danger" href="inventory.php?products"><span class="glyphicon glyphicon-remove"></span></a>
													</td>										
								 </tr>

 								<tr>
									<td><img  src="images/<?php echo $images;?>" width="100" height="100"> </td>					
									<td>New Image: </td>
									<td><input  type="file" class="input-field" name="file" /></td>
									<td> </td>
									<td> </td>
									<td> </td>
									<td> </td>
									<td> </td>	
									<td> </td>												
								 </tr>


								 </form>
								<?php 
								}
							?>		
							</tbody>
							 </table>
							</div>							
<script type="text/javascript">
   
function add() {
  var x = parseInt(document.getElementById("vendorprice").value);
  var y = parseInt(document.getElementById("quantity").value)
  document.getElementById("c").value = x * y;
}

</script> 						