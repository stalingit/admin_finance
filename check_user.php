<?php
session_start();
include 'db_connect.php';

$username= $_POST['username'];
$password= md5($_POST['password']);

$query = mysqli_query($conn,"select * from users where username ='$username' AND password= '$password'");

if(mysqli_num_rows($query) > 0){
	while($row = mysqli_fetch_array($query)){
        $_SESSION['userid']= $row['id'];
        $_SESSION['usertype']= $row['typeid'];
		echo 1;
	}
}else{
	echo 0;
}

mysqli_close($conn);

?>