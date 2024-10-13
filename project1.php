<?php
$insert=false;
$update=false;
$delete=false;
//connect to the database
$servername="localhost";
$username="root";
$password="";
$database="notes";
//create a connection
$conn = mysqli_connect($servername,$username,$password,$database);
if (!$conn) {
  //die if connection was not successful
    die("Connection failed: " . mysqli_connect_error());
}
//else{
 // echo"connect successfully<br>";
//}
//echo"$_SERVER['REQUEST_METHOD']";
if(isset($_GET['delete'])){
$sno= $_GET['delete'];
//$delete=true;
$sql="DELETE FROM `yournotes` WHERE `sno.`='$sno'";
$result=mysqli_query($conn,$sql);
if($result){
  //echo"Record deleted successfully";
 $delete=true;
 }
 else{
   echo"Record has not been deleted successfully due to this error".mysqli_error($conn);
 }
}
if($_SERVER['REQUEST_METHOD']=='POST'){
  if(isset($_POST['snoEdit'])){
  $Sno=$_POST['snoEdit'];
  $title=$_POST['titleEdit'];
 
  $description=$_POST['descriptionEdit'];
  $sql = "UPDATE `yournotes` SET `title`='$title', `discription`='$description' WHERE `sno.`='$Sno'";

  $result=mysqli_query($conn,$sql);
  if($result){
   //echo"Record updated successfully";
  $update=true;
  }
  else{
    echo"Record has not been updated successfully due to this error".mysqli_error($conn);
  }
}
  
   //echo"yes";
   // exit();
  else{
  $title=$_POST['title'];
  $description=$_POST['description'];
  $sql = "INSERT INTO yournotes (title, `discription`) VALUES ('$title', '$description')";

  $result=mysqli_query($conn,$sql);
  if($result){
   // echo"Record inserted successfully";
   $insert=true;
  }
  else{
    echo"Record has not been inserted successfully due to this error".mysqli_error($conn);
  }
}
}
//}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iNOTES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- jQuery CDN -->
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<!-- DataTables CSS CDN -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<!-- DataTables JS CDN -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

  </head>
  <body>
<!-- Button trigger modal -->
<!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>-->

<!-- Modal -->
<div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="EditModal">Edit this Note</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/php/CRUD/project1.php" method="POST">
      <div class="modal-body">
      
       <input type="hidden"name="snoEdit"id="snoEdit">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Note Title</label>
    <input type="text" class="form-control" id="titleEdit" aria-describedby="emailHelp"name="titleEdit">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Note Description</label>
    <textarea class="form-control" id="descriptionEdit" name="descriptionEdit"></textarea>
  </div>
  
 <!-- <button type="submit" class="btn btn-primary">Update Note</button>-->

      </div>
      <div class="modal-footer d-block mr-auto">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
 <!-- <nav class="navbar navbar-expand-lg bg-tertiary navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">iNOTES</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>-->
<?php
if($insert){
  echo"<div class='alert alert-success alert-dismissible fade show' role='alert'>
          <strong>Successfully!</strong> inserted your record: 
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
}
/*else{
  echo"<div class='alert alert-danger alert-dismissible fade show' role='alert'>
          <strong>Error!</strong>your record has not been inserted 
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
}*/
if($update){
  echo"<div class='alert alert-success alert-dismissible fade show' role='alert'>
          <strong>Successfully!</strong> updated your record: 
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
}
if($delete){
  echo"<div class='alert alert-success alert-dismissible fade show' role='alert'>
          <strong>Successfully!</strong> deleted your record: 
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
}


?>
   
    <div class="container mt-4">
    <h1>Add a Note in iNotes App</h1>
    <form action="/php/CRUD/project1.php" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Note Title</label>
    <input type="text" class="form-control" id="title" aria-describedby="emailHelp"name="title">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Note Description</label>
    <textarea class="form-control" id="description" name="description"></textarea>
  </div>
  
  <button type="submit" class="btn btn-primary">Add Note</button>
</form>

    </div>
    <div class="container my-4">
      
      <table class="table"id="myTable"class="display">
  <thead>
    <tr>
      <th scope="col">sno.</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php
$sql="SELECT*FROM yournotes";
$result=mysqli_query($conn,$sql);
$sno=0;
while($row=mysqli_fetch_assoc($result)){
  $sno=$sno+1;
  echo"<tr>
  <th scope='row'>".$sno."</th>
 <td>".$row['title']."</td>
  <td>".$row['discription']."</td>
  <td> <button class='edit btn btn-primary'id=".$row['sno.'].">Edit</button> <button class='delete btn btn-primary' id=d".$row['sno.'].">Delete</button></td>
</tr>";
 // echo $row['sno.']."Title".$row['title']."Description is".$row['discription'];
  //echo"<br>";
}








?>
   <!-- <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>-->
    
  </tbody>
</table>
    </div>
    <hr>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
    
      $(document).ready( function () {
    $('#myTable').DataTable();
} );
              </script>

              <script>
                edits=document.getElementsByClassName('edit');
                Array.from(edits).forEach((element)=>{
                  element.addEventListener("click",(e)=>{
                    console.log("edit",);
                    tr =e.target.parentNode.parentNode;
                    title=tr.getElementsByTagName("td")[0].innerText;
                    description=tr.getElementsByTagName("td")[1].innerText;
                    console.log(title,description);
                    titleEdit.value=title;
                    descriptionEdit.value=description;
                    snoEdit.value=e.target.id;
                    console.log(e.target.id)
                    $('#EditModal').modal('toggle')
                })
                })
                deletes=document.getElementsByClassName('delete');
                Array.from(deletes).forEach((element)=>{
                  element.addEventListener("click",(e)=>{
                    console.log("edit",);
                 sno=e.target.id.substr(1,);
                  if(confirm("do you want to delete this record")){
                    console.log("yes")
                    window.location=`project1.php ?delete=${sno}`;
                  }
                  else{
                    console.log("No");

                  }
                })
                })
                </script>
  </body>
</html>