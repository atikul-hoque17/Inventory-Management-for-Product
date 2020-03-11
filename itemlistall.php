				<?php
						if(isset($_REQUEST['products'])){
							$value=$_REQUEST['products'];
							if($value!=""){
								include('edit.php');				
							}else{}
						}
		
						if(isset($_REQUEST['search'])){
							extract($_REQUEST);
							$search;							
							include('search.php');		
						}			
						else{
							include('allitems.php');													
							}
				?>
				