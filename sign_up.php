<?php 
$showalert=false;
$showerror=false;
    if($_SERVER['REQUEST_METHOD']=='POST'){
      require'conn.php';
        $username=$_POST['username'];
        $password=$_POST['Password'];
        $cpassword=$_POST['cPassword'];
        //$exists=false;
        $existsql="SELECT * FROM users WHERE username='$username'";
        $result=mysqli_query($conn,$existsql);
        $numExistsRows=mysqli_num_rows($result);
        if($numExistsRows>0){
          $showerror="Username already exists";
        }
        else{
        if($password==$cpassword){
          //used to hide your passwoed 
         // $hash=password_hash($password,PASSWORD_DEFAULT);
        //$sql="INSERT INTO users (username,password) VALUES ('$username','$hash')";
        $sql="INSERT INTO users (username,password) VALUES ('$username','$password')";
            $result=mysqli_query($conn,$sql);
       
            if($result){
              $showalert=true;
            }
          }
          else{
            $showerror="passwords donot match";
          }
        }
  }
  ?>
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
</head>
<body>
<?php include"navbar.php";?>
<?php
    if($showalert){
echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>successfully!</strong> your account has been created now you can log in.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
       ';    }
      /* else{
        echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>ERROR!</strong> failed to insert data.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
       ';  
       }*/
      if($showerror){
        echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>error!</strong> ' .$showerror.
           ' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
       '; 
      }
    ?>
    <div class="container mt-4 col-6 ">
        <h1 class=" text-center"> sign up yourself</h1>
<form action="sign_up.php" method="POST">
  <div class="mb-3  col-md-8">
    <label for="uname" class="form-label">username</label>
    <input type="text" maxlength="20" class="form-control" id="username" name="username" aria-describedby="emailHelp">
  </div>
  <div class="mb-3  col-md-8">
    <label for="Password" class="form-label">Password</label>
    <input type="password"maxlength="10" class="form-control" id="Password"name="Password">
  </div>
  <div class="mb-2  col-md-8">
    <label for="Password1" class="form-label">confirm password</label>
    <input type="password" class="form-control" id="cPassword"name="cPassword">
  </div>
  <div id="emailHelp" class="form-text mb-3 ">Make sure your password is same.</div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</body>
</html>

