<?php

if(isset($_REQUEST["searchitem"])){
	
	extract($_REQUEST);
	$search;

	}

?>


							<div class="container">
							  <table class="table">
								<tbody>
								  <tr style="background-color:#1b629f;color:#fff;">
									<td>Search Result for :<span class="label label-default"><?php echo $search ;?></span></td>
								  </tr>
								 </tbody>
							  </table>
							</div>
							
							<div class="container" style="margin-bottom: 100px;">
								  <table class="table table-hover">
									<thead>
									  <tr style="background-color:#1b629f;color:#fff;">
									<th>#</th>
										<th>Vendor Name</th>
										<th>Pro.Name</th>
										<th>Ven. Price</th>
										<th>Ret. Price</th>
										<th>Quantity</th>
										<th>Total Price</th>
										<th>Pay Amount</th>		
										<th>Due</th>								
										<th>Purchase</th>
										<th>Last Pay</th>
										<th>Satus</th>
										<th>Action</th>
									  </tr>
									</thead>
									<tbody>	
									
							<?php
							
								$sl_no=1;
								$sql=("SELECT * FROM items WHERE name LIKE '%$search%'");
								$result = mysqli_query($conn, $sql);
								$rows = mysql_num_rows($sql);

								
								while($post = mysqli_fetch_assoc($result)){
												
											$pro_id=$post["id"];				
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
								 <tr>
													<td><?php echo $sl_no++; ?></td>													
													<td><?php echo $vendorid; ?></td>													 <td><?php echo $productname; ?></td>	
													<td><?php echo $vendorprice; ?></td>
													<td><?php echo $rtlprice; ?></td>
													<td><?php echo $quantity; ?></td>
													<td><?php echo $totalprice; ?></td>
													<td><?php echo $payamount; ?></td>		
													<td>
													<?php echo $totalprice- $payamount; ?>
													</td>
													<td><?php echo $purchasedate; ?></td>		
													<td><?php echo $lastpaydate; ?></td>		
													<td><?php echo $status; ?></td>	


													<td>
															<div  class="dropdown">
														      <button style="width: 100px;"class="dropbtn">Add</button>
														      <div style="width: 100px;" class="dropdown-content">
																
																
														        <a style="width: 100px;background-color: orange;" href='inventory.php?products=<?php echo $pro_id;?>'>
																Pay <span class="glyphicon glyphicon-edit"></span>
																</a>
														        <a style="width: 100px;background-color: red;" href="inventory.php?del=<?php echo $pro_id; ?>">
																Delete	 <span class="glyphicon glyphicon-remove"></span>
																</a>

														      </div>
														    </div>														
													</td>								
								 </tr>
								<?php 
								}
							?>		
							</tbody>
							 </table>
							</div>
							