<?php
session_start();
include 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->

  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.jqueryui.min.css">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.10.19/js/dataTables.jqueryui.min.js"></script>

  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
 
</head>
<body>
	<?php 
	$userid= $_SESSION['userid'];
	$qry= mysqli_query($conn,"select * from users where id=$userid");
	$result=mysqli_fetch_array($qry);
	$decode_userinfo= json_decode($result['user_info']);
?>

<div class="container">
  <h2><?php echo "Hello " .$decode_userinfo->first_name;?></h2><a href="logout.php">Logout</a> | 
  <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>            
 <?php
if($_SESSION['usertype'] == 1){ ?>
<a href="form_fieldofficer.php">Add Field Officer</a>

		<table id="example" class="display" style="width:100%">
			<thead>
			 <tr>
			 	<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Action</th>
				<th>View Customers</th>
			  </tr>
			</thead>  
			<tbody>
		   	<?php
   		    $query = mysqli_query($conn,"select * from users where typeid =2");
			if(mysqli_num_rows($query) > 0){
				while($res=mysqli_fetch_array($query))
				{
					$decode_data= json_decode($res['user_info']);
					?>
					
					<tr>
					<td><?=$decode_data->first_name;?></td>
					<td><?=$decode_data->last_name;?></td>
					<td><?=$decode_data->email;?></td>
					<td><?=$decode_data->phone;?></td>
					<td><a href="edit_fieldofficer.php?userid=<?php echo $res['id'];?>">Edit</a> | 
					   <a href="delete.php?id=<?php echo $res['id'];?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a></td>
					<td><a href="javascript:;" onClick="view_customer_list(<?=$res['id'];?>)">View</a></td>
				   </tr>
				  
				   
			<?php }
			}else{
				echo "No data";
			}
		
		?>
		 </tbody>
		</table>
		<div id="customer_list"></div>
		
<?php } elseif($_SESSION['usertype'] == 2){?>
<a href="form_customer.php">Add Customer</a>
<br><br>
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
		  </tr>
		   <?php
   		    $query = mysqli_query($conn,"select * from users where (user_info like '%".'"fieldofficer_id"'.":".'%"'.$_SESSION['userid'].'%"'."%' ) and typeid =3");
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
					
				   </tr>
			<?php }
			}else{
				echo "No data";
			}
		
		?>
		</table>
		
<?php } ?>
</div>
 <script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<script type="text/javascript">
function view_customer_list(userid)
{
    $.ajax({
	   type: "POST",
	   url: "view_customer_list",
	   data: {userid:userid},
	   success: function(data){
		 $("#customer_list").html(data);
	   }
		   
	 });
}

</script>
</body>
</html>
