<?php

include '../components/connect.php';
//This line includes a file (connect.php) that typically contains the code for connecting to the database. It's assumed that this file sets up the $conn variable, which is a PDO connection to the database.

session_start();
//This starts or resumes a session. Sessions are used to store and retrieve values across multiple pages.

if(isset($_POST['submit'])){

   //This block checks if the form with the name "submit" has been submitted. If it has, it proceeds to process the form data.

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $pass = $_POST['pass'];
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   //It retrieves the username and password from the form data and uses filter_var to sanitize the input.

   $select_admin = $conn->prepare("SELECT * FROM `admins` WHERE name = ? AND password = ?");
   $select_admin->execute([$name, $pass]);
   $row = $select_admin->fetch(PDO::FETCH_ASSOC);

   //This prepares and executes a database query to check if the entered username and password match any record in the admins table.

   if($select_admin->rowCount() > 0){
      $_SESSION['admin_id'] = $row['id'];
      header('location:dashboard.php');
   }else{
      $message[] = 'incorrect username or password!';
   }

   //If a matching record is found, it sets the admin_id in the session and redirects to the admin dashboard (dashboard.php). Otherwise, it adds an error message to the $message array.

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

   <!-- These lines include CSS styles, presumably for styling the login form. -->

</head>
<body>

<?php
   if(isset($message)){
      foreach($message as $message){

         //If there are any error messages in the $message array (e.g., incorrect username or password), it displays them on the page.

         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>

<section class="form-container">

   <form action="" method="post">
      <h3>Admin Login </h3>
      
      <input type="text" name="name" required placeholder="enter your username" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="pass" required placeholder="enter your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="login now" class="btn" name="submit">
   </form>

   <!-- This is the HTML form where the admin enters their username and password. -->

</section>
   
</body>
</html>