<?php 
include_once('config.php');
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('users',array('id'=>$_REQUEST['delId']));
	header('location: telusuri.php?msg=rds');
	exit;
}
?>