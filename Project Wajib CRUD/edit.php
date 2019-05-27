<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $id = $_POST['id'];

    $nim=$_POST['nim'];
    $namamhs=$_POST['namamhs'];
    $foto=$_POST['foto'];
    $jk=$_POST['jk'];
    $prodi=$_POST['prodi'];
    $fakultas=$_POST['fakultas'];


        $namaFile   =$_FILES['image_name']['name'];
        $namaSementara = $_FILES['image_name']['tmp_name']; 
        $dirUpload = "img/";
        $image_name = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

    // update user data
    $result = mysqli_query($mysqli, "UPDATE mhs SET nim='$nim',namamhs='$namamhs',jk='$jk',prodi='$prodi',fakultas='$fakultas',image_name='$namaFile' WHERE id=$id");

    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM mhs WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{
    $nim = $user_data['nim'];
    $namamhs = $user_data['namamhs'];
    $jk = $user_data['jk'];
    $prodi = $user_data['prodi'];
    $fakultas = $user_data['fakultas'];
}
?>
<html>
<head>  
    <title>Edit User Data</title>
       <style type="text/css">
body{
     font-family: arial;
     
}
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
   box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
   border-radius: 12px;
   font-size: 130%;
}

.button:hover{
    background-color: white;
  color: black;
}
td{
    min-width: 200px;
    padding-bottom: 23px;

}
.button1 { margin: 26px; margin-left: 5%; width: 250px; }

table{
    font-size: 150%;
    margin-top: 5%;
    margin-left: 5%;
    margin-right: 60%;
}

input[type=text] {
  width: 100%;
    height: 50px;
  box-sizing: border-box;
} 
div{
    background-color: #595959;
}
tr:nth-child(even) {background-color: #f2f2f2;}
    </style>
</head>

<body>
<div>
    <input type="button" class="button button1" value="Go to home" onclick="window.location = 'index.php';"/>
</div>
    

    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>No Induk</td>
                <td><input type="text" name="nim" value=<?php echo $nim;?>></td>
            </tr>
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="namamhs" value=<?php echo $namamhs;?>></td>
            </tr>
            <tr> 
                <td>Foto</td>
                <td><input type="file" name="image_name" ></td>
            </tr>
             <tr> 
                <td>Jenis Kelamin</td>
                <td><input type="text" name="jk" value=<?php echo $jk;?>></td>
            </tr>
             <tr> 
                <td>Prodi</td>
                <td><input type="text" name="prodi" value=<?php echo $prodi;?>></td>
            </tr>
             <tr> 
                <td>Fakultas</td>
                <td><input type="text" name="fakultas" value=<?php echo $fakultas;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input style="margin-top: 8%;" class="button" type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>