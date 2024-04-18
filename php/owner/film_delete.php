<?php
session_start();
include '../includes/db_connection.php';

$id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$password = $row['password'];

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $current_password = $_POST['current_password'];

        if ($current_password == $password) {
            // Get the file names from the database
            $sql = "SELECT poster, video FROM films WHERE id = $id";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $poster_file = $row['poster'];
                $video_file = $row['video'];

                // Delete the poster file
                if (!empty($poster_file)) {
                    $poster_path = "../../posters/" . $poster_file;
                    if (file_exists($poster_path)) {
                        unlink($poster_path);
                    }
                }

                // Delete the video file
                if (!empty($video_file)) {
                    $video_path = "../../videos/" . $video_file;
                    if (file_exists($video_path)) {
                        unlink($video_path);
                    }
                }

                // Delete user ratings for the film
                $sql_delete_ratings = "DELETE FROM user_ratings WHERE film_id = $id";
                if (mysqli_query($conn, $sql_delete_ratings)) {
                    // Ratings deleted successfully
                } else {
                    echo "Error deleting ratings: " . mysqli_error($conn);
                }

                // Delete the film record from the database
                $sql = "DELETE FROM films WHERE id = $id";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    header('location:show_all_films.php');
                } else {
                    die(mysqli_error($conn));
                }
            }
        } else {
            $youtiedit = "roses are red, violets are blue you've entered the wrong password it must really suck to be you!!!";
        }
    }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/owner/delete.css">
    <title>Cinalicious</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>

  <body>
    
    <!--navbar-->
    <div class="sidenav">
      <header>
        <nav>
          <h1>FILM DELETE</h1>
          <a href='ownerhome.php' class="hmm">Home</a>
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
      
      
    <div class="filmcontainer">
      <form action="" method="POST" enctype="multipart/form-data">
        <h1>Delete Film</h1>
  
        <input type="password" class="form-control" placeholder="Enter your password" name="current_password" value="" required>
        <br>
        <div class="signupbutton">
          <div class="errer">
            <?php if (isset($youtiedit)) { ?>
              <p style="color: red"><?php echo $youtiedit; ?></p>
            <?php } ?>
          </div>
          <button type="submit" class="btndel" name="delete" value="Submit">Delete</button>
        </div>
      </form>
      </div>
    </div>
  </body>
</html>