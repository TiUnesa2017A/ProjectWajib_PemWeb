<?php 
	include_once('koneksi.php');
	if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
		$db->delete('user',array('id'=>$_REQUEST['delId']));
		header('location: user.php?msg=del');
		exit;
	}
?>