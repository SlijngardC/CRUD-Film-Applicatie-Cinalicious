<?php
session_start();

include '../includes/db_connection.php';

$id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$password = $row['password'];


if(isset($_POST['submit'])) {
  $current_password = $_POST['current_password'];

  if ($current_password == $password) {
    $name = $_POST['name'];
    $description = $_POST['description'];

    $sql = "INSERT INTO genres(name,description) values('$name','$description')";
    $result = $conn->query($sql);

    header("Location: show_all_genres.php");

    $conn->close();
  } else {
    $youtiedit = "roses are red, violets are blue you've entered the wrong password it must really suck to be you!!!";
  }
}
 ?>


 
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/owner/genre.css">
    <title>Cinalicious</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>

  <body>
    
<!--navbar-->
<div class="sidenav">
  <header>
    <nav>
      <h1>GENRE ADD</h1>
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
          <a href="">Add Genre</a>
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
    <script>
    window.addEventListener("scroll", function(){
    var header = document.querySelector("header");
    header.classList.toggle("sticky", window.scrollY > 0);
    })
    </script>
    
    
    
    <div class="studcontainer">
    
     
    <form  action="" method="POST">
    <h1>Enter Genre details</h1>
    
    <input type="text" class="form-control" placeholder="name" name="name" required><br>
    <textarea type="text" class="form-des" name="description" placeholder="description..." required></textarea>
    <br>
        <input type="password" class="form-control" placeholder="your password" name="current_password" value="" required>
        <br>
    <div class="signupbutton">
    <div class="errer">
            <?php if (isset($youtiedit)) { ?>
              <p style="color: red"><?php echo $youtiedit; ?></p>
            <?php } ?>
     </div>
    <button type="submit" class ="btnssg" name="submit">Add</button>
    </div>
    
    
    </form>
    
    </div>
    </div>
</div>
    
    
      </body>
    </html>

      