<?php
   $login=false;
   $showError=false;
   if($_SERVER['REQUEST_METHOD']=='POST'){
    require'conn.php';
       $username=$_POST['username'];
       $password=$_POST['Password'];
      $sql="SELECT * FROM users WHERE username='$username' && Password='$password'";
       //$sql="SELECT * FROM users WHERE username='$username'";
           $result=mysqli_query($conn,$sql);
           $num=mysqli_num_rows($result);
           if($num==1){
           // while($row=mysqli_fetch_assoc($result)){
            //if(password_verify($password,$row['password'])){
             $login=true;
             session_start();
             $_SESSION['loggedin']=true;
             $_SESSION['username']=$username;
             header("location:welcome.php");
            
            }
            else {
              $showError="invaild credentials";
            }
          }
       /* }
         else{
           $showError="invaild credentials";
         }
        }*/
      
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
<?php include"navbar.php";?>
     <?php
if($login){
    echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>successfully!</strong> your are loged in.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';   
}
if($showError){
    echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>error!</strong> invaild credentials
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
'; 
}

      ?>

<div class="container mt-4 col-6 ">
        <h1 class=" text-center"> Login yourself</h1>
<form action="login.php" method="POST">
  <div class="mb-3  col-md-8">
    <label for="uname" class="form-label">username</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
  </div>
  <div class="mb-3  col-md-8">
    <label for="Password" class="form-label">Password</label>
    <input type="password" class="form-control" id="Password"name="Password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</body>
</html>