<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM mhs ORDER BY id DESC");
?>

<html>
<head>    
    <title>Homepage</title>
    <style type="text/css">
    body {
    	font-family: arial;
  background-color: #999999;
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
}

.button:hover{
    background-color: white;
  color: black;
}
.button1 { margin: 26px; margin-left: 5%; width: 250px; font-size: 130%;}
div{
    background-color: #595959;
}
table {
	text-align: center;
	background-color: white;
	font-size: 130%;
    border-collapse: collapse;
}
tr:nth-child(even) {background-color: #f2f2f2;}
td{
	padding: 10px;
}
th{ 
    padding: 1%;
	background-color: #4CAF50;
  color: white;
}
h2{
    width:100%;
    text-align: center;
    font-size: 50px;
    color:white;
    padding-top: 35px;
}



    </style>
</head>

<body>

<div>
<h2>DATA MAHASISWA</h2>
<input type="button" class="button button1" value="Add New User" onclick="window.location = 'add.php';"/>
</div>



    <table width='90%'  align="center">

    <tr >
        <th>No Induk</th> <th>Foto</th> <th>Nama</th> <th>Jenis Kelamin</th> <th>Prodi</th> <th>Fakultas</th> <th>Aksi</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['nim']."</td>";
        ?>
        <td><img src="img/<?php echo $user_data['image_name']; ?>" width="250" ></td>

        <?php
        echo "<td>".$user_data['namamhs']."</td>";
        echo "<td>".$user_data['jk']."</td>";
        echo "<td>".$user_data['prodi']."</td>";
        echo "<td>".$user_data['fakultas']."</td>" ;   
        echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
</body>
</html>