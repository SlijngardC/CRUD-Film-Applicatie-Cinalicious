<?php
session_start();
// for this to work you need to be logged in if your not logged in you will get a faild user_id error becaulse then the user id isn't stored into the session

include '../includes/db_connection.php';

$id=$_SESSION['user_id'];
$sql="SELECT * FROM users WHERE id=$id";
$result = mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$email=$row['email'];
$password=$row['password'];
$role_id=$row['role_id'];

if(isset($_POST['submit'])) {
    $current_password = $_POST['current_password'];
    if ($current_password == $password) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $new_password = $_POST['new_password'];

        $sql = "UPDATE users SET name='$name', email='$email', password='$new_password' WHERE id=$id";
        $result = mysqli_query($conn,$sql);
        if($result){
          $success= "Successfully updated your password";
        }else{
            die(mysqli_error($conn));
        }
    } else {
        $wrong= "Invalid current password. Please try again.";
    }

    $conn->close();
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/user/account.css">
    <title>Cinalicious</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>

  <body>


 <!--navbar-->
 <header>
    <img src="../../img/Icons/cina_basic.png" alt="" class="logo">
      <nav>
       <ul class="nav__links">
    
      
        <li><a href='userhome.php'>Home</a></li>
        <li><a href='userhome.php #movies-section'>Movies</a></li>
        <li><a href='../../html/about_us.html'>About Us</a></li>
      

        <li><a class='btn1' href='logout.php'><button>LogOut</button></a></li>;
        </ul>
       </nav>

       </header>
    
       <div class="studcontainer">
      <form action="" method="POST">
        <h1>Update your account</h1>
        <input type="text" class="form-control" placeholder="name" name="name" value="<?php echo $name ?>"><br>
        <input type="text" class="form-con" placeholder="email" name="email" value="<?php echo $email ?>"><br>
        <input type="password" class="form-control" placeholder="current password" name="current_password" required><br>
        <input type="password" class="form-control" placeholder="new password" name="new_password"><br>
        <div class="buterr">
        <div class="errr">
        <?php if(isset($success)) { ?>
          <p style="color: green"><?php echo $success; ?></p>
        <?php } ?>
        <?php if(isset($wrong)) { ?>
          <p style="color: red"><?php echo $wrong; ?></p>
        <?php } ?>
        </div>
        <div class="signupbutton">
          <button type="submit" class="bttnup" name="submit">Update</button>
        </div>
        </div>
      </form>
    </div>



   <script>
    window.addEventListener("scroll", function(){
      var header = document.querySelector("header");
      header.classList.toggle("sticky", window.scrollY > 0);
    })
    </script>

  <footer>
  <div class="foootercontainer">
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

