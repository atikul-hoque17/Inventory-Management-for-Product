
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
								
								if(isset($_REQUEST["del"])){
									$dlt = ($_REQUEST["del"]);
									 if($dlt!=""){
										?>
										<div style="margin:auto;" class="container">
											  <table  style="margin:auto; width:400px;" class="table table-hover">
											  <h4 style="text-align:center;">Do You Want to Delet this Product ?</h4>
												<form action="process.php" method="POST">
												<thead>
												   <tr style="background-color:#fff;color:#fff;">
													<th style="text-align:center;">
														<input type="hidden" name="del_id" value="<?php echo $dlt; ?>" id="dlt">
														<button type="submit" name="del" class="btn btn-success">
														  <span style="color:#fff" class="glyphicon glyphicon-ok"></span>  														  
														</button>
														<a class="btn btn-danger" href="inventory.php?products"><span class="glyphicon glyphicon-remove"></span></a>
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
									else {}
								
								?>

				
						<div class="container" style="width: 1000px;">
								  <table class="table table-hover">
									<thead>
									 	<form action=""> 
									Search Customer : <input type="text" id="txt1" onkeyup="showHint(this.value)">
									<p style="color: red">*search by salescode </p>
									</form>

									<p> <span id="txtHint"></span></p> 
									</thead>
												
						</div>




					

						<script>
						function showHint(str) {
						  var xhttp;
						  if (str.length == 0) { 
						    document.getElementById("txtHint").innerHTML = "";
						    return;
						  }
						  xhttp = new XMLHttpRequest();
						  xhttp.onreadystatechange = function() {
						    if (this.readyState == 4 && this.status == 200) {
						      document.getElementById("txtHint").innerHTML = this.responseText;
						    }
						  };
						  xhttp.open("GET", "salesearch.php?searchsale="+str, true);
						  xhttp.send();   
						}
						</script>







								
							<?php
							
									$perpage = 20;

									if(isset($_REQUEST["sales_page"])){
									$page = intval($_REQUEST["sales_page"]);
									}
									else {
									$page = 1;
									}
									$calc = $perpage * $page;
									$start = $calc - $perpage;
									$sl_no=1;
									$sql = ("select * from salesitem ORDER BY id DESC Limit $start, $perpage");
									$result = mysqli_query($conn, $sql);
									$rows = mysqli_num_rows($result);
									if($rows >0){

										?>

										<div class="container" >
										  <table class="table table-hover">
										  <h4> Sales List </h4>
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
									



									while($post = mysqli_fetch_assoc($result)) {
											
											$salesid=$post["id"];	
											$salescode=$post["salescode"];			
											$product_id=$post["product_code"];		
											$saleprice=$post["saleprice"];			
											$salequantity=$post["salequantity"];			
											$s_total=$post["s_total"];			
											$s_payamount=$post["s_payamount"];
											$s_due=$post["s_due"];
											$saledate=$post["saledate"];
											$s_status=$post["s_status"];
											
											?>	
											  <tr>
											  	<form class="form-horizontal" action="process.php"  method="POST"> 

												<input type="hidden" name="salescode" value="<?php echo $salescode; ?>">
												<input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
												<input type="hidden" name="saleprice" value="<?php echo $saleprice; ?>">
												<input type="hidden" name="salequantity" value="<?php echo $salequantity; ?>">
												<input type="hidden" name="s_total" value="<?php echo $s_total; ?>">
												<input type="hidden" name="s_payamount" value="<?php echo $s_payamount; ?>">
												<input type="hidden" name="saledate" value="<?php echo $saledate; ?>">
												

												<td><?php echo $sl_no++; ?></td>													   <td><?php echo $salescode; ?></td>	
												<td>

												<?php 
												 $product_id; 

												$sqlidselect = ("select * from items where productcode ='$product_id'");
													$resultsqlidselect = mysqli_query($conn, $sqlidselect);
													while($post = mysqli_fetch_assoc($resultsqlidselect)) {
													
														$productimage=$post["image"];
														?>
															<img  src="images/<?php echo $productimage;?>" width="50" height="50">
														<?php 
													echo		$productname=$post["name"];												
														
													}

												?>
													
												</td>	    
												<td><?php echo $saleprice; ?></td>	
												<td><?php echo $salequantity ?></td>	    	    								   <td><?php echo $s_total; ?></td>	
												<td><?php echo $s_payamount; ?></td>    											   <td><?php echo $s_due; ?></td>														  <td><?php echo $saledate; ?></td>													

													<td>
														<button type="submit" name="deleverydone" class="btn btn-success">
														 Delevery Done <span style="color:#fff" class="glyphicon glyphicon-ok"></span> 
														</button>
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
									
									?>									
									<ul class="pager">
									
									<?php

									if(isset($page))

									{

									$sqlpage = ("select Count(*) As Total from salesitem");
									$resultpage = mysqli_query($conn, $sqlpage);
									$rows = mysqli_num_rows($resultpage);

									if($rows)

									{

									$rs = mysqli_fetch_assoc($resultpage);

									$total = $rs["Total"];

									}

									$totalPages = ceil($total / $perpage);

									if($page <=1 ){

													?>
													
									<li class="disabled"><a style="background-color: #1b629f;color: #fff;border: 1px solid #2355bc;" href="">Previous</a></li>					
													
													<?php
									}

									else

									{

									$j = $page - 1;
													?>
													
									<li><a href='inventory.php?sales_page=<?php echo $j;?>'>Previous</a></li>					
											
													<?php
									}

									for($i=1; $i <= $totalPages; $i++)

									{

									if($i<>$page)

									{

													?>
													
									<li><a href='inventory.php?sales_page=<?php echo $i;?>'><?php echo $i; ?></a></li>					
												
													<?php
									}

									else

									{

													?>
													
									<li class="disabled"><a  style="background-color: #1b629f;color: #fff;border: 1px solid #2355bc;"href=''><?php echo $i; ?></a></li>					
													
													<?php
									}

									}

									if($page == $totalPages )

									{

													?>
													
									<li class="disabled"><a  style="background-color: #1b629f;color: #fff;border: 1px solid #2355bc;" href="">Next</a></li>					
													
													<?php
									}

									else

									{

									$j = $page + 1;

													?>
													
									<li><a href='inventory.php?sales_page=<?php echo $j;?>'>Next</a></li>					
												
													<?php
									}

									}

									?>
									</ul>

									<?php


									}else{
										
									?>	
									<br><br>
														  
										  <div class="alert alert-danger alert-dismissable">
											<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
											<strong>Warning!</strong> You have no Sale Item.
										  </div>
								
									<?php	


									}
							?>
									

									