		
<?php

session_start();
error_reporting (1);

 
 if (isset($_REQUEST['addnewcategory']))
{
/*	echo "<pre>";
		print_r($_REQUEST);
	echo "</pre>";
*/	
	extract($_REQUEST);
	
	$sqladd="INSERT INTO category VALUES ('','$categoryname')";
	$result = mysqli_query($conn, $sqladd);			
			if($result){
							
				?>	
				<br><br>
				<div class="container">					  
					  <div class="alert alert-success alert-dismissable">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
						<strong>Success!</strong> You Category has been added successfully.
					  </div>
					</div>
				<?php							
				} else {
				echo "Invalid Data";
				}
				
	
}
 
 ?>


<style>
.panel-primary {
	border-color: #eaeaea;
}
</style>



			<br>

            <div class="panel panel-primary" style="width:750px;margin:5px auto 5px">
              <div class="panel-heading">Add Category</div>
              <div class="panel-body">


                <form action="inventory.php?addcategory" method="POST" data-toggle="validator" role="form">

                  <div class="form-group">
                      <label class="control-label" for="inputName">Category Name</label>
                      <input name='categoryname' class="form-control" data-minlength="2"data-error="Enter Machine Name.Minimum 4 Charecter" id="inputName" placeholder="Write Here Category Name"  type="text" required />
                      <div class="help-block with-errors"></div>
                  </div>
				  
                 
			      <div class="form-group">
                      <button name="addnewcategory"class="btn btn-primary" type="submit">
                          Submit
                      </button>
                  </div>
				  
                </form>


              </div>
            </div>
        </div>