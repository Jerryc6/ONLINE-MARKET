<?php
session_start();
include "db.php";

if (isset($_SESSION["uid"])) {

    $user_id    = $_SESSION["uid"];
    $f_name     = $_POST["firstname"];
    $email      = $_POST['email'];
    $address    = $_POST['address'];
    $city       = $_POST['city'];
    $state      = $_POST['state'];
    $zip        = $_POST['zip'];
    $cardname   = $_POST['cardname'];
    $cardnumber = $_POST['cardNumber'];
    $expdate    = $_POST['expdate'];
    $cvv        = $_POST['cvv'];
    $payment_method  = $_POST["payment_method"];
    $delivery_method = $_POST["delivery_method"];

    // Kunin lahat ng laman ng cart ng user
    $sql = "SELECT p_id, qty FROM cart WHERE user_id = '$user_id'";
    $query = mysqli_query($con, $sql);

    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            $product_id = $row['p_id'];
            $qty        = $row['qty'];
        
            // 🔹 Kunin current stock
            $stock_check = mysqli_query($con, "SELECT product_title, product_quantity FROM products WHERE product_id = '$product_id'");
            $stock_row   = mysqli_fetch_assoc($stock_check);
            $current_stock = $stock_row['product_quantity'];
            $product_name  = $stock_row['product_title'];
        
            if ($current_stock >= $qty) {
                //  May sapat na stock → tuloy ang order
                $sql_insert = "INSERT INTO orders 
                (user_id, product_id, qty, f_name, email, address, city, state, zip, 
                cardname, cardnumber, expdate, cvv, payment_method, delivery_method, p_status) 
                VALUES 
                ('$user_id', '$product_id', '$qty', '$f_name', '$email', '$address', 
                '$city', '$state', '$zip', '$cardname', '$cardnumber', '$expdate', '$cvv',
                '$payment_method', '$delivery_method', 'Completed')";
                mysqli_query($con, $sql_insert) or die(mysqli_error($con));
        
                //  Update stock
                $update_stock = "UPDATE products 
                                 SET product_quantity = product_quantity - $qty 
                                 WHERE product_id = '$product_id'";
                mysqli_query($con, $update_stock) or die("Stock update failed: " . mysqli_error($con));
            } else {
                //  Kulang stock → ipakita alert + redirect sa cart
                echo "<script>
                        alert('Sorry, insufficient stock for $product_name. Available: $current_stock, Ordered: $qty');
                        window.location.href='cart.php';
                      </script>";
                exit();
            }
        }
        
        // Clear cart after order placed
        mysqli_query($con, "DELETE FROM cart WHERE user_id = '$user_id'");

        echo "<script>alert('Order placed successfully!'); window.location.href='store.php';</script>";
    } else {
        echo "<script>alert('Your cart is empty.'); window.location.href='store.php';</script>";
    }

} else {
    header("location:index.php");
}
?>
