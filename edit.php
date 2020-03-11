
									
							<?php
							
								echo $value ;
								
								?>	
								

<br><br>

<?php
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
 ?>
							<div class="container">
								  <table class="table table-hover">
								  <h4>Edit Product </h4>
									<thead>
									   <tr style="background-color:#1b629f;color:#fff;">
										<th>Pro.Name</th>
										<th>Ven. Price</th>
										<th>Ret. Price</th>
										<th>Quantity</th>
										<th>Total Price</th>
										<th>Due</th>
										<th>Pay Amount</th>																		
										<th>Last Pay</th>
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
											$rtlprice=$post["rtlprice"];
											$quantity=$post["quantity"];
											$totalprice=$post["totalprice"];
											$payamount=$post["payamount"];
											$vendorid=$post["vendorid"];
											$purchasedate=$post["purchasedate"];
											$lastpaydate=$post["lastpaydate"];
											$status=$post["status"];
								
								?>
								<form action="process.php" method="post">
								 <tr>
													
													<input type="hidden" name="pro_id" value="<?php echo $pro_id; ?>" id="usr">
													<input type="hidden" name="rdlink" value="<?php echo $actual_link; ?>" id="usr">
													<input type="hidden" name="lastpay" value="<?php echo $payamount; ?>" id="usr">
													
													<td><input type="text" name="productname" class="form-control" value="<?php echo $productname; ?>" disabled></td>	

													<td><input type="text" name="vendorprice" class="form-control" value="<?php echo $vendorprice; ?>" disabled></td>	

													<td><input type="text" name="rtlprice" class="form-control" value="<?php echo $rtlprice; ?>" disabled></td>	

													<td><input type="text" name="quantity" class="form-control" value="<?php echo $quantity; ?>" disabled></td>	

													<td><input type="text" name="totalprice" class="form-control" value="<?php echo $totalprice; ?>" disabled></td>	

													<td><input type="text" name="totalprice" class="form-control" value="<?php echo $totalprice - $payamount; ?>" disabled></td>	

													<td><input type="number" name="payamount" class="form-control" required/></td>

													<td> <input type="date" id="lastpaydate" name="lastpaydate" value="<?php print($date_string); ?>" required/></td>	

													

													<td style="width: 80px;">
														<button type="submit" name="editproduct" class="btn btn-success">
														  <span style="color:#fff" class="glyphicon glyphicon-ok"></span>  														  
														</button>
													<a style="margin-top:2px;" class="btn btn-danger" href="inventory.php?products"><span class="glyphicon glyphicon-remove"></span></a>
													</td>										
								 </tr>
								 </form>
								<?php 
								}
							?>		
							</tbody>
							 </table>
							</div>							
						