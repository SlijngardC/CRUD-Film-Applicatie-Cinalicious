<?php
session_start();
include '../includes/db_connection.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cinalicious</title>
    <link rel="stylesheet" href="../../css/home_signup/index.css">
    <link rel="stylesheet" href="../../css/home_signup/banned.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

  <body>
 
  <header>
  <img src="../../img/Icons/cina_banned.png" alt="" class="logo">
      <div class="cta">
        <a class="btn2"  href="signup.php"><button>SignUp</button></a> 
        <a  href="signin.php"><button>SignIp</button></a> 
      </div>
</header>

<script>
    window.addEventListener("scroll", function(){
      var header = document.querySelector("header");
      header.classList.toggle("sticky", window.scrollY > 0);
    })
    </script>

<script>
      const hamburger = document.querySelector('.hamburger');
    const cta = document.querySelector('.cta');
    
    hamburger.addEventListener('click', () => {
        cta.classList.toggle('active');
    });
    </script>

<div class="frmcont">
   <h1>YOU HAVE BEEN <span>BANNED</span></h1>
   <div class="bann">
       <p class="bname">
        <?php if (isset($_SESSION["email"])) {
            echo $_SESSION["email"] . "<br>";
        } else {
            echo "You are not logged in.";
        } ?>
      </p>
       <p class="youproblem">THIS IS A YOU PROBLEM AND ALSO A SKILL ISSUE!!!</p>
   </div>
   <div class="hmbtn">
       <button><a href="index.php">Back to home</a> </button>
   </div>
   <div class="goat">
    <p>Message by tha goat - Chivar Slijngard</p>
   </div>
  </div>


<footer>
  <div class="footercontainer">
    <div class="socialicons">
    <a href=""><i class="fa-brands fa-pinterest"></i></a>
      <a href=""><i class="fa-brands fa-facebook"></i></a>
      <a href=""><i class="fa-brands fa-youtube"></i></a>
      <a href=""><i class="fa-brands fa-telegram"></i></i></a>
      <a href=""><i class="fa-brands fa-twitter"></i></a>
    </div>
    <div class="footerbottom">
      <p>@2024 Slijngard Chivar, Tushar Gena & Sahil Bisai | All Rights Reserved <img src="../../img/Icons/Icon4.png" alt="" class="CC"></p>
    </div>
  </footer>


   </body>
 </html>
