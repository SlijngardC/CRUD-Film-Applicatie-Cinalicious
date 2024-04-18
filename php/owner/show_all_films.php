<?php
session_start();
include '../includes/db_connection.php';

 ?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/owner/show_all_films.css">
    <title>Cinalicious</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>

  <body>


 <!--navbar-->
 <div class="sidenav">
  <header>
    <nav>
      <h1>FILM CRUD</h1>
      <a href='ownerhome.php' class="hmm">Home</a>
      <div class="dropdown">
        <a href="">Films</a>
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
  <div class="bbtcontainer">
  <table class="tbl">
    <tr class="tblh">
      <th class='aa'>ID</th>
      <th class='bb'>TITLE</th>
      <th class='cc'>GENRE</th>
      <th class='dd'>DESCRIPTION</th>
      <th class='ee'>DIRECTOR</th>
      <th class='ff'>RATING</th>
      <th class='gg'>YEAR</th>
      <th class='hh'>STUDIO</th>
      <th class='oppp'>OPERATIONS</th>
    </tr>
  
  <?php
  
  $sql = "SELECT f.id, f.title, g.name AS genre, f.description, d.name AS director, f.rating, f.year, s.name AS studio
          FROM films f
          JOIN genres g ON f.genre_id = g.id
          JOIN directors d ON f.director_id = d.id
          JOIN studios s ON f.studio_id = s.id
          ORDER BY f.id";
  $result = mysqli_query($conn, $sql);
  
  
  if ($result) {
  
      while ($row = mysqli_fetch_assoc($result)) {
          $id = $row['id'];
          $title = $row['title'];
          $genre_id = $row['genre'];
          $description = $row['description'];
          $desLines = explode("\n", $description);
          $hasMore = count($desLines) > 2;
          $director_id = $row['director'];
          $rating = $row['rating'];
          $year = $row['year'];
          $studio_id = $row['studio'];
      
          echo '<tr class="tblrcolor">
                  <th scope="row">' . $id . '</th>
                  <td>' . $title . '</td>
                  <td>' . $genre_id . '</td>
                  <td>
                  <div class="bio-truncate ' . ($hasMore ? 'has-more' : '') . '">' . $description . '</div>
                  <div class="bio-full">' . $description . '</div>
                  </td>
                  <td>' . $director_id . '</td>
                  <td>' . $rating . '</td>
                  <td>' . $year . '</td>
                  <td>' . $studio_id . '</td>
                  <td>
                  <a href="film_update.php? updateid='.$id.'"><button class="upd">Update</button></a>
                  <a href="film_delete.php? deleteid='.$id.'"><button class="del">Delete</button></a>
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
