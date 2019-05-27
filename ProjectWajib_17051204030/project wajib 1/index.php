<?php
include ('action.php');
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">CRUD Prepared Statement</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

</nav>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <hr>
      <?php if(isset($_SESSION['response'])){ ?>
      <div class="alert alert-<?=$_SESSION['res_type'];?> alert-dismissible text-center">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <b><?=$_SESSION['response'];?></b>
    </div>
  <?php }unset($_SESSION['response']); ?>
    </div>
  </div>
  <div class="container">
    <div class="col-md-12">
      <h3 class="text-center text-info">Add Mahasiswa</h3>
      <form class="" action="action.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$id;?>">
        <div class="form-group">
          <input type="text" name="name" value="<?=$name;?>" class="form-control" placeholder="Enter Name......" required>
        </div>
        <div class="form-group">
         <input type="text" name="jk" value="<?=$jk;?>" class="form-control" placeholder="Enter JK......" required>
          <!--<label for="jk" class="col-sm-5 control-label">Jenis Kelamin</label>
          <div class="col-sm-8">
            <label>
              <input type="radio" name="jk" value="<?=$jk;?>" checked> Laki Laki
            </label>
            <label>
              <input type="radio" name="jk" value="<?=$jk;?>"> Perempuan
            </label>
          </div>-->
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
            <input type="submit" name="update" value="Update Data Mahasiswa" class="btn btn-success btn-block">
          <?php }else {?>
          <input type="submit" name="add" value="Add Data Mahasiswa" class="btn btn-success btn-block">
          <?php }?>
        </div>
      </form>
      <a href="browse-users.php">
          <button class="btn btn-primary btn-block">View Data Mahasiswa</button>
        </a>
    </div>
    <div class="col-md-16" style="margin-top:30px;">
      <!--<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">-->
      <form action="action.php" method="get">
</form>
    </tbody>
  </table>
    </div>
  </div>
</div>

<!--<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>-->
</body>
</html>
