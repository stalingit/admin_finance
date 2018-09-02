<?php
session_start();
include 'db_connect.php';

$uid= $_POST['uid'];
$query = mysqli_query($conn,"select * from users where id= $uid");



if(mysqli_num_rows($query) > 0)
{
	while($row= mysqli_fetch_array($query))
	{
		$decode_userdata = json_decode($row['user_info']);
		$created_date = $decode_userdata->created_date;
		$update = array(
		  "first_name" => $_POST['fname'],
		  "last_name" => $_POST['lname'],
		  "email" => $_POST['email'],
		  "phone" => $_POST['phone'],
		  "address" => $_POST['address'],
		  "created_date" => $created_date 
		);
		$user=json_encode($update);
	  $query1 = mysqli_query($conn,"UPDATE users SET user_info='$user' WHERE id=$uid") or die("query error".mysqli_error($conn));
	 
		if($query1)
		{
			echo 1;
		}else{
			echo 0;
		}
	}
	
}

   

mysqli_close($conn);
?>