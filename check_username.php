<?php
session_start();
include 'db_connect.php';

$username= $_POST['username'];

$query = mysqli_query($conn,"select * from users where username ='$username'");

if(mysqli_num_rows($query) > 0){
	echo 1;
}else{
	echo 0;
}

mysqli_close($conn);

?>