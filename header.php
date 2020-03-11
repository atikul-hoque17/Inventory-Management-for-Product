<style>
.navbar {
	border-radius: 0px;
}
.navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 14px;
}
.dropbtn {
  background-color: #31495d;
  color: white;
  padding: 14px 10px 8px 5px;
  font-size: 14px;
  border: none;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
  color: white;
  padding: 5px 10px;
  text-decoration: none;
  display: block;
  width: 150px;
background-color: #227875;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #fbfbfb;
  color: #e45900;
}
.dropdown:hover .dropdown-content {
    display: block;
}

</style>




<div class="navbar">
  
 <a href="inventory.php">  <p>Hi <strong style="color: #e45900;">kiddy buddy</strong></p></a>

    <div class="dropdown">
      <button class="dropbtn">Add New</button>
      <div class="dropdown-content">
       <a href="inventory.php?addvendor"> Vendor</a>
       <a href="inventory.php?addcategory"> Category</a>
       <a href="inventory.php?additems"> Items</a>
       <a href="inventory.php?addvoucher"> Voucher</a>
      </div>
    </div>

  <a href="inventory.php?vendors">Vendor List</a>
  <a href="inventory.php?category">Category List</a>
  <a href="inventory.php?products">Product List</a>
  <a href="inventory.php?sales">Sale List</a>
  <a href="inventory.php?deliverylist ">Delivery List</a>
  <a href="inventory.php?clients">Customer List</a>
  <a class="button" style="float:right;" href="inventory.php?logout=yes">Logout</a>  
   
      
</div>