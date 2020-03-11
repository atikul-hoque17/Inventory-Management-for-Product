
					
<br><br>

<?php
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
 ?>
							<div class="container" style="width: 700px;">
								  <table class="table table-hover">
								  <h4>Edit Category </h4>
									<thead>
									   <tr style="background-color:#1b629f;color:#fff;">
										<th>Cate.Name</th>										
										<th>Action</th>
									  </tr>
									</thead>
									<tbody>	
									
							<?php
							
								$sl_no=1;
								$sql=("SELECT * FROM category WHERE id = '$editcategory'");
								$result = mysqli_query($conn, $sql);
								$rows = mysqli_num_rows($sql);

								
								while($post = mysqli_fetch_assoc($result)){
												
											$categoryid=$post["id"];				
											$categoryname=$post["categoryname"];						
											
								
								?>
								<form action="process.php" method="post">
								 <tr>
													
													<input type="hidden" name="categoryid" value="<?php echo $categoryid; ?>" id="usr">
													<input type="hidden" name="rdlink" value="<?php echo $actual_link; ?>" id="usr">
												
													
													<td><input type="text" name="categoryname" class="form-control" value="<?php echo $categoryname; ?>"></td>	


													<td style="width: 80px;">
														<button type="submit" name="editcategory" class="btn btn-success">
														  <span style="color:#fff" class="glyphicon glyphicon-ok"></span>  														  
														</button>
													<a style="margin-top:2px;" class="btn btn-danger" href="inventory.php?category"><span class="glyphicon glyphicon-remove"></span></a>
													</td>										
								 </tr>
								 </form>
								<?php 
								}
							?>		
							</tbody>
							 </table>
							</div>							
						