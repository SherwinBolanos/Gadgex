<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};
/*The PHP code includes a file (connect.php) that presumably contains the database connection details.
It starts a session using session_start().
It checks if the session variable user_id is set. If set, it assigns the value to the variable $user_id; otherwise, it sets $user_id to an empty string. */

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/about-img.svg" alt="">
      </div>

      <div class="content">
         <h3>"Welcome to Gadgex – Your Destination for Premium Gadgets and Appliances!</h3>
         <p>
Discover a world where quality meets innovation. At Gadgex, we curate a selection of high-quality gadgets, cutting-edge laptops, smartphones, powerful speakers, and appliances that redefine modern living.

Why Choose Gadgex?

Quality Assurance: Our commitment to quality ensures that only the best-in-class products make it to our shelves.
Diverse Range: Beyond gadgets, explore laptops, smartphones, speakers, and more, all under one roof.
Innovation Hub: Stay ahead with the latest in technology, as Gadgex brings you the newest advancements.
Customer-Centric Excellence: Your satisfaction is our priority, with a dedicated support team to assist you.
Trust in Gadgex: Join a community of satisfied customers who trust Gadgex for their tech needs.
Elevate your tech and lifestyle experience with Gadgex. Explore now and embrace the Gadgex difference!"</p>
         <a href="contact.php" class="btn">contact us</a>
      </div>

   </div>

</section>

<section class="reviews">
   
   <h1 class="heading">client's reviews</h1>

   <div class="swiper reviews-slider">

   <div class="swiper-wrapper">

      <div class="swiper-slide slide">
         <img src="..\ecommerce website\images\glor.jpg" alt="">
         <p>I LOVE IT!!!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Glorianne</h3>
      </div>

      <div class="swiper-slide slide">
         <img src="..\ecommerce website\images\jed.jpg" alt="">
         <p>I LOVE YOU YEAHH!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Jed Mike</h3>
      </div>

      <div class="swiper-slide slide">
         <img src="..\ecommerce website\images\mark.jpg" alt="">
         <p>WOWWW!!!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Mark</h3>
      </div>

      <div class="swiper-slide slide">
         <img src="..\ecommerce website\images\pham.jpg" alt="">
         <p>SATISFIED COSTUMER HERE!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>phamela</h3>
      </div>

      <div class="swiper-slide slide">
         <img src="..\ecommerce website\images\sher.jpg" alt="">
         <p>AWESOME! WILL BUY AGAIN!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Sherwin</h3>
      </div>

      <div class="swiper-slide slide">
         <img src="..\ecommerce website\images\virman.jpg" alt="">
         <p>WOULD RECOMMEND IT TO MY FRIENDS!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Virman</h3>
      </div>

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>









<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".reviews-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
      slidesPerView:1,
      },
      768: {
      slidesPerView: 2,
      },
      991: {
      slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>