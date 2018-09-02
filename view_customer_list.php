<?php
session_start();
include 'db_connect.php';
if($_SESSION['usertype'] == 1){
?>
<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
</head>
<body>

<br><br>
	<h4>Customer List</h4>	
		<table border="1px;" cellspacing="0px;">
		 <tr>
		 	<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Address</th>
			<th>Load Start Date</th>
			<th>Loan Amount</th>
			<th>Interest (%)</th>
			<th>Balance Amount</th>
			<th>Action</th>
		  </tr>
		   <?php
   		    $query = mysqli_query($conn,"select * from users where (user_info like '%".'"fieldofficer_id"'.":".'%"'.$_POST['userid'].'%"'."%' ) and typeid =3");
			if(mysqli_num_rows($query) > 0){?>
		  
			<?php while($res=mysqli_fetch_array($query))
				{
					$decode_data= json_decode($res['user_info']);
					?>
					<tr>
					<td><?=$decode_data->first_name;?></td>
					<td><?=$decode_data->last_name;?></td>
					<td><?=$decode_data->email;?></td>
					<td><?=$decode_data->phone;?></td>
					<td><?=$decode_data->address;?></td>
					<td><?=$decode_data->loanstart_date;?></td>
					<td><?=$decode_data->loan_amount;?></td>
					<td><?=$decode_data->interest_percent;?></td>
					<td><?=$decode_data->balance_amount;?></td>
					<td>
					<?php if(array_key_exists('is_approved', $decode_data))
					{
					
					}else{?>
					  <a href="customer_approve.php?id=<?php echo $res['id']?>">Approve</a>
					<?php } ?>
					</td>
				   </tr>
			<?php }
			}else{
				echo "No data";
			}
		
		?>
		</table>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		
<script type="text/javascript">
</script>
</body>
</html>
<?php } ?>
