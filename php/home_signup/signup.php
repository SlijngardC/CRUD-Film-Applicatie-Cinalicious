<?php
session_start();
include '../includes/db_connection.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Get the role ID of the "users" role from the roles table
    $sql_role = "SELECT id FROM roles WHERE type = 'user'";
    $result_role = $conn->query($sql_role);

    if ($result_role !== false) {
        if ($result_role->num_rows > 0) {
            $row_role = $result_role->fetch_assoc();
            $role_id = $row_role['id'];

            // Insert the new user with the role ID from the roles table
            $sql = "INSERT INTO users(name, email, password, role_id) VALUES ('$name', '$email', '$password', '$role_id')";
            $result = $conn->query($sql);

            if ($result) {
                header("Location: signin.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error: Failed to retrieve the role ID for 'users' role.";
        }
    } else {
        echo "Error executing the query: " . $conn->error;
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cinalicious</title>
    <link rel="stylesheet" href="../../css/home_signup/signup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>


<body>
 

<header>
  <img src="../../img/Icons/cina_basic.png" alt="" class="logo">
  <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
      <div class="cta">
      <a class="btn1" href="index.php"><button>home</button></a> 
        <a  href="signin.php"><button>SignIn</button></a> 
      </div>
</header>


       <div class="frmcontainer">
         <div class="jumbotron">
           <form action="" method="POST">
             <h1>Create an account</h1>
             <p>It's free and always will be. </p> <br>
           <input type="text" class="inp" placeholder="username" name="name"  required>
           <input type="email" class="inp" placeholder="Email Address" name="email"  required>
           <input type="password" class="inp" placeholder="Password" name="password"  required>

                 <div class="signupbutton">
                   <br><br>
                   <button type="submit" class="btn" name="submit">Sign Up</button>
                 </div>
             </div>
           </form>
         </div>
       </div>
  

    <script>
        window.addEventListener("scroll", function(){
          var header = document.querySelector("header");
          header.classList.toggle("sticky", window.scrollY > 0);
        })
        </script>
    
    <script>
      const hamburger = document.querySelector('.hamburger');
    const cta = document.querySelector('.cta');
    
    hamburger.addEventListener('click', () => {
        cta.classList.toggle('active');
    });
    </script>

<footer>
  <div class="footercontainer">
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
   </body>
 </html>
