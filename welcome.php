
<?php

session_start();
if(! isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!=true){
    header("location:login.php");
    exit;
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome-<?php echo $_SESSION['username'];?></title>
    <style>
        p{
            font-size:15px;
            text-align:center;
        }
    .heading{
            padding-left:90px;
            color:blue;
            display:flex;
        }
        h3{
            color:black;
        }
        </style>
</head>
<body>
<?php
include'navbar.php';
?><div class="heading">
<h2>welcome-</h2><?php echo "<h3>".$_SESSION['username']."</h3>";?></div>
<?php
echo"<br>";
include'project1.php';
?>
<p>Thank you for visiting our website.I hope this is helpful for you.<br><br>
If you want to log out
<a  href="logout.php"> click here</a></p>
</body>
</html>