<?php
$server="localhost";
$username="root";
$password="";
$database="user";
$conn=mysqli_connect( $server, $username, $password, $database );
if(!$conn){
    die("database is note connected");
}
else{
  //  echo"connected successfully";
}
?>