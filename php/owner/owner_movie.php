<?php
session_start();
if (isset($_POST['submit'])) {
    $title = $_POST['submit'];
    include '../includes/db_connection.php';

    // Prepare the SQL query
    $stmt = $conn->prepare("SELECT f.id, f.title, g.name AS genre_name, f.description, d.name AS director_name, f.rating, f.year, s.name AS studio_name, f.poster, f.video
                            FROM films f
                            JOIN genres g ON f.genre_id = g.id
                            JOIN directors d ON f.director_id = d.id
                            JOIN studios s ON f.studio_id = s.id
                            WHERE f.title = ?");

    if ($stmt === false) {
        // Error handling for prepare() failure
        echo "Error preparing the SQL statement: " . $conn->error;
    } else {
        $stmt->bind_param("s", $title);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<!DOCTYPE html>";
            echo "<html lang='en' dir='ltr'>";
            echo "<head>";
            echo "<meta charset='utf-8'>";
            echo "<title>" . $title . "</title>";
            echo "<link rel='stylesheet' href='../../css/owner/owner_movie.css'>";
            echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />';
            echo "</head>";
            echo "<body>"; 
            echo  "<div class='sidenav'>
            <header>
              <nav>
                <h1>OWNER WATCH</h1>
                <a href='ownerhome.php' class='hmm'>Home</a>
                <div class='dropdown'>
                  <a href='show_all_films.php'>Films</a>
                  <div class='dropdown-content'>
                    <a href='film.php'>Add Film</a>
                  </div>
                </div>
                <div class='dropdown'>
                  <a href='show_all_directors.php'>Directors</a>
                  <div class='dropdown-content'>
                    <a href='director.php'>Add Director</a>
                  </div>
                </div>
                <div class='dropdown'>
                  <a href='show_all_genres.php'>Genres</a>
                  <div class='dropdown-content'>
                    <a href='genre.php'>Add Genre</a>
                  </div>
                </div>
                <div class='dropdown'>
                  <a href='show_all_studios.php'>Studios</a>
                  <div class='dropdown-content'>
                    <a href='studio.php'>Add Studio</a>
                  </div>
                </div>
                <div class='dropdown'>
                <a href='show_all_roles.php'>Roles</a>
                <div class='dropdown-content'>
                <a href='roles.php'>Add Role</a>
                </div>
                </div>
                <div class='dropdown'>
                <a href='show_all_users.php'>Users</a>
                <div class='dropdown-content'>
                <a href='user.php'>Add User</a>
              </div>
            </div>
          </nav>
          </header>
          <a class='logout' href='logout.php'>LogOut</a>
          </div>";
            echo "<div class='main'>";
            echo "<div class='jumbotron-fluid'>";
            echo "<div class='container'>";
            echo "<br><br><br>";
            echo "<div class='wtchm'><h3><span>WATCH</span> MOVIE</h3></div>";
            echo "<div class='embed-responsive embed-responsive-16by9'>";
            echo "<iframe class='vdd' src='../../videos/" . $row['video'] . "' frameborder='0' allowfullscreen></iframe>";
            echo "</div>";
            echo "<br><br>";
            echo "<h1>" . $row['title'] . "</h1>";
            echo "<p><strong>Genre:</strong> " . $row['genre_name'] . "</p>";
            echo "<p class='filmdes'><strong>Description:<br></strong> " . $row['description'] . "</p>";
            echo "<p><strong>Director:</strong> " . $row['director_name'] . "</p>";
            echo "<p><strong>Rating:</strong> " . $row['rating'] . "<span class='spn'>&#9733;</p>";
            echo "<p><strong>Year:</strong> " . $row['year'] . "</p>";
            echo "<p><strong>Studio:</strong> " . $row['studio_name'] . "</p>";
            echo "<p><strong></strong> <img class='pos' src='../../posters/" . $row['poster'] . "' alt='Movie Poster' style='max-width: 300px;'></p>";
            echo "</div>";
            echo "</div>";
            echo '<script>
            window.addEventListener("scroll", function(){
            var header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0);
            });
            </script>';
            echo "<footer>";
            echo "<div class='foootercontainer'>";
            echo "<div class='socialicons'>";
            echo "<a href=''><i class='fa-brands fa-pinterest'></i></a>";
            echo "<a href=''><i class='fa-brands fa-facebook'></i></a>";
            echo "<a href=''><i class='fa-brands fa-youtube'></i></a>";
            echo "<a href=''><i class='fa-brands fa-telegram'></i></a>";
            echo "<a href=''><i class='fa-brands fa-twitter'></i></a>";
            echo "</div>";
            echo "<div class='footerbottom'>";
            echo "<p>@2024 Slijngard Chivar, Tushar Gena & Sahil Bisai | All Rights Reserved <img src='../../img/Icons/Icon3.png' alt='' class='CC'></p>";
            echo "</div>";
            echo "</div>";
            echo "</footer>";
            echo "</div>";
            echo "</body>";
            echo "</html>";
        } else {
            echo "No movie found with the title: " . $title;
        }

        // Close the statement
        $stmt->close();
    }

    // Close the database connection
    $conn->close();
}
?>