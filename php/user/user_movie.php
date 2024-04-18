<?php
session_start();
include '../includes/db_connection.php';

if (isset($_POST['rate'])) {
    $film_id = $_GET['id'];
    $user_id = $_SESSION["user_id"];
    $rating = $_POST['rating'];

    // Check if the user has already rated this movie
    $stmt = $conn->prepare("SELECT * FROM user_ratings WHERE user_id=? AND film_id=?");
    $stmt->bind_param("ii", $user_id, $film_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User has already rated this movie, so update the rating
        $stmt = $conn->prepare("UPDATE user_ratings SET rating=? WHERE user_id=? AND film_id=?");
        $stmt->bind_param("isi", $rating, $user_id, $film_id);
        $stmt->execute();
    } else {
        // User has not rated this movie before, so insert a new rating
        $stmt = $conn->prepare("INSERT INTO user_ratings (user_id, film_id, rating) VALUES (?,?,?)");
        $stmt->bind_param("iis", $user_id, $film_id, $rating);
        $stmt->execute();
    }

    // Calculate the average rating for this film
    $stmt = $conn->prepare("SELECT AVG(rating) as avg_rating FROM user_ratings WHERE film_id=?");
    $stmt->bind_param("i", $film_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $avg_rating = $row['avg_rating'];

    // Update the average rating in the films table
    $stmt = $conn->prepare("UPDATE films SET rating=? WHERE id=?");
    $stmt->bind_param("di", $avg_rating, $film_id);
    $stmt->execute();
    
    echo "<!DOCTYPE html>";
    echo "<html lang='en' dir='ltr'>";
    echo "<head>";
    echo "<meta charset='utf-8'>";
    echo "<title>Cinalicious</title>";
    echo "<link rel='stylesheet' href='../../css/user/rating.css'>";
    echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />';
    echo "</head>";
    echo "<body>";
    echo "<header>";
    echo "<img src='../../img/Icons/cina_basic.png' alt='' class='logo'>";
    echo "<nav>";
    echo "<ul class='nav__links'>";
    echo "<li><a href='userhome.php'>Home</a></li>";
    echo "<li><a href='userhome.php #movies-section'>Movies</a></li>";
    echo "<li><a href='account.php'>Account</a></li>";
    echo "<li><a href='../../html/about_us.html'>About Us</a></li>";
    echo "<li><a class='btn1' href='logout.php'><button>LogOut</button></a></li>";
    echo "</ul>";
    echo "</nav>";
    echo "</header>";
    echo "<div class='result-cont'>";
    echo "<div class='result'>";
    echo "<h1>THANKS FOR RATING</h1>";
    echo "<p>Your rating has been updated successfully!</p>";
    echo "<p>". (isset($_SESSION['email'])? $_SESSION['email']. "<br>" : ""). "</p>";
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
    echo "<p>@2023 Slijngard Chivar, Tushar Gena & Sahil Bisai | All Rights Reserved <img src='../../img/Icons/Icon3.png' alt='' class='CC'></p>";
    echo "</div>";
    echo "</div>";
    echo "</footer>";
    echo "</body>";
    echo "</html>";

    // Close the statement
    $stmt->close();
}

if (isset($_POST['submit'])) {
    $title = $_POST['submit'];

    $stmt = $conn->prepare("SELECT f.id, f.title, g.name AS genre_name, f.description, d.name AS director_name, f.rating, f.year, s.name AS studio_name, f.poster, f.video
                            FROM films f
                            JOIN genres g ON f.genre_id = g.id
                            JOIN directors d ON f.director_id = d.id
                            JOIN studios s ON f.studio_id = s.id
                            WHERE f.title =?");
    $stmt->bind_param("s", $title);
    $stmt->execute();
    $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<!DOCTYPE html>";
            echo "<html lang='en' dir='ltr'>";
            echo "<head>";
            echo "<meta charset='utf-8'>";
            echo "<title>". $title. "</title>";
            echo "<link rel='stylesheet' href='../../css/user/user_movie.css'>";
            echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />';
            echo "</head>";
            echo "<body>";
            echo "<header>";
            echo "<img src='../../img/Icons/cina_basic.png' alt='' class='logo'>";
            echo "<nav>";
            echo "<ul class='nav__links'>";
            echo "<li><a href='userhome.php'>Home</a></li>";
            echo "<li><a href='userhome.php #movies-section'>Movies</a></li>";
            echo "<li><a href='account.php'>Account</a></li>";
            echo "<li><a href='../../html/about_us.html'>About Us</a></li>";
            echo "<li><a class='btn1' href='logout.php'><button>LogOut</button></a></li>";
            echo "</ul>";
            echo "</nav>";
            echo "</header>";
            echo "<div class='jumbotron-fluid'>";
            echo "<div class='container'>";
            echo "<br><br><br>";
            echo "<div class='wtchm'><h3><span>WATCH</span> MOVIE</h3></div>";
            echo "<div class='embed-responsive embed-responsive-16by9'>";
            echo "<iframe class='vdd' src='../../videos/". $row['video']. "' frameborder='0' allowfullscreen></iframe>";
            echo "</div>";
            echo "<br><br>";
            echo "<h1>". $row['title']. "</h1>";
            echo "<p><strong>Genre:</strong> ". $row['genre_name']. "</p>";
            echo "<p class='filmdes'><strong>Description:<br></strong> ". $row['description']. "</p>";
            echo "<p><strong>Director:</strong> ". $row['director_name']. "</p>";
            echo "<p><strong>Rating:</strong> ". $row['rating']. "<span class='spn'>&#9733;</span></p>";
            echo "<p><strong>Year:</strong> ". $row['year']. "</p>";
            echo "<p><strong>Studio:</strong> ". $row['studio_name']. "</p>";

                // Add the rating form here
                echo "<form class='rating' method='post' action='". $_SERVER['PHP_SELF']. "?id=". $row['id']. "'>";
                echo "<label for='rating'>Rate this movie:</label>";
                echo "<select name='rating' id='rating'>";
                echo "<option value='1'>1 star</option>";
                echo "<option value='2'>2 stars</option>";
                echo "<option value='3'>3 stars</option>";
                echo "<option value='4'>4 stars</option>";
                echo "<option value='5'>5 stars</option>";
                echo "</select>";
                echo "<input type='submit' name='rate' value='Rate'>";
                echo "</form>";
    
            echo "<p><strong></strong> <img class='pos' src='../../posters/". $row['poster']. "' alt='Movie Poster' style='max-width: 300px;'></p>";
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
            echo "<p>@2024 Slijngard Chivar, Tushar Gena & Sahil Bisai | All Rights Reserved <img src='../../img/Icons/Icon4.png' alt='' class='CC'></p>";
            echo "</div>";
            echo "</div>";
            echo "</footer>";
            echo "</body>";
            echo "</html>";
        }
        
        else {
            echo "No movie found with the title: " . $title;
        }

        // Close the statement
        $stmt->close();
    }

    // Close the database connection
    $conn->close();

?>