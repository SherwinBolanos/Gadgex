<?php

include '../components/connect.php';

//This line includes a file (connect.php) that likely contains the code for connecting to the database.

session_start();

//This initializes a session. Sessions are used to store user information across multiple pages.

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

//It checks if the admin_id is set in the session. If not, it redirects the user to the login page (admin_login.php). This ensures that only authenticated administrators can access the rest of the page.

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_admins = $conn->prepare("DELETE FROM `admins` WHERE id = ?");
   $delete_admins->execute([$delete_id]);
   header('location:admin_accounts.php');
}
//If a delete parameter is present in the URL, it deletes the admin account with the specified ID from the admins table in the database. After deletion, it redirects back to the admin accounts page.
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin accounts</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>

<!-- It includes the header file, which is presumably a common header for admin pages -->

<section class="accounts">

   <h1 class="heading">admin accounts</h1>

   <div class="box-container">

   <div class="box">
      <p>add new admin</p>
      <a href="register_admin.php" class="option-btn">register admin</a>
   </div>

   <?php
      $select_accounts = $conn->prepare("SELECT * FROM `admins`");
      $select_accounts->execute();
      if($select_accounts->rowCount() > 0){
         while($fetch_accounts = $select_accounts->fetch(PDO::FETCH_ASSOC)){   
   ?>

   <!-- It prepares and executes a SELECT query to fetch all admin accounts from the admins table. If accounts are found, it iterates through the results and displays relevant information. If no accounts are found, it shows a message indicating that no accounts are available. -->

   <div class="box">
      <p> admin id : <span><?= $fetch_accounts['id']; ?></span> </p>
      <p> admin name : <span><?= $fetch_accounts['name']; ?></span> </p>
      <div class="flex-btn">
         <a href="admin_accounts.php?delete=<?= $fetch_accounts['id']; ?>" onclick="return confirm('delete this account?')" class="delete-btn">delete</a>
         <?php
            if($fetch_accounts['id'] == $admin_id){
               echo '<a href="update_profile.php" class="option-btn">update</a>';
            }
         ?>
      </div>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">no accounts available!</p>';
      }
   ?>

   </div>

</section>


<!-- This sets up the structure for displaying admin accounts. It includes a box for adding a new admin and iterates through existing admin accounts to display their details with options to delete or update. -->


<!-- This code is designed for managing admin accounts, allowing the addition, deletion, and display of admin information in an admin panel or dashboard. -->




<script src="../js/admin_script.js"></script>

<!--This section includes the necessary HTML and CSS links for the page. -->

</body>
</html>