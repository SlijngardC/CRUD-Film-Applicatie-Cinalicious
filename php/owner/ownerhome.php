<?php
session_start();
// Database connection
include '../includes/db_connection.php';

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/owner/ownerhome.css">
    <title>Cinalicious</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>

  <body>
    
    <!--navbar-->
    <div class="sidenav">
  <header>
    <nav>
      <h1>CRUD OPERATIONS</h1>
      <a href='' class="hmm">Home</a>
      <div class="dropdown">
        <a href="show_all_films.php">Films</a>
        <div class="dropdown-content">
          <a href="film.php">Add Film</a>
        </div>
      </div>
      <div class="dropdown">
        <a href="show_all_directors.php">Directors</a>
        <div class="dropdown-content">
          <a href="director.php">Add Director</a>
        </div>
      </div>
      <div class="dropdown">
        <a href="show_all_genres.php">Genres</a>
        <div class="dropdown-content">
          <a href="genre.php">Add Genre</a>
        </div>
      </div>
      <div class="dropdown">
        <a href="show_all_studios.php">Studios</a>
        <div class="dropdown-content">
          <a href="studio.php">Add Studio</a>
        </div>
      </div>
      <div class="dropdown">
      <a href="show_all_roles.php">Roles</a>
      <div class="dropdown-content">
      <a href="Roles.php">Add role</a>
     </div>
    </div>
      <div class="dropdown">
      <a href="show_all_users.php">Users</a>
      <div class="dropdown-content">
      <a href="user.php">Add user</a>
    </div>
  </div>
</nav>
</header>
<a class="logout" href="logout.php">LogOut</a>
</div>

<div class="main">
  <section class="bghome">
   <div class="container">
     <img class="lgo" src="../../img/Icons/cinalicious_owner.png" alt="">
   </div>
   
   <div class="srch">
  <form action="owner_search.php" method="POST" class="schr">
      <select class="drp" name='option' style='padding:5px;'>
          <option value="">Search By</option>
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
  <h1>WELCOME OWNER<img class='gearow' src='../../img/Icons/owner_gear.png'></h1>
  <p>
  <?php if (isset($_SESSION["email"])) {
    echo $_SESSION["email"];
} else {
  $nolog="You are not logged in.";
} ?></P>
   <?php if(isset($nolog)) { ?>
          <p style="color: red"><?php echo $nolog; ?></p>
        <?php } ?>
   </div>


 <div class='amaa'>
 <h1>LAST UPDATED:</h1>
 <div class="jumbotron">
        
          <?php
            include 'owner_latest-fetcher.php';
           ?>
       
    </div>
</div>

<div class='amaa' id="anchor-name">
 <h1>ALL MOVIES:</h1>
   <div class="jumbotron">
       <?php
         include 'owner_fetcher.php';
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
    <p>@2024 Slijngard Chivar, Tushar Gena & Sahil Bisai | All Rights Reserved <img src="../../img/Icons/Icon3.png" alt="" class="CC"></p>
  </div>
</div>
</footer>


</body>
</html>
</div>
