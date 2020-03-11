
									
							<?php
							
								echo $value ;
								
								?>	
								

<br><br>

<?php
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
 ?>
							<div class="container" style="width: 700px;">
								  <table class="table table-hover">
								  <h4>Edit Vendor </h4>
									<thead>
									   <tr style="background-color:#1b629f;color:#fff;">
										<th>Pro.Name</th>										
										<th>Action</th>
									  </tr>
									</thead>
									<tbody>	
									
							<?php
							
								$sl_no=1;
								$sql=("SELECT * FROM vendor WHERE id = '$editvendor'");
								$result = mysqli_query($conn, $sql);
								$rows = mysqli_num_rows($sql);

								
								while($post = mysqli_fetch_assoc($result)){
												
											$vendor_id=$post["id"];				
											$vendorname=$post["vendorname"];						
											
								
								?>
								<form action="process.php" method="post">
								 <tr>
													
													<input type="hidden" name="vendor_id" value="<?php echo $vendor_id; ?>" id="usr">
													<input type="hidden" name="rdlink" value="<?php echo $actual_link; ?>" id="usr">
												
													
													<td><input type="text" name="vendorname" class="form-control" value="<?php echo $vendorname; ?>"></td>	


													<td style="width: 80px;">
														<button type="submit" name="editvendor" class="btn btn-success">
														  <span style="color:#fff" class="glyphicon glyphicon-ok"></span>  														  
														</button>
													<a style="margin-top:2px;" class="btn btn-danger" href="inventory.php?vendors"><span class="glyphicon glyphicon-remove"></span></a>
													</td>										
								 </tr>
								 </form>
								<?php 
								}
							?>		
							</tbody>
							 </table>
							</div>							
						