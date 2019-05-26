<?php 
include_once('config.php');
if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
	$db->delete('users',array('id'=>$_REQUEST['id']));
	header('location: daftarmahasiswa.php?msg=del');
	exit;
}
?>