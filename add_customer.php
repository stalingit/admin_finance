<?php
session_start();
include 'db_connect.php';

$data= array(   
	'first_name' => $_POST['fname'],
	'last_name' => $_POST['lname'],
	'email' => $_POST['email'],
	'phone' => $_POST['phone'],
	'address' => $_POST['address'],
	'loanstart_date' => $_POST['loanstart_date'],
	'loan_amount' => $_POST['loan_amount'],
	'interest_percent' => $_POST['interest_percent'],
	'balance_amount' => $_POST['balance_amount'],
	'fieldofficer_id' =>  $_SESSION['userid']
  );
$userinfo = json_encode($data);
$usertype=$_POST['usertype'];
/*$usertype=$_POST['usertype'];
$username= $_POST['username'];
$password= md5($_POST['password']);*/

  $query1 = mysqli_query($conn,"INSERT INTO users(typeid, user_info) VALUES('$usertype','$userinfo');");
	if($query1){
		echo 1;
	}else{
		echo 0;
	}

mysqli_close($conn);

?>