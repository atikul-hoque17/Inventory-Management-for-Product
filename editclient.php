
<style>
	
 th{
font-size: 12px;
}	
 td{
font-size: 12px;
}
</style>
<br><br>

<?php
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
 ?>
							
								<?php 
								
								if(isset($_REQUEST["delvendor"])){
									$dltvenid = ($_REQUEST["delvendor"]);
									 if($dltvenid!=""){
										?>
										<div style="margin:auto;" class="container">
											  <table  style="margin:auto; width:400px;" class="table table-hover">
											  <h4 style="text-align:center;">Do You Want to Delet this Vendor ?</h4>
												<form action="process.php" method="POST">
												<thead>
												   <tr style="background-color:#fff;color:#fff;">
													<th style="text-align:center;">
														<input type="hidden" name="dltvenid" value="<?php echo $dltvenid; ?>" id="dltvendor">
														<button type="submit" name="dltvendor" class="btn btn-success">
														  <span style="color:#fff" class="glyphicon glyphicon-ok"></span>  														  
														</button>
														<a class="btn btn-danger" href="inventory.php?vendors"><span class="glyphicon glyphicon-remove"></span></a>
													</th>
												  </tr>
												</thead>
												</form>
										</tbody>
										 </table>
										</div>	
										<?php						
									}else{}	
								}
								
								
								?>

				

								<div class="container" style="width: 1000px;">
								  <table class="table table-hover">
								
								  <h4>Edit Client</h4>
									<thead>
									  <tr style="background-color:#1b629f;color:#fff;">
										<th>#</th>										
										<th>Sales.Code</th>
										<th>Customer Name</th>
										<th>Adress</th>
										<th>Email</th>
										<th>Phone No</th>
										<th>Action</th>
									  </tr>
									</thead>
									<tbody>	
							<?php
							
									
									$sql = ("select * from customers where id = $clientsvalue ");
									$result = mysqli_query($conn, $sql);
									//$rows = mysql_num_rows($result);

									while($post = mysqli_fetch_assoc($result)) {
											
											$customer_pro_id=$post["id"];				
											$salescode=$post["salescode"];		
											$customername=$post["customername"];				
											$customeradress=$post["customeradress"];						
											$customeremail=$post["customeremail"];
											$customerphone=$post["customerphone"];					
											
											?>	
											  <tr>
											 <form class="form-horizontal" action="process.php"  method="POST"> 
											 	
												<input type="hidden" name="customer_pro_id" value="<?php echo $customer_pro_id; ?>">
												<input type="hidden" name="rdlink" value="<?php echo $actual_link; ?>" id="usr">

												<td><?php echo $sl_no++; ?></td>								
													
												<td><input type="text" name="salescode" class="form-control" value="<?php echo $salescode; ?>" disabled></td>

												<td><input type="text" name="customername" class="form-control" value="<?php echo $customername; ?>" ></td>	

												<td><input type="text" name="customeradress" class="form-control" value="<?php echo $customeradress; ?>" id="vendorprice" ></td>	

												<td><input type="email" name="customeremail" class="form-control" value="<?php echo $customeremail; ?>" ></td>	

												<td><input type="number" name="customerphone" class="form-control" value="<?php echo $customerphone; ?>"  id="customerphone" ></td>	
													<td>
													
														<button type="submit" name="editclient" class="btn btn-success">
														  <span style="color:#fff" class="glyphicon glyphicon-ok"></span>  														  
														</button>
														<a style="margin-top:2px;" class="btn btn-danger" href="inventory.php?clients"><span class="glyphicon glyphicon-remove"></span></a>
													</td>	
													</td>	
												</form>									
											  </tr>
											<?php 
										}	
								
									?>	
									</tbody>
									</table>
									</div>
									<?php
									
									