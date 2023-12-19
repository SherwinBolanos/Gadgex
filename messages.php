<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};
//It includes the database connection file (connect.php).
//It starts a session.
//It checks if the admin is logged in. If not, it redirects to the login page (admin_login.php).

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_message = $conn->prepare("DELETE FROM `messages` WHERE id = ?");
   $delete_message->execute([$delete_id]);
   header('location:messages.php');
}
//Checks if the delete parameter is set in the URL (triggered when the admin clicks the "delete" link).
// set, it retrieves the message ID to be deleted from the URL.
//Prepares and executes a SQL query to delete the message with the specified ID from the messages table.
//Redirects back to the messages.php page after deletion.

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>messages</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>


<section class="contacts">

<h1 class="heading">messages</h1>

<div class="box-container">
   <!-- Starts a section for displaying messages with a heading and a container for message boxes. -->

   <?php
      $select_messages = $conn->prepare("SELECT * FROM `messages`");
      $select_messages->execute();
      if($select_messages->rowCount() > 0){
         while($fetch_message = $select_messages->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
   <p> user id : <span><?= $fetch_message['user_id']; ?></span></p>
   <p> name : <span><?= $fetch_message['name']; ?></span></p>
   <p> email : <span><?= $fetch_message['email']; ?></span></p>
   <p> number : <span><?= $fetch_message['number']; ?></span></p>
   <p> message : <span><?= $fetch_message['message']; ?></span></p>
   <a href="messages.php??delete=<?= $fetch_message['id']; ?>" onclick="return confirm('delete this message?');" class="delete-btn">delete</a>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">you have no messages</p>';
      }
      //Retrieves all messages from the messages table.
//Checks if there are messages available.
//If messages exist, it iterates through each message and displays its details in a box.
//Provides a "delete" link for each message with a confirmation prompt.
   ?>

</div>

</section>












<script src="../js/admin_script.js"></script>
   
</body>
<!-- Closes the box container, messages section, and the HTML body.
Includes a JavaScript file for additional functionality in the admin messages page. -->
</html>