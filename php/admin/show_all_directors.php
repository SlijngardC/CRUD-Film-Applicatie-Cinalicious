<?php
session_start();
include '../includes/db_connection.php';

 ?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/admin/show_all_directors.css">
    <title>Cinalicious</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>

  <body>
    
<!--navbar-->
<div class="sidenav">
  <header>
    <nav>
      <h1>DIRECTOR CRUD</h1>
      <a href='adminhome.php' class="hmm">Home</a>
      <div class="dropdown">
        <a href="show_all_films.php">Films</a>
        <div class="dropdown-content">
          <a href="film.php">Add Film</a>
        </div>
      </div>
      <div class="dropdown">
        <a href="">Directors</a>
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
    <div class="bbtcontainer">
    <table class="tbl">
      <tr class="tblh">
        <th class='aa'>ID</th>
        <th class='bb'>NAME</th>
        <th class='cc'>BIO</th>
        <th class='operat'>OPERATIONS</th>
      </tr>
    
    <?php
    $sql = "SELECT * FROM directors";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
      while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $name = $row['name'];
        $bio = $row['bio'];
        $bioLines = explode("\n", $bio);
        $hasMore = count($bioLines) > 2;
        echo '<tr class="tblrcolor">
            <th scope="row">' . $id . '</th>
            <td>' . $name . '</td>
            <td>
                <div class="bio-truncate ' . ($hasMore ? 'has-more' : '') . '">' . $bio . '</div>
                <div class="bio-full">' . $bio . '</div>
            </td>
            <td>
                <a href="director_update.php?updateid=' . $id . '"><button class="upd">Update</button></a>
                <a href="director_delete.php?deleteid=' . $id . '"><button class="del">Delete</button></a>
            </td>
        </tr>';
    }
  } else {
      echo "Error executing the query: " . mysqli_error($conn);
  }
    ?>
    
    
      
    
    </table>
    </div>
    
    
       <script>
        window.addEventListener("scroll", function(){
          var header = document.querySelector("header");
          header.classList.toggle("sticky", window.scrollY > 0);
        })
        </script>

</div>


  </body>
</html>
