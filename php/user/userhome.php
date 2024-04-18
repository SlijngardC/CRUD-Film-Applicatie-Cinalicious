<?php
session_start();
include '../includes/db_connection.php';

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/user/userhome.css">
    <title>Cinalicious</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>

  <body>
    
    <!--navbar-->
    <header>
    <img src="../../img/Icons/cina_basic.png" alt="" class="logo">
    <nav>
        <ul class="nav__links">
            <li><a href="#movies-section">Movies</a></li>
            <li><a href='account.php'>Account</a></li>
            <li><a href='../../html/about_us.html'>About Us</a></li>
            <li><a class='btn1' href='logout.php'><button>LogOut</button></a></li>
        </ul>
    </nav>
</header>

    
    <section class="bghome">
     <div class="container">
       <img class="lgo" src="../../img/Icons/cinalicious.png" alt="">
     </div>
     
     <div class="srch">
       <form action="user_search.php" method="POST" class="schr">
       <select class="drp"  name='option' style='padding:5px;'>
             <option selected>Search By</option>
             <option value='name'>Name</option>
             <option value='genre'>Genre</option>
             <option value='rdate'>Release year</option>
             <option value='director'>Director</option>
             <option value='studio'>Studio</option>
           </select>
         <input type="text" placeholder="search movies" name="q">
         <button type="submit" name="submit"><img src="../../img/Icons/search.png"></button>
       </form>
     </div>
   </section>

   <div class="welcontainer">
   <h1>WELCOME TO CINALICIOUS</h1>
   <P><?php if (isset($_SESSION["email"])) {
  echo $_SESSION["email"] . "<br>";
} else {
    $nolog="You are not logged in.";
} ?></P>
   <?php if(isset($nolog)) { ?>
          <p style="color: red"><?php echo $nolog; ?></p>
        <?php } ?>
   </div>

   </div>

   <div class='amaa' id='movies-section'>
   <h1>ALL MOVIES:</h1>
     <div class="jumbotron">
         <?php
           include 'user_fetcher.php';
           ?>
     </div>
   </div>


   <script>
    window.addEventListener("scroll", function(){
      var header = document.querySelector("header");
      header.classList.toggle("sticky", window.scrollY > 0);
    })
    </script>

<script>
const hamburger = document.querySelector('.hamburger');
const navLinks = document.querySelector('.nav__links');

hamburger.addEventListener('click', () => {
    navLinks.classList.toggle('active');
});
</script>

  <footer>
  <div class="foootercontainer">
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
  </div>
</footer>


  </body>
</html>
