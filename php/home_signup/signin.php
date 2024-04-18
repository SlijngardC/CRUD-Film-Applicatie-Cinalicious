<?php
session_start();
include '../includes/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login_credential = $_POST["login_credential"];
    $password = $_POST["password"];

    // Prepare the SQL statement with placeholders
    $sql = "SELECT u.id, u.name, u.email, r.type FROM users u JOIN roles r ON u.role_id = r.id WHERE (u.email = ? OR u.name = ?) AND u.password = ?";
    $stmt = $conn->prepare($sql);

    // Bind the parameters to the placeholders
    $stmt->bind_param("sss", $login_credential, $login_credential, $password);

    // Execute the query
    $stmt->execute();

    // Bind the result variables
    $stmt->bind_result($id, $name, $email, $type);

    // Fetch the result
    $stmt->fetch();

    // Convert the role type to lowercase for case-insensitive comparison
    $type = strtolower($type);

    if ($stmt && $type == "user") {
        $_SESSION["email"] = $email;
        $_SESSION["user_id"] = $id; 
        header("location:../user/userhome.php");
    } elseif ($stmt && $type == "admin") {
        $_SESSION["email"] = $email;
        $_SESSION["user_id"] = $id; 
        $_SESSION["password"] = $password; 
        header("location:../admin/adminhome.php");
    } elseif ($stmt && $type == "owner") {
        $_SESSION["email"] = $email;
        $_SESSION["user_id"] = $id; 
        $_SESSION["password"] = $password; 
        header("location:../owner/ownerhome.php");
      } elseif ($stmt && $type == "banned") {
        $_SESSION["email"] = $email;
        $_SESSION["user_id"] = $id; 
        header("location:banned.php");
    } else {
        $wrong= "Incorrect username or password";
    }

    // Close the statement
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cinalicious</title>
    <link rel="stylesheet" href="../../css/home_signup/index.css">
    <link rel="stylesheet" href="../../css/home_signup/signin.css">
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
        <a  href="signup.php"><button>SignUp</button></a> 
      </div>
</header>

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

<div class="frmcont">
    <form action="" method="POST"> 
    <h1>Login to your account</h1>
    <input type="text" class="logrow" placeholder="Username/Email Address" name="login_credential" value=""  required>
      <input type="password" class="logrow" placeholder="Password" name="password" value=""  required>
      <?php if(isset($wrong)) { ?>
            <p style="color: red"><?php echo $wrong; ?></p>
          <?php } ?>
      <div class="loginbutton">
        <button type="submit" class="loggbtn" name="login">Login</button>
      </div>
    </form>
  </div>


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
  </footer>


   </body>
 </html>
