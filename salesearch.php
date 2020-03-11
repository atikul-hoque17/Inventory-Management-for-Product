<?php
error_reporting(0);
include("dbConfig.php");



if (isset($_REQUEST['searchsale']))
{
    extract($_REQUEST);
    $searchsale;
    $sql = ("select * from salesitem WHERE salescode LIKE '%$searchsale%' ");
                                    $result = mysqli_query($conn, $sql);
                                     $rows = mysqli_num_rows($result);
}



                            if($rows >0){
                            ?>
<div class="container" style="width: 980px">
                      <table class="table table-hover">
                      <h4> Sales List </h4>
                      <thead>
                        <tr style="background-color:#1b629f;color:#fff;">
                        <th>#</th>
                        <th>Sales Code</th>                   
                        <th>Pro.Name</th>
                        <th>S.Price</th>                    
                        <th>Quantity</th>
                        <th>G.Total</th>                    
                        <th>Payamount</th>
                        <th>Due</th>                    
                        <th>Date</th>               
                        <th>Action</th>
                        </tr>
                      </thead>
                      <tbody> 

                    <?php
                  



                  while($post = mysqli_fetch_assoc($result)) {
                      
                      $salesid=$post["id"]; 
                      $salescode=$post["salescode"];      
                      $product_id=$post["product_code"];    
                      $saleprice=$post["saleprice"];      
                      $salequantity=$post["salequantity"];      
                      $s_total=$post["s_total"];      
                      $s_payamount=$post["s_payamount"];
                      $s_due=$post["s_due"];
                      $saledate=$post["saledate"];
                      $s_status=$post["s_status"];
                      
                      ?>  
                        <tr>
                          <form class="form-horizontal" action="process.php"  method="POST"> 

                        <input type="hidden" name="salescode" value="<?php echo $salescode; ?>">
                        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                        <input type="hidden" name="saleprice" value="<?php echo $saleprice; ?>">
                        <input type="hidden" name="salequantity" value="<?php echo $salequantity; ?>">
                        <input type="hidden" name="s_total" value="<?php echo $s_total; ?>">
                        <input type="hidden" name="s_payamount" value="<?php echo $s_payamount; ?>">
                        <input type="hidden" name="saledate" value="<?php echo $saledate; ?>">
                        

                        <td><?php echo $sl_no++; ?></td>                             <td><?php echo $salescode; ?></td> 
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
                          echo    $productname=$post["name"];                       
                            
                          }

                        ?>
                          
                        </td>     
                        <td><?php echo $saleprice; ?></td>  
                        <td><?php echo $salequantity ?></td>                               <td><?php echo $s_total; ?></td> 
                        <td><?php echo $s_payamount; ?></td>                             <td><?php echo $s_due; ?></td>                             <td><?php echo $saledate; ?></td>                         

                          <td>
                            <button type="submit" name="deleverydone" class="btn btn-success">
                             Delevery Done <span style="color:#fff" class="glyphicon glyphicon-ok"></span> 
                            </button>
                          </td>   
                        </form>               
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