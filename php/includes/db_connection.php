<?php

$conn=mysqli_connect("localhost","root","","cinalicious");

if (!$conn){
  die("error detected" . mysqli_error());
}
else {
  //echo "connection was successful";
}

?>