				<?php
						if(isset($_REQUEST['category'])){
							$editcategory=$_REQUEST['category'];
							if($editcategory!=""){
								include('editcategory.php');						
							}else{}	
						}
						
						include('allcategorymain.php');	
				?>
				