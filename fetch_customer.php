<?php
session_start();
include 'db_connect.php';

$query = mysqli_query($conn,"select * from users where (user_info like '%".'"fieldofficer_id"'.":".'%"'.$_POST['userid'].'%"'."%' ) and typeid =3");
if(mysqli_num_rows($query) > 0){
		  
while($res=mysqli_fetch_array($query))
	{
		$decode_data= json_decode($res['user_info']);
		
		echo '<td>'.$decode_data->first_name.'</td>';
		echo '<td>'.$decode_data->last_name.'</td>';
		echo '<td>'.$decode_data->email.'</td>';
		echo '<td>'.$decode_data->phone.'</td>';
		echo '<td>'.$decode_data->address.'</td>';
		echo '<td>'.$decode_data->loanstart_date.'</td>';
		echo '<td>'.decode_data->loan_amount.'</td>';
		echo '<td>'.$decode_data->interest_percent.'</td>';
		echo '<td>'.$decode_data->balance_amount.'</td>';
 }
}else{
	echo "No data";
}
		
?>

