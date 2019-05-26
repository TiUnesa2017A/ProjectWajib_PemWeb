<?php 
session_start();


class User{

	public $db;
	//////////////////////////////////Fungsi Awalan///////////////////////////////////////
	public function __construct(){
		$user = "root";
		$pass = "";
		$dbnm = "tugas2";
		$host = "localhost";
		try {
	    $this->db = new PDO('mysql:host='.$host.';dbname='.$dbnm, $user, $pass);
		} catch (PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		    die();
		}
	}
	//////////////////////////////////Fungsi Daftar///////////////////////////////////////
	public function daftar($nama,$email,$tipe,$uname,$pass){
		$pw= md5($pass);
		$kode= md5(rand(0,1000));
		$stmt = $this->db-> prepare("INSERT INTO user (nama,email,username,password,status,kode)VALUES(?,?,?,?,?,?)");
	   	$stmt->bindParam(1,$nama);
	    $stmt->bindParam(2,$email);
	    $stmt->bindParam(3,$uname);
	    $stmt->bindParam(4,$pw);
	    $stmt->bindParam(5,$tipe);
	    $stmt->bindParam(6,$kode);
	    if($stmt->execute()){
		$this->kirimaktifasi($kode,$email);
		}
	}
	//////////////////////////////////Fungsi Login///////////////////////////////////////
	public function login($uname,$pass){
		try {
	        $stmt = $this->db->prepare('SELECT * FROM user WHERE username=?');
	        $stmt->bindParam(1,$uname);
	        if($stmt->execute()){
		        $row = $stmt->fetch();
		        $password = $row['password'];
		        $user = $row['username'];
		        $nama = $row['nama'];
		        $tipe = $row['status'];
		        $kode = $row['kode'];
		        $email = $row['email'];
		        $act = $row['aktif'];
		        if (md5($pass)==$password) {
		            if($act=='1'){

		                $_SESSION['nama'] = $nama;
		                $_SESSION['status'] = $tipe;

		                if($tipe=="Guru"){
		                	header("location:Guru.php");
		                }else if($tipe=="Staff"){
		                	header("location:Staff.php");
		                }else if($tipe=="Siswa"){
		                	header("location:Siswa.php");
		                }
		            }else{
		            	$this->kirimaktifasi($kode,$email);
		            	echo '<script type="text/javascript">alert("Akun anda belum diaktifasi. Kami Telah mengirim email aktifasi. silahkan cek inbox email anda");</script>';
		            }
		        }else{
		        	echo '<script type="text/javascript">alert("Password atau Username anda salah !!");</script>';
		        }
	    	}
	    	} catch (PDOException $e) {
	    }
	}
	//////////////////////////////////Fungsi Lupa Password////////////////////////////////////
	public function lupapass($email){
		$stmt = $this->db->prepare('SELECT * FROM user WHERE email=?');
	    $stmt->bindParam(1,$email);
	    if($stmt->execute()){
	    $row = $stmt->fetch();
	    $kode=$row['kode'];
		require 'PHPMailer-5.2-stable/PHPMailerAutoload.php';
	      $isi='<html>
	                <div style="color:black;">
	                <h1>Lupa Password</h1>
	                Hai pengguna,<br>
	                <div style="text-align: justify;">Segera <b>Reset password akun anda</b> dengan cara klik tombol berikut.</div>
	                </div>
	                <br>  
	                <center><a href="localhost/Tugas2_authentikasi/gantipass.php?kode='.$kode.'" style="padding: 15px 100px;background-color:rgb(53, 131, 255);text-decoration:none;border-radius: 5px;"><b style="color: white;">Reset Password</b></a></center>
	                <br>  
	                <div style="text-align: justify;color:black;">Segala bentuk informasi seperti alamat e-mail atau password kamu bersifat rahasia. Jangan menginformasikan data-data tersebut kepada siapapun.</div>
	                <html>';
	    $mail = new PHPMailer;
	    try {
	        $mail->SMTPDebug = 0;                                       
	        $mail->isSMTP();                                            
	        $mail->Host       = 'smtp.gmail.com';                       
	        $mail->SMTPAuth   = true;                                   
	        $mail->Username   = 'itinventory.noreply@gmail.com';                     
	        $mail->Password   = 'itinventory2019';                               
	        $mail->SMTPSecure = 'ssl';                                  
	        $mail->Port       = 465;                                    

	        $mail->setFrom('mail@noreply.itinventory.com', 'IT Inventory');
	        $mail->addAddress($email, "");
	        $mail->addBCC('bcc@example.com');

	        $mail->isHTML(true);                                  
	        $mail->Subject = "Reset Password";
	        $mail->Body    = $isi;
	        $mail->send();
	        echo '<script type="text/javascript">alert("Permintaan Reset Password telah dikirim. Silahkan cek email anda");</script>';
	        header("Refresh:0");
	  } catch (Exception $e) {
	      //echo "Email Gagal Terkirim";
	  }
	}
  }
  	//////////////////////////////////Fungsi Ganti Password///////////////////////////////////////
	public function gantipass($pass,$kode){
		$password=md5($pass);
		$stmt = $this->db-> prepare("UPDATE user SET password = ? WHERE kode = ?");
		$stmt->bindParam(1,$password);
		$stmt->bindParam(2,$kode);
		$stmt->execute();
		header("Refresh:0");
	}
	//////////////////////////////////Fungsi Aktifasi////////////////////////////////////////////
	public function aktifasi($kode){
		$aktif=1;
		$stmt = $this->db-> prepare("UPDATE user SET aktif = ? WHERE kode = ?");
		$stmt->bindParam(1,$aktif);
		$stmt->bindParam(2,$kode);
		$stmt->execute();
		header("Refresh:0");
	}
	//////////////////////////////////Fungsi Kirim Aktifasi////////////////////////////////////////////
	public function kirimaktifasi($kode,$email){
		require 'PHPMailer-5.2-stable/PHPMailerAutoload.php';
	      $isi='<html>
	                <div style="color:black;">
	                <h1>Aktifasi</h1>
	                Hai pengguna,<br>
	                <div style="text-align: justify;">Segera <b>Aktfasi akun anda</b> dengan cara klik tombol berikut.</div>
	                </div>
	                <br>  
	                <center><a href="localhost/Tugas2_authentikasi/aktifasi.php?kode='.$kode.'" style="padding: 15px 100px;background-color:rgb(53, 131, 255);text-decoration:none;border-radius: 5px;"><b style="color: white;">Aktifasi</b></a></center>
	                <br>  
	                <div style="text-align: justify;color:black;">Segala bentuk informasi seperti alamat e-mail atau password kamu bersifat rahasia. Jangan menginformasikan data-data tersebut kepada siapapun.</div>
	                <html>';
	    $mail = new PHPMailer;
	    try {
	        $mail->SMTPDebug = 0;                                       
	        $mail->isSMTP();                                            
	        $mail->Host       = 'smtp.gmail.com';                       
	        $mail->SMTPAuth   = true;                                   
	        $mail->Username   = 'itinventory.noreply@gmail.com';                     
	        $mail->Password   = 'itinventory2019';                               
	        $mail->SMTPSecure = 'ssl';                                  
	        $mail->Port       = 465;                                    

	        $mail->setFrom('mail@noreply.itinventory.com', 'IT Inventory');
	        $mail->addAddress($email, "");
	        $mail->addBCC('bcc@example.com');

	        $mail->isHTML(true);                                  
	        $mail->Subject = "Aktifasi";
	        $mail->Body    = $isi;
	        $mail->send();
	        header("Refresh:0");
	        //echo 'Email Terkirim';
	  } catch (Exception $e) {
	     // echo "Email Gagal Terkirim";
	  }
	}
	public function getIP(){
 
    if (isset($_SERVER)) {
 
        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
            return $_SERVER["HTTP_X_FORWARDED_FOR"];
 
        if (isset($_SERVER["HTTP_CLIENT_IP"]))
            return $_SERVER["HTTP_CLIENT_IP"];
 
        return $_SERVER["REMOTE_ADDR"];
    }
 
    if (getenv('HTTP_X_FORWARDED_FOR'))
        return getenv('HTTP_X_FORWARDED_FOR');
 
    if (getenv('HTTP_CLIENT_IP'))
        return getenv('HTTP_CLIENT_IP');
 
    return getenv('REMOTE_ADDR');
	}
// echo "<h2 align=\"center\">Your IP Address ".getClientIP()."";
	
}


 ?>