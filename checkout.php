<?php
//session_start();
include "db.php";
include "header.php";
?>

<div class="content">
  <div class="container-fluid">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Checkout</h4>
          <p class="card-category">Complete your order details</p>
        </div>
        <div class="card-body">



          <form action="checkout_process.php" method="post" enctype="multipart/form-data">
            
            <div class="row">
              <div class="col-md-6">
                <div class="form-group bmd-form-group">
                  <label class="bmd-label-floating">First Name</label>
                  <input type="text" name="firstname" class="form-control" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group bmd-form-group">
                  <label class="bmd-label-floating">Email</label>
                  <input type="email" name="email" class="form-control" required>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-12">
                <div class="form-group bmd-form-group">
                  <label class="bmd-label-floating">Address</label>
                  <input type="text" name="address" class="form-control" required>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-4">
                <div class="form-group bmd-form-group">
                  <label class="bmd-label-floating">City</label>
                  <input type="text" name="city" class="form-control" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group bmd-form-group">
                  <label class="bmd-label-floating">State</label>
                  <input type="text" name="state" class="form-control" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group bmd-form-group">
                  <label class="bmd-label-floating">Zip</label>
                  <input type="text" name="zip" class="form-control" required>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-6">
                <div class="form-group bmd-form-group">
                  <label class="bmd-label-floating">Cardholder Name</label>
                  <input type="text" name="cardname" class="form-control" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group bmd-form-group">
                  <label class="bmd-label-floating">Card Number</label>
                  <input type="text" name="cardNumber" class="form-control" required>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-6">
                <div class="form-group bmd-form-group">
                  <label class="bmd-label-floating">Expiry Date</label>
                  <input type="text" name="expdate" class="form-control" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group bmd-form-group">
                  <label class="bmd-label-floating">CVV</label>
                  <input type="text" name="cvv" class="form-control" required>
                </div>
              </div>
            </div>

            <div class="row">
              <!-- 🔹 Added Payment Method -->
              <div class="col-md-12">
                <div class="form-group bmd-form-group">
                  <label class="bmd-label-floating">Payment Method</label>
                  <select name="payment_method" id="payment_method" class="form-control" required>
                    <option value="" disabled selected>-- Select Payment Method --</option>
                    <option value="Cash on Delivery">Cash on Delivery</option>
                    <option value="GCash">GCash</option>
                    <option value="Bank Transfer">Bank Transfer</option>
                    <option value="Credit/Debit Card">Credit/Debit Card</option>
                  </select>
                </div>
              </div>

              <!-- 🔹 Added Delivery Method -->
              <div class="col-md-12">
                <div class="form-group bmd-form-group">
                  <label class="bmd-label-floating">Delivery Method</label>
                  <select name="delivery_method" id="delivery_method" class="form-control" required>
                    <option value="" disabled selected>-- Select Delivery Method --</option>
                    <option value="Delivery">Deliver</option>
                    <option value="Pick-up">Pick-up</option>
                  </select>
                </div>
              </div>

            </div>
            
            <button type="submit" class="btn btn-fill btn-primary pull-right">Place Order</button>
            <div class="clearfix"></div>

          </form>


        </div>
      </div>
    </div>
  </div>
</div>

<?php include "footer.php"; ?>
