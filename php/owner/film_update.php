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

// Check if the film ID is provided in the query string
if (isset($_GET['updateid'])) {
    $film_id = $_GET['updateid'];

    // Fetch the existing record data
    $sql = "SELECT * FROM films WHERE id = '$film_id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $title = $row['title'];
        $genre_id = $row['genre_id'];
        $description = $row['description'];
        $director_id = $row['director_id'];
        $rating = $row['rating']; // Keep the existing rating
        $year = $row['year'];
        $studio_id = $row['studio_id'];
        $existing_poster = $row['poster'];
        $existing_video = $row['video'];
    } else {
        echo "Error: Record not found.";
        exit;
    }
} else {
    echo "Error: Film ID not provided.";
    exit;
}

// Update record logic
if (isset($_POST['upload'])) {
    $current_password = $_POST['current_password'];

    if ($current_password == $password) {
        $targetvid = "../../videos/" . basename($_FILES['video']['name']);
        $target = "../../posters/" . basename($_FILES['poster']['name']);
        $title = strtolower($_POST['title']);
        $genre_id = $_POST['genre'];
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $director_id = $_POST['director'];
        $year = $_POST['year'];
        $studio_id = $_POST['studio'];

        // Use the existing poster and video if new ones are not uploaded
        $image = !empty($_FILES['poster']['name']) ? $_FILES['poster']['name'] : $existing_poster;
        $video = !empty($_FILES['video']['name']) ? $_FILES['video']['name'] : $existing_video;

        $sql = "UPDATE films SET
            title='$title',
            genre_id='$genre_id',
            description='$description',
            director_id='$director_id',
            year='$year',
            studio_id='$studio_id',
            poster='$image',
            video='$video'
            WHERE id='$film_id'";

        if (mysqli_query($conn, $sql)) {
            // Delete the old poster file if a new one is uploaded
            if (!empty($_FILES['poster']['name']) && $existing_poster != $image) {
                $old_poster_path = "../../posters/" . $existing_poster;
                if (file_exists($old_poster_path)) {
                    unlink($old_poster_path);
                }
                move_uploaded_file($_FILES['poster']['tmp_name'], $target);
            }

            // Delete the old video file if a new one is uploaded
            if (!empty($_FILES['video']['name']) && $existing_video != $video) {
                $old_video_path = "../../videos/" . $existing_video;
                if (file_exists($old_video_path)) {
                    unlink($old_video_path);
                }
                move_uploaded_file($_FILES['video']['tmp_name'], $targetvid);
            }

            // Update the updated_at column
            $update_timestamp_sql = "UPDATE films SET updated_at = NOW() WHERE id = '$film_id'";
            mysqli_query($conn, $update_timestamp_sql);

            header("Location: show_all_films.php");
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    } else {
        $youtiedit = "roses are red, violets are blue you've entered the wrong password it must really suck to be you!!!";
    }
}

// Fetch data for dropdown menus
$genre_sql = "SELECT id, name FROM genres";
$genre_result = mysqli_query($conn, $genre_sql);
$genre_options = "";
while ($genre_row = mysqli_fetch_assoc($genre_result)) {
    $selected = ($genre_row['id'] == $genre_id) ? "selected" : "";
    $genre_options .= "<option value='{$genre_row['id']}' $selected>{$genre_row['name']}</option>";
}

$director_sql = "SELECT id, name FROM directors";
$director_result = mysqli_query($conn, $director_sql);
$director_options = "";
while ($director_row = mysqli_fetch_assoc($director_result)) {
    $selected = ($director_row['id'] == $director_id) ? "selected" : "";
    $director_options .= "<option value='{$director_row['id']}' $selected>{$director_row['name']}</option>";
}

$studio_sql = "SELECT id, name FROM studios";
$studio_result = mysqli_query($conn, $studio_sql);
$studio_options = "";
while ($studio_row = mysqli_fetch_assoc($studio_result)) {
    $selected = ($studio_row['id'] == $studio_id) ? "selected" : "";
    $studio_options .= "<option value='{$studio_row['id']}' $selected>{$studio_row['name']}</option>";
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/owner/film_update.css">
    <title>Cinalicious</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>

  <body>
    
    <!--navbar-->
    <div class="sidenav">
      <header>
        <nav>
          <h1>FILM UPDATE</h1>
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
          <h1>Update Film details</h1>
          <input type="text" class="form-control" placeholder="Title" name="title" value="<?php echo $title; ?>" required><br>
          <select class="form-control" name="genre" required>
            <option value="">Select Genre</option>
            <?php echo $genre_options; ?>
          </select>
          <textarea type="text" class="form-des" placeholder="Description..." name="description" required><?php echo $description; ?></textarea>
          <br>
          <select class="form-control" name="director" required>
            <option value="">Select Director</option>
            <?php echo $director_options; ?>
          </select>
          
          <input type="" class="form-control3" placeholder="Year" name="year" value="<?php echo $year; ?>" required><br>
          <select class="form-control" name="studio" required>
            <option value="">Select Studio</option>
            <?php echo $studio_options; ?>
          </select>
          <div class="row">
            <div class="col">
              <table>
                <tr>
                  <td><label for=""><b class="er">Upload Image: </b></label></td>
                  <td>
                    <div class="">
                      <input type="hidden" name="size" value="100000">
                      <input type="file" name="poster" value="">
                    </div>
                  </td>
                </tr>
              </table>
            </div>
            <div class="col">
              <table>
                <tr>
                  <td><label for=""><b class="er">Upload Video: </b></label></td>
                  <td>
                    <div class="">
                      <input type="hidden" name="size" value="30000000">
                      <input type="file" name="video" value="">
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
            <button type="submit" class="bttnup" name="upload" value="Submit">Update</button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>