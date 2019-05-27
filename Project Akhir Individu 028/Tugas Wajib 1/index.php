<?php
include ('action.php');
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
</style>
  </head>
  <body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">CRUD</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

</nav>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <h3 class="text-center text-dark">CRUD Prepared Statement</h3>
      <hr>
      <?php if(isset($_SESSION['response'])){ ?>
      <div class="alert alert-<?=$_SESSION['res_type'];?> alert-dismissible text-center">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <b><?=$_SESSION['response'];?></b>
    </div>
  <?php }unset($_SESSION['response']); ?>
    </div>
  </div>
  <div class="row">
    <div class="col-md-10">
      <h3 class="text-center text-info">Add Mahasiswa</h3>
      <form class="" action="action.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$id;?>">
        <div class="form-group">
          <input type="text" name="name" value="<?=$name;?>" class="form-control" placeholder="Enter Name......" required>
        </div>
        <div class="form-group">
         <input type="text" name="jk" value="<?=$jk;?>" class="form-control" placeholder="Enter JK......" required>
        </div>
        <div class="form-group">
          <input type="text" name="prodi" value="<?=$prodi;?>" class="form-control" placeholder="Enter Prodi......" required>
        </div>
        <div class="form-group">
          <input type="text" name="fakultas" value="<?=$fakultas;?>" class="form-control" placeholder="Enter Fakultas......" required>
        </div>
        <div class="form-group">
          <input type="hidden" name="oldimage" value="<?=$photo;?>">
          <input type="file" name="image" class="custom-file">
          <img src="<?=$photo;?>" width="120"class="img-thumbnail" alt="">
        </div>
        <div class="form-group">
          <?php if($update==true){?>
            <input type="submit" name="update" value="update" class="btn btn-success btn-block">
          <?php }else {?>
          <input type="submit" name="add" value="Add Mahasiswa" class="btn btn-primary btn-block">
          <?php }?>
        </div>
      </form>
    </div>
    <div class="col-md-16 ml-3" style="margin-top:30px;" >
      <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
      <?php
      $query="SELECT * FROM mahasiswa";
      $stmt=$conn->prepare($query);
      $stmt->execute();
      $result=$stmt->get_result();
       ?>
      <h3 class="text-center text-info">Tabel Mahasiswa</h3>
      <table class="table table-hover" id="myTable">
    <thead>
      <tr>
        <th>Id</th>
        <th>Image</th>
        <th>Name</th>
        <th>JK</th>
        <th>Prodi</th>
        <th>Fakultas</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while ($row=$result->fetch_assoc()){?>
      <tr>
        <td><?=$row['id'];?></td>
        <td><img src="<?=$row['photo'];?>" width="30"></td>
        <td><?=$row['name'];?></td>
        <td><?=$row['jk'];?></td>
        <td><?=$row['prodi'];?></td>
        <td><?=$row['fakultas'];?></td>
        <td>
          <a href="details.php?details=<?=$row['id'];?>" class="badge badge-primary ">Details</a> |
          <a href="action.php?delete=<?=$row['id'];?>" class="badge badge-danger">Delete</a> |
          <a href="index.php?edit=<?=$row['id'];?>" class="badge badge-success ">Edit</a>
        </td>
      </tr>
    <?php }?>
    </tbody>
  </table>
    </div>
  </div>
</div>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table= document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || th.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
</body>
</html>
