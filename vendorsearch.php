<?php
error_reporting(0);
include("dbConfig.php");



if (isset($_REQUEST['searchvendor']))
{
    extract($_REQUEST);
    $searchvendor;
    $sql = ("select * from vendor WHERE vendorname LIKE '%$searchvendor%' ");
                                    $result = mysqli_query($conn, $sql);
                                     $rows = mysqli_num_rows($result);
}



                            if($rows >0){
                            ?>
                                <div class="container" style="width: 600px;">
                                  <table class="table table-hover">
                                  <h4>Search Result</h4>
                                    <thead>
                                      <tr style="background-color:#1b629f;color:#fff;">
                                        <th>#</th>
                                        <th>Ven.Name</th>                                       
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody> 
                            <?php
                                     $sl_no=1;
                                   
                                    while($post = mysqli_fetch_assoc($result)) {
                                            
                                            $vendorid=$post["id"];              
                                            $vendorname=$post["vendorname"];                        
                                            
                                            ?>  
                                              <tr>
                                                    <td><?php echo $sl_no++; ?></td>                                                    <td><?php echo $vendorname; ?></td> 
                                                    

                                                    <td>
                                                        <a href='inventory.php?vendors=<?php echo $vendorid;?>'>
                                                             <span class="glyphicon glyphicon-edit"></span>
                                                        </a>
                                                        <a href="inventory.php?delvendor=<?php echo $vendorid; ?>">
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