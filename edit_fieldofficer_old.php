<?php
session_start();
include 'db_connect.php';
$id=$_GET['userid'];

 $query = mysqli_query($conn,"select * from users where id= $id") or die("query error".mysqli_error($conn));
 if(mysqli_num_rows($query) > 0){
	  while($res= mysqli_fetch_array($query)){
		  $decode_userinfo =json_decode($res['user_info']);
		  
		 $fname= $decode_userinfo->first_name;
		 $lname= $decode_userinfo->last_name;
		 $email= $decode_userinfo->email;
		 $phone= $decode_userinfo->phone;
		 $address= $decode_userinfo->address;
		 $uid= $res["id"];
	    }
	 }
	 mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
<title>Update Form</title>
</head>
<body>
<br><br>

<br><br>
<div id="errormsg"></div>
<a href="dashboard.php">Back</a>

<form method="post" name="UpdateForm" id="UpdateForm">
<h3>Update User </h3>
	<input type="text" name="fname" id="fname" value="<?=$fname;?>"><br><br>
	<input type="text" name="lname" id="lname" value="<?=$lname;?>"><br><br>
	<input type="email" name="email" id="email" value="<?=$email;?>"><br><br>
	
	<input type="text" name="phone" id="phone" value="<?=$phone;?>"><br><br>
	<input type="text" name="address" id="address" value="<?=$address;?>"><br><br>
	<input type="hidden" name="uid" id="uid" value="<?=$uid;?>"><br><br>


	<input type="submit" name="updateBtn" id="updateBtn" value="submit"><br>
 </form>
 
 
 
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>		
<script type="text/javascript">
$("#UpdateForm").submit(function(e){
	 e.preventDefault();
		var form = new FormData($("#UpdateForm")[0]);
		$.ajax({
			type: 'POST',
			url: 'update_user',
			data: form,
			processData: false,
			contentType:false,
			success: function (data) {
				if(data == 1){
				   location.href = "dashboard.php";
				}else if(data == 0){
					$("#errormsg").fadeIn().html("<div class='alert alert-danger'>* Oops something went wrong</div>");
				}
			}
		});
	return true;	
});
</script>
 
</body>
</html>