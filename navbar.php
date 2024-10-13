<?php
//session_start();
$loggedin = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true; 
    /*if! isset($_SESSION['loggedin'])&& $_SESSION['loggedin']===true;{
    
      $loggedin=true;
    }
    else{
      $loggedin=false;
    }*/?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      .custom-hover-effect:hover{
        font-size:18px;
      }
    </style>
  </head>
  <body><?php
  echo'
  <nav class="navbar navbar-expand-lg  navbar-dark bg-dark ">
  <div class="container-fluid ">
    <a class="navbar-brand " href="#">iNOTES</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
       <li class="nav-item custom-hover-effect">
        <a class="nav-link active"href="welcome.php">welcome</a>
        </li>
      ';
     /* if(!$loggedin){
        echo'
        <li class="nav-item custom-hover-effect">
    
        <a class="nav-link active" aria-current="page" href="sign_up.php">sign up</a>
        </li>
        <li class="nav-item custom-hover-effect">
          <a class="nav-link active" href="login.php">login</a>
        </li>';}
        if($loggedin){ 
          echo'<li class="nav-item custom-hover-effect">
             <a class=" log nav-link "href="logout.php">logout</a>
           </li>';
           
            } */
            if (!$loggedin) {
              echo '
              <a class="btn btn-outline-primary me-2" href="sign_up.php">Sign Up</a>
              <a class="btn btn-outline-primary" href="login.php">Login</a>
              ';
            }
            if ($loggedin) {
              echo '
              <a class="btn btn-outline-danger" href="logout.php">Logout</a>
              ';
            }
       
     echo' </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>';?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   <script>
 let logout=document.querySelector('.log');
 if(logout){
 logout.addEventListener('click',function(event){
 const confirmlogout=confirm("Do you want to log out");
 if(!confirmlogout){
  event.preventDefault();
 }
 });
}

   </script>
   </body>
</html>
