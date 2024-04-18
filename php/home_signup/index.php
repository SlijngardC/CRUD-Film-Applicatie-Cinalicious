<?php
session_start();

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cinalicious</title>
    <link rel="stylesheet" href="../../css/home_signup/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

  <body>
 
<header>
  <img src="../../img/Icons/cina_basic.png" alt="" class="logo">    
      <div class="cta">
        <a class="btn1" href="signup.php"><button>SignUp</button></a> 
        <a  href="signin.php"><button>SignIn</button></a> 
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


<section class="bghome">
  <div class="container">
    <img class="lgo" src="../../img/Icons/cinalicious.png" alt="">
  </div>
</section>


<section class="about">
    <div class="main">
     
        <div class="about-text">
            <h1>INTRODUCTION</h1>
            <p>voor periode 5 moeten wij voor het vak softwhare onwikkeling een crud film website creëeren.<br>
            
               Dit project hebben wij in een groep van 3 gedaan.<br>
              </p>
         
              
            </div>
          </div>
        </section>

        <div class='developers'>
          <h1>Ons team bestaat uit:</h1>
          <div class='developers-photos'>
            <img src="../../img/Icons/sahil.png" alt="">
            <img src="../../img/Icons/chivar.png" alt="">
            <img src="../../img/Icons/tushar.png" alt="">
          </div>
          <div class="taken">
            <h2>De taken verdeling ziet er als volgt uit:</h2>
            <p><span>Chivar Slijngard</span>: coderen van de front-end en back-end</p>
            <p><span>Tushar Gena</span>: documentatie, BETA tester en editen van de demo video</p>
            <p><span>Sahil Bisai</span>: test data en hd films, BETA tester en helpen met documentatie</p>
          </div>
          <p class='recomend'>the recomended resolution for this project is: 1920 x 1080p with 125% zoom and 100% browser zoom</p>
          <p class='recomend2'>any other pc resolution bigger and equal to: 1280 x 720p with 100% zoom and browser zoom will also do</p>
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
  </div>
</footer>


  </body>
</html>
