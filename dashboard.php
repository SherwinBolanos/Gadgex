<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}
//It includes the database connection file (connect.php).
//It starts a session.
//It checks if the admin is logged in. If not, it redirects to the login page (admin_login.php).

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>dashboard</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>
<!-- Includes the admin header, which might contain navigation links or other header-related content. -->

<section class="dashboard">

   <h1 class="heading">dashboard</h1>

   <!-- Starts a section for the admin dashboard with a heading. -->

   <div class="box-container">

   <!-- Creates a container for various boxes containing statistics or actions. -->

      <div class="box">
         <h3>Welcome!</h3>
         <p><?= $fetch_profile['name']; ?></p>
         <a href="update_profile.php" class="btn">update profile</a>
      </div>
      <!-- Displays a welcome box with the admin's name and a link to update the profile. -->

      <div class="box">
         <?php
            $total_pendings = 0;
            $select_pendings = $conn->prepare("SELECT * FROM `orders` WHERE payment_status = ?");
            $select_pendings->execute(['pending']);
            if($select_pendings->rowCount() > 0){
               while($fetch_pendings = $select_pendings->fetch(PDO::FETCH_ASSOC)){
                  $total_pendings += $fetch_pendings['total_price'];
               }
            }
         ?>
         <h3><span>$</span><?= $total_pendings; ?><span>/-</span></h3>
         <p>Total Pendings</p>
         <a href="placed_orders.php" class="btn">see orders</a>
      </div>
      <!-- Calculates and displays the total amount of pending orders with a link to see the orders. -->

      <div class="box">
         <?php
            $total_completes = 0;
            $select_completes = $conn->prepare("SELECT * FROM `orders` WHERE payment_status = ?");
            $select_completes->execute(['completed']);
            if($select_completes->rowCount() > 0){
               while($fetch_completes = $select_completes->fetch(PDO::FETCH_ASSOC)){
                  $total_completes += $fetch_completes['total_price'];
               }
            }
         ?>
         <h3><span>$</span><?= $total_completes; ?><span>/-</span></h3>
         <p>Completed Orders</p>
         <a href="placed_orders.php" class="btn">see orders</a>
      </div>
      <!-- Calculates and displays the total amount of completed orders with a link to see the orders. -->

      <div class="box">
   <?php
      $total_canceled = 0;
        $select_canceled = $conn->prepare("SELECT * FROM `orders` WHERE payment_status = ?");
      $select_canceled->execute(['canceled']);
      if($select_canceled->rowCount() > 0){
            while($fetch_canceled = $select_canceled->fetch(PDO::FETCH_ASSOC)){
               $total_canceled += $fetch_canceled['total_price'];
            }
      }
   ?>
   <h3><span>$</span><?= $total_canceled; ?><span>/-</span></h3>
   <p>Canceled Orders</p>
   <a href="placed_orders.php" class="btn">see canceled orders</a>
</div>
<!-- Calculates and displays the total amount of canceled orders with a link to see the orders -->


      <div class="box">
         <?php
            $select_orders = $conn->prepare("SELECT * FROM `orders`");
            $select_orders->execute();
            $number_of_orders = $select_orders->rowCount()
         ?>
         <h3><?= $number_of_orders; ?></h3>
         <p>Orders Placed</p>
         <a href="placed_orders.php" class="btn">see orders</a>
      </div>
      <!-- Retrieves and displays the total number of orders placed with a link to see the orders. -->

      <div class="box">
         <?php
            $select_products = $conn->prepare("SELECT * FROM `products`");
            $select_products->execute();
            $number_of_products = $select_products->rowCount()
         ?>
         <h3><?= $number_of_products; ?></h3>
         <p>Products Added</p>
         <a href="products.php" class="btn">see products</a>
      </div>
      <!-- Retrieves and displays the total number of products added with a link to see the products. -->

      <div class="box">
         <?php
            $select_users = $conn->prepare("SELECT * FROM `users`");
            $select_users->execute();
            $number_of_users = $select_users->rowCount()
         ?>
         <h3><?= $number_of_users; ?></h3>
         <p>Normal Users</p>
         <a href="users_accounts.php" class="btn">see users</a>
      </div>
      <!-- Retrieves and displays the total number of normal users with a link to see the users. -->

      <div class="box">
         <?php
            $select_admins = $conn->prepare("SELECT * FROM `admins`");
            $select_admins->execute();
            $number_of_admins = $select_admins->rowCount()
         ?>
         <h3><?= $number_of_admins; ?></h3>
         <p>Admin Users</p>
         <a href="admin_accounts.php" class="btn">see admins</a>
      </div>
      <!-- Retrieves and displays the total number of admin users with a link to see the admins. -->

      <div class="box">
         <?php
            $select_messages = $conn->prepare("SELECT * FROM `messages`");
            $select_messages->execute();
            $number_of_messages = $select_messages->rowCount()
         ?>
         <h3><?= $number_of_messages; ?></h3>
         <p>New Messages</p>
         <a href="../admin/messages.php" class="btn">see messages</a>
      </div>
      <!-- Retrieves and displays the total number of new messages with a link to see the messages. -->

   </div>

</section>
<!-- Closes the HTML body and document. -->




<script src="../js/admin_script.js"></script>

</body>
<!-- Sets up the basic structure of an HTML page with meta tags, title, and links to external stylesheets (Font Awesome and custom admin styles). -->
</html>