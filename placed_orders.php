<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}
//The code includes the connect.php file, responsible for establishing a connection to the database.
//It starts a session using session_start().
//It retrieves the admin_id from the session. If it's not set (meaning the admin is not logged in), it redirects to the admin login page.

if(isset($_POST['update_payment'])){
   $order_id = $_POST['order_id'];
   $payment_status = $_POST['payment_status'];
   $payment_status = filter_var($payment_status, FILTER_SANITIZE_STRING);
   $update_payment = $conn->prepare("UPDATE `orders` SET payment_status = ? WHERE id = ?");
   $update_payment->execute([$payment_status, $order_id]);
   $message[] = 'payment status updated!';
}
//Checks if the form with the name update_payment is submitted.
//Retrieves the order_id and payment_status from the form.
//Sanitizes the payment_status variable to prevent SQL injection.
//Prepares and executes a SQL query to update the payment status for the specified order ID.
//Adds a message to indicate that the payment status has been updated.

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_order = $conn->prepare("DELETE FROM `orders` WHERE id = ?");
   $delete_order->execute([$delete_id]);
   header('location:placed_orders.php');
}
//Checks if the 'delete' parameter is set in the URL, usually triggered when the admin clicks the "delete" link for an order.
//Retrieves the order ID to be deleted from the URL.
//Prepares and executes a SQL query to delete the order with the specified ID from the 'orders' table.
//Redirects back to the 'placed_orders.php' page after deletion.

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>placed orders</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>
<!-- Starts the HTML document with appropriate meta tags and the title.
Includes the 'admin_header.php' file, which likely contains the common header elements for the admin section -->

<section class="orders">

<h1 class="heading">placed orders</h1>

<div class="box-container">

   <?php
      $select_orders = $conn->prepare("SELECT * FROM `orders`");
      $select_orders->execute();
      if($select_orders->rowCount() > 0){
         while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <p> placed on : <span><?= $fetch_orders['placed_on']; ?></span> </p>
      <p> name : <span><?= $fetch_orders['name']; ?></span> </p>
      <p> number : <span><?= $fetch_orders['number']; ?></span> </p>
      <p> address : <span><?= $fetch_orders['address']; ?></span> </p>
      <p> total products : <span><?= $fetch_orders['total_products']; ?></span> </p>
      <p> total price : <span>$<?= $fetch_orders['total_price']; ?>/-</span> </p>
      <p> payment method : <span><?= $fetch_orders['method']; ?></span> </p>
      <form action="" method="post">
         <input type="hidden" name="order_id" value="<?= $fetch_orders['id']; ?>">
         <select name="payment_status" class="select">
            <option selected disabled><?= $fetch_orders['payment_status']; ?></option>
            <option value="pending">pending</option>
            <option value="canceled">canceled</option>
            <option value="completed">completed</option>
         </select>
      <div class="flex-btn">
         <input type="submit" value="update" class="option-btn" name="update_payment">
         <a href="placed_orders.php?delete=<?= $fetch_orders['id']; ?>" class="delete-btn" onclick="return confirm('delete this order?');">delete</a>
      </div>
      </form>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">no orders placed yet!</p>';
      }
      //Prepares and executes a SQL query to select all orders from the 'orders' table.
//Checks if there are orders available.
//If orders exist, it iterates through each order and displays its details in a box.
//If no orders, it displays a message indicating that there are no orders.

   ?>

</div>

</section>
<!-- Defines a section for displaying placed orders with a heading and a container for order boxes.
-->












<script src="../js/admin_script.js"></script>
   <!-- Includes a JavaScript file for additional functionality in the admin orders page.
Closes the HTML body and HTML document. -->
</body>
</html>