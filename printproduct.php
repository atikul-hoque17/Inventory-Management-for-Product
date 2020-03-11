

<style>
	
 th{
font-size: 12px;
}	
 td{
font-size: 12px;
}
</style>

				<?php
						if(isset($_REQUEST['produtinfo'])){
							 $salescode=$_REQUEST['produtinfo'];
							
						}


		$sqlproductinfo = ("select * from deleveryinfo where salescode = '$salescode'");
		$sqlproductinforesult = mysqli_query($conn, $sqlproductinfo);
		//$rows = mysql_num_rows($result);
			while($post = mysqli_fetch_assoc($sqlproductinforesult)) {
											$delevery_id=$post["id"];				
											$salescode=$post["salescode"];			
											$product_id=$post["product_id"];		
											$saleprice=$post["saleprice"];			
											$salequantity=$post["salequantity"];			
											$s_total=$post["s_total"];			
											$s_payamount=$post["s_payamount"];
											$saledate=$post["saledate"];
				}
		 

		$sqlcustomerinfo = ("select * from customers where salescode = '$salescode'");
		$sqlcustomerinforesult = mysqli_query($conn, $sqlcustomerinfo);
		//$rows = mysql_num_rows($result);
			while($post = mysqli_fetch_assoc($sqlcustomerinforesult)) {
											$customer_pro_id=$post["id"];				
											$salescode=$post["salescode"];		
											$customername=$post["customername"];				
											$customeradress=$post["customeradress"];						
											$customeremail=$post["customeremail"];
											$customerphone=$post["customerphone"];
				}


				?>
				
								

<br><br>




<script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=auto,height=auto');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>




<div id="divToPrint" style="background-color: #eceaea;padding: 10px;" >


								<div class="container" style="width: 1000px;">
								  <table class="table table-bordered">
									
									<tbody>	
							
											  <tr>
										<td>Hi , <strong><?php echo $customername ;?></strong>	<br>
											<p>Thank you for purchasing from kiddy buddy.<br>

									
											  </tr>
											  
										
									</tbody>
									</table>
								</div>









								<div class="container" style="width: 1000px;">
								  <table class="table table-bordered">
								  <h4>Sellin Info </h4>
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
									  </tr>
									</thead>
									<tbody>	
							
											  <tr>
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
												<td><?php echo $s_payamount; ?></td> 												  <td><?php echo $saledate; ?></td>													
									
											  </tr>
										
									</tbody>
									</table>
									</div>



								<div class="container" style="width: 1000px;">
								  <table class="table table-bordered">
								  <h4>Customer Details </h4>
									<thead>
									  <tr style="background-color:#1b629f;color:#fff;">
											<th>#</th>										
												<th>Sales.Code</th>
												<th>Customer Name</th>
												<th>Adress</th>
												<th>Email</th>
												<th>Phone No</th>
									  </tr>
									</thead>
									<tbody>	
							
											  <tr>
											  	<td><?php echo $sl_no++; ?></td>								
													
													<td><?php echo $salescode; ?></td>	
													<td><?php echo $customername; ?></td>	
													<td><?php echo $customeradress; ?></td>
													<td><?php echo $customeremail; ?></td>
													<td><?php echo $customerphone; ?></td>
													
											  </tr>
										
									</tbody>
									</table>
									</div>
<br><br><br>

								<div class="container" style="width: 1000px;">
								  <table class="table table-bordered">
									
									<tbody>	
							
										
											  <td>
											  Be Happy and Always sstay with Kiddy Buddy </p>										
									
											  </tr>
										
									</tbody>
									</table>
								</div>



					</div>				

								<div class="container" style="width: 1000px;">
								  <table class="table table-hover">
									<thead>
									  <tr >
									  	<td>
													
													
										  <input class="btn btn-info" role type="button" value="print" onclick="PrintDiv();" />				
													</td>	
										
									  </tr>
									</thead>
									
									</table>
									</div>

