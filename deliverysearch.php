<?php
error_reporting(0);
include("dbConfig.php");



if (isset($_REQUEST['searchdelevery']))
{
    extract($_REQUEST);
    $searchdelevery;
    $sql = ("select * from deleveryinfo WHERE   salescode LIKE '%$searchdelevery%' ");
                                    $result = mysqli_query($conn, $sql);
                                     $rows = mysqli_num_rows($result);
}




                            if($rows >0){
                            ?>
                                
<div class="container" style="width: 980px">
                  <table class="table table-hover">
                  <h4>Delevery List</h4>
                  <thead>
                    <tr style="background-color:#1b629f;color:#fff;">
                    <th>#</th>                    
                    <th>Sales Code</th>                   
                    <th>Pro.Name</th>
                    <th>S.Price</th>                    
                    <th>Quantity</th>
                    <th>G.Total</th>                    
                    <th>Payamount</th>                
                    <th>Date</th> 
                    <th>Action</th>   
                    </tr>
                  </thead>
                  <tbody> 
                    <?php
                      

                      while($post = mysqli_fetch_assoc($result)) {
                      
                      $delevery_id=$post["id"];       
                      $salescode=$post["salescode"];      
                      $product_id=$post["product_id"];    
                      $saleprice=$post["saleprice"];      
                      $salequantity=$post["salequantity"];      
                      $s_total=$post["s_total"];      
                      $s_payamount=$post["s_payamount"];
                      $saledate=$post["saledate"];
                      ?>  
                        <tr>
                          <td><?php echo $sl_no++; ?></td>  
                          <td><?php echo $salescode; ?></td>  
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
                          <td><?php echo $salequantity; ?></td>
                          <td><?php echo $s_total; ?></td>
                          <td><?php echo $s_payamount; ?></td>
                          <td><?php echo $saledate; ?></td> 
                          <td>
                          
                          <a href="inventory.php?produtinfo=<?php echo $salescode; ?>" class="btn btn-info" role="button">Print</a>     
                            
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


/*$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= "<br> $name";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values
//echo $hint === "" ? "no suggestion" :."<a>done</a>". $hint;
if($hint === ""){
	echo "no result";
}else{
	?>
	

  <table class="table">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
    </tbody>
  </table>





	<?php
    */

 ?>