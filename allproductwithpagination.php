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

				




						<div class="container" >
								  <table class="table table-hover">
									<thead>
									 	<form action=""> 
									Search Product : <input type="text" id="txt1" onkeyup="showHint(this.value)">
									<p style="color: red">*search by product code and product name</p>
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
						  xhttp.open("GET", "productsearch.php?searchproduct="+str, true);
						  xhttp.send();   
						}
						</script>







								<div class="container">
								  <table class="table table-hover">
								  <h4>All Product</h4>
									<thead>
									  <tr style="background-color:#1b629f;color:#fff;">
										<th>#</th>
										<th>Pro.Code</th>
										<th>Pro.Name</th>
										<th>Ven.Name</th>
										<th>Ven. Price</th>
										<th>Ret. Price</th>
										<th>Quantity</th>
										<th>Total Price</th>
										<th>V.Pay Amount</th>		
										<th>Due</th>								
										<th>Purchase</th>
										<th>Last Pay</th>
										<th>Available Pro.</th>
										<th>Action</th>
									  </tr>
									</thead>
									<tbody>	
							<?php
							
									$perpage = 20;

									if(isset($_REQUEST["product_page"])){
									$page = intval($_REQUEST["product_page"]);
									}
									else {
									$page = 1;
									}
									$calc = $perpage * $page;
									$start = $calc - $perpage;
									$sl_no=1;
									$sql = ("select * from items ORDER BY id DESC Limit $start, $perpage");
									$result = mysqli_query($conn, $sql);
									//$rows = mysql_num_rows($result);

									while($post = mysqli_fetch_assoc($result)) {
											
											$pro_id=$post["id"];				
											$productname=$post["name"];		
											$productcode=$post["productcode"];				
											$vendorprice=$post["vendorprice"];						
											$rtlprice=$post["rtlprice"];
											$quantity=$post["quantity"];
											$totalprice=$post["totalprice"];
											$payamount=$post["payamount"];
											$vendorname=$post["vendorname"];
											$purchasedate=$post["purchasedate"];
											$lastpaydate=$post["lastpaydate"];
											$status=$post["status"];
											?>	
											  <tr>
													<td><?php echo $sl_no++; ?></td>													
													
													<td><?php echo $productcode; ?></td>	
													<td><?php echo $productname; ?></td>	
													<td><?php echo $vendorname; ?></td>
													<td><?php echo $vendorprice; ?></td>
													<td><?php echo $rtlprice; ?></td>
													<td><?php echo $quantity; ?></td>
													<td><?php echo $totalprice; ?></td>
													<td><?php echo $payamount; ?></td>		
													<td><?php echo $totalprice- $payamount; ?></td>
													<td><?php echo $purchasedate; ?></td>		
													<td><?php echo $lastpaydate; ?></td>		
													<td><?php echo $quantity-$status; ?></td>	


													<td>
															<div  class="dropdown">
														      <button style="width: 100px;"class="dropbtn">Action</button>
														      <div style="width: 100px;" class="dropdown-content">

																<a style="width: 100px;background-color: green;" href='inventory.php?editproduct=<?php echo $pro_id;?>'>
																Edit <span class="glyphicon glyphicon-edit"></span>
																</a>

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
									<?php
									
									?>									
									<ul class="pager">
									
									<?php

									if(isset($page))

									{

									$sqlpage = ("select Count(*) As Total from items");
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
													
													<li class="disabled"><a style="background-color: #1b629f;
color: #fff;
border: 1px solid #2355bc;" href="">Previous</a></li>					
													
													<?php
									}

									else

									{

									$j = $page - 1;
													?>
													
													<li><a href='inventory.php?product_page=<?php echo $j;?>'>Previous</a></li>					
											
													<?php
									}

									for($i=1; $i <= $totalPages; $i++)

									{

									if($i<>$page)

									{

													?>
													
													<li><a href='inventory.php?product_page=<?php echo $i;?>'><?php echo $i; ?></a></li>					
												
													<?php
									}

									else

									{

													?>
													
													<li class="disabled"><a  style="background-color: #1b629f;
color: #fff;
border: 1px solid #2355bc;"href=''><?php echo $i; ?></a></li>					
													
													<?php
									}

									}

									if($page == $totalPages )

									{

													?>
													
													<li class="disabled"><a  style="background-color: #1b629f;
color: #fff;
border: 1px solid #2355bc;" href="">Next</a></li>					
													
													<?php
									}

									else

									{

									$j = $page + 1;

													?>
													
													<li><a href='inventory.php?product_page=<?php echo $j;?>'>Next</a></li>					
												
													<?php
									}

									}

									?>
									</ul>
									
							