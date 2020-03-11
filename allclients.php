				<?php
						if(isset($_REQUEST['clients'])){
							$clientsvalue=$_REQUEST['clients'];
							if($clientsvalue!=""){
								include('editclient.php');						
							}else{}	
						}

												
						if(isset($_REQUEST['search'])){
							extract($_REQUEST);
							$search;							
							include('search.php');		
						}					
						else{
							include('clients.php');													
							}
				?>
				