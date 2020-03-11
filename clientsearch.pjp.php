<?php
error_reporting(0);
include("dbConfig.php");



if (isset($_REQUEST['searchclient']))
{
    extract($_REQUEST);
    $searchclient;
    $sql = ("select * from customers WHERE salescode LIKE '%$searchclient%' or customername LIKE '%$searchclient%' ");
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
                                        <th>Sales.Code</th>
                                        <th>Customer Name</th>
                                        <th>Adress</th>
                                        <th>Email</th>
                                        <th>Phone No</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody> 
                            <?php
                                     $sl_no=1;
                                   
                                    while($post = mysqli_fetch_assoc($result)) {
                                            
                                           $customer_pro_id=$post["id"];        
                                            $salescode=$post["salescode"];    
                                            $customername=$post["customername"];        
                                            $customeradress=$post["customeradress"];            
                                            $customeremail=$post["customeremail"];
                                            $customerphone=$post["customerphone"];                          
                                            
                                            ?>  
                                              <tr>
                                                  <td><?php echo $salescode; ?></td>  
                                                  <td><?php echo $customername; ?></td> 
                                                  <td><?php echo $customeradress; ?></td>
                                                  <td><?php echo $customeremail; ?></td>
                                                  <td><?php echo $customerphone; ?></td>
                                                  <td>
                                                    <a href='inventory.php?clients=<?php echo $customer_pro_id;?>'>
                                                       <span class="glyphicon glyphicon-edit"></span>
                                                    </a>
                                                    <a href="inventory.php?delvendor=<?php echo $customer_pro_id; ?>">
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