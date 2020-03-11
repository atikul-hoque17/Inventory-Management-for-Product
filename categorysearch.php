<?php
error_reporting(0);
include("dbConfig.php");



if (isset($_REQUEST['searchcategory']))
{
    extract($_REQUEST);
    $searchcategory;
    $sql = ("select * from category WHERE categoryname LIKE '%$searchcategory%' ");
                                    $result = mysqli_query($conn, $sql);
                                     $rows = mysqli_num_rows($result);
}



                            if($rows >0){
                            ?>
                                <div class="container" style="width: 680px;">
                                  <table class="table table-hover">
                                  <h4>Search Result</h4>
                                    <thead>
                                      <tr style="background-color:#1b629f;color:#fff;">
                                        <th>#</th>
                                        <th>Cat.Name</th>                                       
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody> 
                            <?php
                                     $sl_no=1;
                                   
                                    while($post = mysqli_fetch_assoc($result)) {
                                            
                                            $categoryid=$post["id"];              
                                            $categoryname=$post["categoryname"];                        
                                            
                                            ?>  
                                              <tr>
                                                    <td><?php echo $sl_no++; ?></td>                                                    <td><?php echo $categoryname; ?></td> 
                                                    

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
                                       }else{

                                ?>
                                    <br>      
                                    <div style="width: 500px" class="alert alert-danger alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                    <strong>Warning!</strong> No Result Found.
                                    </div>
                                <?php
                               }










 ?>