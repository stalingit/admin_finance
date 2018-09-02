<?php
session_start();
include 'db_connect.php';

$uid= $_GET['id'];
$query = mysqli_query($conn,"select * from users where id= $uid");
if(mysqli_num_rows($query) > 0)
{
	while($row= mysqli_fetch_array($query))
	{
		$decode_userdata = json_decode($row['user_info']);
		$update = array(
		  "first_name" => $decode_userdata->first_name,
		  "last_name" => $decode_userdata->last_name,
		  "email" => $decode_userdata->email,
		  "phone" => $decode_userdata->phone,
		  "address" => $decode_userdata->address,
		  "loanstart_date" => $decode_userdata->loanstart_date,
		  "loan_amount" => $decode_userdata->loan_amount,
		  "interest_percent" => $decode_userdata->interest_percent,
		  "balance_amount" => $decode_userdata->balance_amount,
		  "fieldofficer_id" => $decode_userdata->fieldofficer_id,
		  'is_approved' => 1
		);
		$user=json_encode($update);
	  $query1 = mysqli_query($conn,"UPDATE users SET user_info='$user' WHERE id=$uid") or die("query error".mysqli_error($conn));
		
	}
	
}

mysqli_close($conn);
?>