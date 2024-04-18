<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='../../css/user/user_search.css'>
    <title>Cinalicious</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>

  <body>
    
   <!--navbar-->
   <header>
  <img src="../../img/Icons/cina_basic.png" alt="" class="logo">
  <nav>
    <ul class="nav__links">
      <li><a href="userhome.php #movies-section">Movies</a></li>
      <li><a href='account.php'>Account</a></li>
      <li><a href='../../html/about_us.html'>About Us</a></li>
      <li><a class='btn1' href='logout.php'><button>LogOut</button></a></li>;
    </ul>
  </nav>
</header>

    
    <section class="bghome">
     <div class="container">
       <img class="lgo" src="../../img/Icons/cinalicious.png" alt="">
     </div>
     
     <div class="srch">
    <form action="" method="POST" class="schr">
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

   <div class="welcontainer0">
         <p>HERE ARE YOUR</p>
         <h1>SEARCH RESULTS:</h1> 
   </div>

   <?php
session_start();

include '../includes/db_connection.php';

if (isset($_POST['submit'])) {
    $search_term = mysqli_real_escape_string($conn, $_POST['q']);
    $search_option = $_POST['option'];

    switch ($search_option) {
        case 'name':
            $sql = "SELECT f.*, g.name AS genre_name, d.name AS director_name, s.name AS studio_name
                    FROM films f
                    JOIN genres g ON f.genre_id = g.id
                    JOIN directors d ON f.director_id = d.id
                    JOIN studios s ON f.studio_id = s.id
                    WHERE f.title LIKE '%$search_term%'";
            break;
        case 'genre':
            $sql = "SELECT f.*, g.name AS genre_name, d.name AS director_name, s.name AS studio_name
                    FROM films f
                    JOIN genres g ON f.genre_id = g.id
                    JOIN directors d ON f.director_id = d.id
                    JOIN studios s ON f.studio_id = s.id
                    WHERE g.name LIKE '%$search_term%'";
            break;
        case 'rdate':
            $sql = "SELECT f.*, g.name AS genre_name, d.name AS director_name, s.name AS studio_name
                    FROM films f
                    JOIN genres g ON f.genre_id = g.id
                    JOIN directors d ON f.director_id = d.id
                    JOIN studios s ON f.studio_id = s.id
                    WHERE f.year LIKE '%$search_term%'";
            break;
         case 'director':
              $sql = "SELECT f.*, g.name AS genre_name, d.name AS director_name, s.name AS studio_name
                      FROM films f
                      JOIN genres g ON f.genre_id = g.id
                      JOIN directors d ON f.director_id = d.id
                      JOIN studios s ON f.studio_id = s.id
                      WHERE d.name LIKE '%$search_term%'";
              break;

              case 'studio':
                $sql = "SELECT f.*, g.name AS genre_name, d.name AS director_name, s.name AS studio_name
                       FROM films f
                       JOIN genres g ON f.genre_id = g.id
                       JOIN directors d ON f.director_id = d.id
                       JOIN studios s ON f.studio_id = s.id
                       WHERE s.name LIKE '%$search_term%'";
               break;

        default:
            $sql = "SELECT f.*, g.name AS genre_name, d.name AS director_name, s.name AS studio_name
                    FROM films f
                    JOIN genres g ON f.genre_id = g.id
                    JOIN directors d ON f.director_id = d.id
                    JOIN studios s ON f.studio_id = s.id
                    WHERE f.title LIKE '%$search_term%'";
            break;
    }

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<div class='row' style='display: flex; flex-wrap: wrap; justify-content: flex-start; margin-left: 80px;'>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='col' style='flex: 0 0 auto; margin: 10px;'>";
            echo "<form action='user_movie.php' method='POST'>";
            echo "<img class='hompos' src='../../posters/" . $row['poster'] . "' height='250' width='200' style='margin-top: 30px;margin-left:30px;margin-right:20px;' />";
            echo "<div class='noob' id='search-results'>";
            echo "<input type='submit' name='submit' class='movie-select' value='" . ucwords($row['title']) . "'/>";
            echo "</div>";
            echo "</form>";
            echo "</div>";
        }
        echo "</div>";
    } else{
      $nomovie= "movie not found";
    }
}
?>

<div class="errcon">
         <?php if(isset($nomovie)) { ?>
            <p style="color: red"><?php echo $nomovie; ?></p>
          <?php } ?>
   </div>

  
   <script>
    window.addEventListener("scroll", function(){
      var header = document.querySelector("header");
      header.classList.toggle("sticky", window.scrollY > 0);
    })
    </script>

<script>
    function scrollToSearchResults() {
        const searchResultsSection = document.getElementById('search-results');
        const scrollPosition = searchResultsSection.offsetTop - (window.innerHeight / 2);

        window.scrollTo({
            top: scrollPosition,
            behavior: 'smooth'
        });
        document.documentElement.style.scrollBehavior = 'auto';
    }
    scrollToSearchResults();
</script>

  <footer>
  <div class="foootercontainer" id='no-results'>
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

<script>
    function scrollToSearchResults() {
        const searchResultsSection = document.getElementById('no-results');
        const scrollPosition = searchResultsSection.offsetTop - (window.innerHeight / 2);

        window.scrollTo({
            top: scrollPosition,
            behavior: 'smooth'
        });
        document.documentElement.style.scrollBehavior = 'auto';
    }
    scrollToSearchResults();
</script>

  </body>
</html>





