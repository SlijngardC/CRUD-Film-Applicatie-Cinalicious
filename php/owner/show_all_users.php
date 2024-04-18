<?php
session_start();
include '../includes/db_connection.php';

 ?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/owner/show_all_users.css">
    <title>Cinalicious</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>

  <body>

<!--navbar-->
<div class="sidenav">
  <header>
    <nav>
      <h1>USER CRUD</h1>
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
      <a href="">Users</a>
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
        <th class='bb'>NAME</th>
        <th class='cc'>EMAIL</th>
        <th class='dd'>PASSWORD</th>
        <th class='ee'>ROLE</th>
        <th class='operat'>OPERATIONS</th>
      </tr>
    
      <?php
$sql = "SELECT
users.id,
users.name,
users.email,
users.password,
roles.type
FROM
users
JOIN roles ON users.role_id = roles.id ORDER BY users.id";
$result = mysqli_query($conn, $sql);

if ($result) {
  while ($row = mysqli_fetch_assoc($result)) {
      $id = $row['id'];
      $name = $row['name'];
      $email = $row['email'];
      $password = $row['password'];
      $role_type = $row['type'];
      echo '<tr class="tblrcolor">
            <th scope="row">' . $id . '</th>
            <td>' . $name . '</td>
            <td>' . $email . '</td>
            <td>' . str_repeat("*", strlen($password)) . '</td> <!-- Cover up the password -->
            <td>' . $role_type . '</td>
            <td>
            <a href="user_update.php?updateid=' . $id . '"><button class="upd">Update</button></a>
            <a href="user_delete.php?deleteid=' . $id . '"><button class="del">Delete</button></a>
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
