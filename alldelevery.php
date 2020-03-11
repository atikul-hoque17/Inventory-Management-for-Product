<style>
.dropbtn {
  background-color: #31495d;
  color: white;
  padding: 14px 10px 8px 5px;
  font-size: 14px;
  border: none;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
  color: white;
  padding: 5px 10px;
  text-decoration: none;
  display: block;
  width: 150px;
  background-color: #227875;
  text-align: left;
}
.dropdown-content a:hover {
  background-color: #fbfbfb;
  color: #e45900;
}
.dropdown:hover .dropdown-content {
    display: block;
}

.mainbody {
	margin-top: 30px;
	width: 100% height:500px;
	background-color: #fff;
	overflow: hidden;
	padding-bottom: 30px;
}
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
									Search Vendor : <input type="text" id="txt1" onkeyup="showHint(this.value)">
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
						  xhttp.open("GET", "deliverysearch.php?searchdelevery="+str, true);
						  xhttp.send();   
						}
						</script>

				

								
							<?php
							
									$perpage = 20;

									if(isset($_REQUEST["delivery_page"])){
									$page = intval($_REQUEST["delivery_page"]);
									}
									else {
									$page = 1;
									}
									$calc = $perpage * $page;
									$start = $calc - $perpage;
									$sl_no=1;
									$sql = ("select * from deleveryinfo ORDER BY id DESC Limit $start, $perpage ");
									$result = mysqli_query($conn, $sql);
									//$rows = mysql_num_rows($result);

									$rows = mysqli_num_rows($result);
									if($rows >0){

										?>
								<div class="container">
								  <table class="table table-hover">
								  <h4>Delevery List</h4>
									<thead>
									  <tr style="background-color:#1b629f;color:#fff;">
										<th>#</th>										
										<th>Sales Code</th>										
										<th>Pro.Name</th>
										<th>S.Price</th>										
										<th>Quantity</th>
										<th>G.Total</th>										
										<th>Payamount</th>								
										<th>Date</th>	
										<th>Action</th>		
									  </tr>
									</thead>
									<tbody>	
										<?php
											

											while($post = mysqli_fetch_assoc($result)) {
											
											$delevery_id=$post["id"];				
											$salescode=$post["salescode"];			
											$product_id=$post["product_id"];		
											$saleprice=$post["saleprice"];			
											$salequantity=$post["salequantity"];			
											$s_total=$post["s_total"];			
											$s_payamount=$post["s_payamount"];
											$saledate=$post["saledate"];
											?>	
											  <tr>
													<td><?php echo $sl_no++; ?></td>	
													<td><?php echo $salescode; ?></td>	
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
													<td><?php echo $salequantity; ?></td>
													<td><?php echo $s_total; ?></td>
													<td><?php echo $s_payamount; ?></td>
													<td><?php echo $saledate; ?></td>	
													<td>
													
													<a href="inventory.php?produtinfo=<?php echo $salescode; ?>" class="btn btn-info" role="button">Print</a>			
														
													</td>		
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

									$sqlpage = ("select Count(*) As Total from deleveryinfo");
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
													
									<li><a href='inventory.php?delivery_page=<?php echo $j;?>'>Previous</a></li>					
											
													<?php
									}

									for($i=1; $i <= $totalPages; $i++)

									{

									if($i<>$page)

									{

													?>
													
									<li><a href='inventory.php?delivery_page=<?php echo $i;?>'><?php echo $i; ?></a></li>					
												
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
													
									<li><a href='inventory.php?delivery_page=<?php echo $j;?>'>Next</a></li>					
												
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
											<strong>Warning!</strong> You have no  Item to Delevery.
										  </div>
								
									<?php	

									}
							?>