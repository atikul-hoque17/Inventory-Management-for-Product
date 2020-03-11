				<?php
						if(isset($_REQUEST['vendors'])){
							$editvendor=$_REQUEST['vendors'];
							if($editvendor!=""){
								include('editvendor.php');						
							}else{}	
						}
						
						include('allvendorsmain.php');	
				?>
				