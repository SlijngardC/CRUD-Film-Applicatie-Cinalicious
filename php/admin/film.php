<?php
session_start();
include '../includes/db_connection.php';

$id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$email = $row['email'];
$password = $row['password'];
$role_id = $row['role_id'];

if (isset($_POST['upload'])) {
    $current_password = $_POST['current_password'];

    if ($current_password == $password) {
        $targetvid = "../../videos/" . basename($_FILES['video']['name']);
        $target = "../../posters/" . basename($_FILES['poster']['name']);
        $title = strtolower($_POST['title']);
        $genre_id = $_POST['genre'];
        $description = $_POST['description'];
        $director_id = $_POST['director'];
        $rating = 0;
        $year = $_POST['year'];
        $studio_id = $_POST['studio'];
        $image = $_FILES['poster']['name'];
        $video = $_FILES['video']['name'];

        $sql = "INSERT INTO films(title,genre_id,description,director_id,rating,year,studio_id,poster,video) VALUES(?,?,?,?,?,?,?,?,?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sssisisss", $title, $genre_id, $description, $director_id, $rating, $year, $studio_id, $image, $video);
        mysqli_stmt_execute($stmt);

        if (move_uploaded_file($_FILES['poster']['tmp_name'], $target) && move_uploaded_file($_FILES['video']['tmp_name'], $targetvid)) {
            header("Location: show_all_films.php");
        } else {
            echo "error uploading";
        }
    } else {
        $youtiedit = "roses are red, violets are blue you've entered the wrong password it must really suck to be you!!!";
    }
}

// Get genres
$genres_sql = "SELECT * FROM genres";
$genres_result = mysqli_query($conn, $genres_sql);
$genres_data = mysqli_fetch_all($genres_result, MYSQLI_ASSOC);

// Get directors
$directors_sql = "SELECT * FROM directors";
$directors_result = mysqli_query($conn, $directors_sql);
$directors_data = mysqli_fetch_all($directors_result, MYSQLI_ASSOC);

// Get studios
$studios_sql = "SELECT * FROM studios";
$studios_result = mysqli_query($conn, $studios_sql);
$studios_data = mysqli_fetch_all($studios_result, MYSQLI_ASSOC);
?>


 
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/admin/film.css">
    <title>Cinalicious</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>

  <body>
    
<!--navbar-->
<div class="sidenav">
  <header>
    <nav>
      <h1>FILM ADD</h1>
      <a href='adminhome.php' class="hmm">Home</a>
      <div class="dropdown">
        <a href="show_all_films.php">Films</a>
        <div class="dropdown-content">
          <a href="">Add Film</a>
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

</nav>
</header>
<a class="logout" href="logout.php">LogOut</a>
</div>


  <div class="main">
   
    
    
  <div class="filmcontainer">
      <form action="" method="POST" enctype="multipart/form-data">
        <h1>Enter Film details</h1>

        <input type="text" class="form-control" placeholder="Title" name="title" value="" required>
        <br>
        <select class="form-control" name="genre" required>
          <option value="">Select Genre</option>
          <?php foreach ($genres_data as $genre): ?>
            <option value="<?php echo $genre['id']; ?>"><?php echo $genre['name']; ?></option>
          <?php endforeach; ?>
        </select>
        <br>
        <textarea type="text" class="form-des" placeholder="Description..." name="description" value="" required></textarea>
        <br>
        <select class="form-control" name="director" required>
          <option value="">Select Director</option>
          <?php foreach ($directors_data as $director): ?>
            <option value="<?php echo $director['id']; ?>"><?php echo $director['name']; ?></option>
          <?php endforeach; ?>
        </select>
        <br>
        <input type="" class="form-control" placeholder="Year" name="year" value="" required>
        <br>
        <select class="form-control" name="studio" required>
          <option value="">Select Studio</option>
          <?php foreach ($studios_data as $studio): ?>
            <option value="<?php echo $studio['id']; ?>"><?php echo $studio['name']; ?></option>
          <?php endforeach; ?>
        </select>
        <br>

        <div class="row">
          <div class="col">
            <table>
              <tr>
                <td> <label for=""><b class="er">Upload Image: </b></label> </td>
                <td>
                  <div class="">
                    <input type="hidden" name="size" value="100000" required>
                    <input type="file" name="poster" value="" required>
                  </div>
                </td>
              </tr>
            </table>
          </div>

          <div class="col">
            <table>
              <tr>
                <td> <label for=""><b class="er">Upload Video: </b></label> </td>
                <td>
                  <div class="">
                    <input type="hidden" name="size" value="300000000" required>
                    <input type="file" name="video" value="" required>
                  </div>
                </td>
              </tr>
            </table>
          </div>
        </div>
        <br>
        <input type="password" class="form-control" placeholder="your password" name="current_password" value="" required>
        <br>

        <div class="signupbutton">
          <div class="errer">
            <?php if (isset($youtiedit)) { ?>
              <p style="color: red"><?php echo $youtiedit; ?></p>
            <?php } ?>
          </div>
          <button type="submit" class="btnssg" name="upload" value="Submit">Add</button>
        </div>
      </form>
     </div>
    
    </div>
    </div>
    
</div>


    
      </body>
    </html>

      