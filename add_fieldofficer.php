<?php
session_start();
include 'db_connect.php';

$data= array(   
	'first_name' => $_POST['fname'],
	'last_name' => $_POST['lname'],
	'email' => $_POST['email'],
	'phone' => $_POST['phone'],
	'address' => $_POST['address'],
	'created_date' => date('Y-m-d')
  );
$userinfo = json_encode($data);
$usertype=$_POST['usertype'];
$username= $_POST['username'];
$password= md5($_POST['password']);
  $query1 = mysqli_query($conn,"INSERT INTO users(typeid, username, password, user_info) VALUES('$usertype','$username','$password','$userinfo');")or die("query error ".mysqli_error($conn));
	if($query1){
		echo 1;
	}else{
		echo 0;
	}

mysqli_close($conn);

?>