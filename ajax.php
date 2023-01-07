<?php

$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();

if($action == 'login'){
	$login = $crud->login();
	if($login)
		echo $login;
}
if($action == 'logout'){
	$logout = $crud->logout();
	if($logout)
		echo $logout;
}
if($action == 'save_movie'){
	$logout = $crud->save_movie();
	if($logout)
		echo $logout;
}
if($action == 'delete_movie'){
	$delete = $crud->delete_movie();
	if($delete)
		echo $delete;
}
