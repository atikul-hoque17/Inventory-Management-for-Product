


<style>
	
 th{
font-size: 12px;
}	
 td{
font-size: 12px;
}

</style>
<br><br>


							<div class="srachdiv" style="width: 700px;margin: auto; padding: 10px">
								  <table class="table table-hover">
									<thead>
									 	<form action=""> 
									Search Category : <input type="text" id="txt1" onkeyup="showHint(this.value)">
									<p style="color: red">*search by category name</p>
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
						  xhttp.open("GET", "categorysearch.php?searchcategory="+str, true);
						  xhttp.send();   
						}
						</script>



								<?php 
								
								if(isset($_REQUEST["delcategory"])){
									$delcategory = ($_REQUEST["delcategory"]);
									 if($delcategory!=""){
										?>
										<div style="margin:auto;" class="container">
											  <table  style="margin:auto; width:400px;" class="table table-hover">
											  <h4 style="text-align:center;">Do You Want to Delet this Category ?</h4>
												<form action="process.php" method="POST">
												<thead>
												   <tr style="background-color:#fff;color:#fff;">
													<th style="text-align:center;">
														<input type="hidden" name="delcategoryid" value="<?php echo $delcategory; ?>" id="dltvendor">
														<button type="submit" name="delcategory" class="btn btn-success">
														  <span style="color:#fff" class="glyphicon glyphicon-ok"></span>  														  
														</button>
														<a class="btn btn-danger" href="inventory.php?category"><span class="glyphicon glyphicon-remove"></span></a>
													</th>
												  </tr>
												</thead>
												</form>
										</tbody>
										 </table>
										</div>	
										<br>
										<?php						
									}else{}	
								}
									else {}
								
								?>

				
						





							<?php
							
									$perpage = 20;

									if(isset($_REQUEST["client_page"])){
									$page = intval($_REQUEST["client_page"]);
									}
									else {
									$page = 1;
									}
									$calc = $perpage * $page;
									$start = $calc - $perpage;
									$sl_no=1;
									$sql = ("select * from category ORDER BY id DESC Limit $start, $perpage");
									$result = mysqli_query($conn, $sql);
									//$rows = mysql_num_rows($result);
									$rows = mysqli_num_rows($result);
									if($rows >0){


										?>
										<div class="container" style="width: 100%;">
										  <table class="table table-hover">
										  <h4>Client List</h4>
											<thead>
											  <tr style="background-color:#1b629f;color:#fff;">
												<th>#</th>
												<th>Cat.Name</th>										
												<th>Action</th>
											  </tr>
											</thead>
											<tbody>	
										<?php



										while($post = mysqli_fetch_assoc($result)) {
											
											$categoryid=$post["id"];				
											$categoryname=$post["categoryname"];				
											
											?>	
											  <tr>
													<td><?php echo $sl_no++; ?></td>	        										<td><?php echo $categoryname; ?></td>	
													<td>
														<a href='inventory.php?category=<?php echo $categoryid;?>'>
															 <span class="glyphicon glyphicon-edit"></span>
														</a>
														<a href="inventory.php?delcategory=<?php echo $categoryid; ?>">
															 <span class="glyphicon glyphicon-remove"></span>
														</a>
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

									$sqlpage = ("select Count(*) As Total from category");
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
													
													<li><a href='inventory.php?client_page=<?php echo $j;?>'>Previous</a></li>					
											
													<?php
									}

									for($i=1; $i <= $totalPages; $i++)

									{

									if($i<>$page)

									{

													?>
													
									<li><a href='inventory.php?client_page=<?php echo $i;?>'><?php echo $i; ?></a></li>					
												
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
													
									<li><a href='inventory.php?client_page=<?php echo $j;?>'>Next</a></li>					
												
													<?php
									}

									}

									?>
									</ul>
									<?php




									}else{

									?>	
									<br><br>
														  
										  <div style="width: 500px;margin: auto" class="alert alert-danger alert-dismissable">
											<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
											<strong>Warning!</strong> You have no Customer to display.
										  </div><br>
								
									<?php	

									}


							?>
					

						










								