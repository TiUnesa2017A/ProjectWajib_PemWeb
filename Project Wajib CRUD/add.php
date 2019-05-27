<html>
<head>
    <title>Add Users</title>
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

    <form action="add.php" method="post" name="form1" enctype="multipart/form-data">
        <table width="25%" border="0">
            <tr> 
                <td>No Induk</td>
                <td><input type="text" name="nim"></td>
            </tr>
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="namamhs"></td>
            </tr>
            <tr> 
                <td>Foto</td>
                <td><input type="file" name="image_name"></td>
            </tr>
            <tr> 
                <td>Jenis Kelamin</td>
                <td><input type="text" name="jk"></td>
            </tr>
            <tr> 
                <td>Prodi</td>
                <td><input type="text" name="prodi"></td>
            </tr>
            <tr> 
                <td>Fakultas</td>
                <td><input type="text" name="fakultas"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input style="margin-top: 8%;" class="button" type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

    <?php
      
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $nim = $_POST['nim'];
        $namamhs = $_POST['namamhs'];
        $jk = $_POST['jk'];
        $prodi = $_POST['prodi'];
        $fakultas = $_POST['fakultas'];

        
        $namaFile   =$_FILES['image_name']['name'];
        
        $namaSementara = $_FILES['image_name']['tmp_name']; //SQL Injection defence!
        $dirUpload = "img/";
        $image_name = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
        // include koneksi ke file database sss
      include_once("config.php");

        // memasukkan data ke tabel database
        $result = mysqli_query($mysqli, "INSERT INTO mhs (nim,namamhs,jk,prodi,fakultas,image_name) VALUES('$nim','$namamhs','$jk','$prodi','$fakultas','$namaFile');");

        // Show message when user added
        echo "User added successfully. <a href='index.php'>View Users</a>";
    }
    ?>
</body>
</html>