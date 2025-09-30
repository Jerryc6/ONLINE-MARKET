
    <?php
session_start();
include("../db.php");

error_reporting(0);
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$order_id=$_GET['order_id'];

/*this is delet query*/
mysqli_query($con,"delete from orders where order_id='$order_id'")or die("delete query is incorrect...");
} 

///pagination
$page=$_GET['page'];

if($page=="" || $page=="1")
{
$page1=0;	
}
else
{
$page1=($page*10)-10;	
}

include "s4.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Orders  / Page <?php echo $page;?> </h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary">
                      <tr><th>Customer Name</th><th>Products</th><th>Contact | Email</th><th>Address</th><th>Price</th><th>Quantity</th>
                    </tr></thead>
                    <tbody>
                      <?php 
                        $result=mysqli_query($con,"SELECT order_id, f_name, email, address, city, state, zip, 
                        product_id, qty, payment_method, delivery_method, p_status 
                        FROM orders 
                        LIMIT $page1,10") or die ("query incorrect....." . mysqli_error($con));

                          while($row = mysqli_fetch_array($result)) {	
                            $order_id   = $row['order_id'];
                            $cus_name   = $row['f_name'];
                            $email      = $row['email'];
                            $address    = $row['address'] . ", " . $row['city'] . ", " . $row['state'] . " - " . $row['zip'];
                            $product_id = $row['product_id'];
                            $quantity   = $row['qty'];
                            $payment    = $row['payment_method'];
                            $delivery   = $row['delivery_method'];
                            $status     = $row['p_status'];

                            echo "<tr>
                                    <td>$cus_name</td>
                                    <td>Product ID: $product_id</td>
                                    <td>$email</td>
                                    <td>$address</td>
                                    <td>$payment<br>$delivery</td>
                                    <td>$quantity</td>
                                    <td>$status</td>
                                    <td>
                                      <a class='btn btn-danger' href='orders.php?order_id=$order_id&action=delete'>Delete</a>
                                    </td>
                                  </tr>";
                          }
                        ?>
                    </tbody>
                  </table>
                  
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
      <?php
include "footer.php";
?>