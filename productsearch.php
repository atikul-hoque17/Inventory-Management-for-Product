<?php
error_reporting(0);
include("dbConfig.php");



if (isset($_REQUEST['searchproduct']))
{
    extract($_REQUEST);
    $searchproduct;
    $sql = ("select * from items WHERE productcode LIKE '%$searchproduct%' or name LIKE '%$searchproduct%' ");
                                    $result = mysqli_query($conn, $sql);
                                     $rows = mysqli_num_rows($result);
}




                            if($rows >0){
                            ?>
                                
                             <div class="container">
                  <table class="table table-hover">
                  <h4>All Product</h4>
                  <thead>
                    <tr style="background-color:#1b629f;color:#fff;">
                    <th>#</th>
                    <th>Image</th>
                    <th>Pro.Code</th>
                    <th>Pro.Name</th>
                    <th>Ven.Name</th>
                    <th>Ven. Price</th>
                    <th>Ret. Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>V.Pay Amount</th>   
                    <th>Due</th>                
                    <th>Purchase</th>
                    <th>Last Pay</th>
                    <th>Available Pro.</th>
                    <th>Action</th>
                    </tr>
                  </thead>
                  <tbody> 
                              <?php
                              
                                  $sl_no=1;
                                  //$rows = mysql_num_rows($result);

                                  while($post = mysqli_fetch_assoc($result)) {
                                      
                                     $pro_id=$post["id"];       
                                      $productname=$post["name"];   
                                      $productcode=$post["productcode"];        
                                      $vendorprice=$post["vendorprice"];            
                                      $rtlprice=$post["rtlprice"];
                                      $quantity=$post["quantity"];
                                      $totalprice=$post["totalprice"];
                                      $payamount=$post["payamount"];
                                      $vendorname=$post["vendorname"];
                                      $purchasedate=$post["purchasedate"];
                                      $lastpaydate=$post["lastpaydate"];
                                      $images=$post["image"];
                                      $status=$post["status"];
                                      ?>  
                                        <tr>
                                         <td><?php echo $sl_no++; ?></td>                         
                          <td><img  src="images/<?php echo $images;?>" width="50" height="50"> </td>
                          <td><?php echo $productcode; ?></td>  
                          <td><?php echo $productname; ?></td>  
                          <td><?php echo $vendorname; ?></td>
                          <td><?php echo $vendorprice; ?></td>
                          <td><?php echo $rtlprice; ?></td>
                          <td><?php echo $quantity; ?></td>
                          <td><?php echo $totalprice; ?></td>
                          <td><?php echo $payamount; ?></td>    
                          <td><?php echo $totalprice- $payamount; ?></td>
                          <td><?php echo $purchasedate; ?></td>   
                          <td><?php echo $lastpaydate; ?></td>    
                          <td><?php echo $quantity-$status; ?></td>
                                          <td>
                                              <div  class="dropdown">
                                                  <button style="width: 100px;"class="dropbtn">Action</button>
                                                  <div style="width: 100px;" class="dropdown-content">

                                                <a style="width: 100px;background-color: green;" href='inventory.php?editproduct=<?php echo $pro_id;?>'>
                                                Edit <span class="glyphicon glyphicon-edit"></span>
                                                </a>

                                                  <a style="width: 100px;background-color: orange;" href='inventory.php?products=<?php echo $pro_id;?>'>
                                                Pay <span class="glyphicon glyphicon-edit"></span>
                                                </a>

                                                    <a style="width: 100px;background-color: red;" href="inventory.php?del=<?php echo $pro_id; ?>">
                                                Delete   <span class="glyphicon glyphicon-remove"></span>
                                                </a>

                                                  </div>
                                                </div>                            
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