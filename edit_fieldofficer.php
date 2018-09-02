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
<html lang="en">
<head>
  <title>Update Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</head>
<body>
<div id="errormsg"></div>
<a href="dashboard.php">Back</a>
<div class="container">
  <h2 style="text-align: center">Update Form </h2>
  <form class="form-horizontal"  name="UpdateForm" id="UpdateForm" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="fname">First Name:</label>
      <div class="col-sm-10">
        <input type="type" class="form-control" id="fname" placeholder="Enter First Name" name="fname" value="<?php echo $fname;?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="lname">Password:</label>
      <div class="col-sm-10">          
        <input type="type" class="form-control" id="lname" placeholder="Enter Last Name" name="lname" value="<?php echo $lname;?>">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">          
        <input type="type" class="form-control" id="email" placeholder="Enter Last Name" name="email" value="<?php echo $email;?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="phone">Phone:</label>
      <div class="col-sm-10">          
        <input type="type" class="form-control" id="phone" placeholder="Enter Phone No" name="phone" value="<?php echo $phone;?>">
      </div>
    </div>


<div class="form-group">
      <label class="control-label col-sm-2" for="address">Address:</label>
      <div class="col-sm-10">          
        <textarea class="form-control" name="address" id="address" rows="5" id="comment"><?php echo $address;?></textarea>
      </div>
    </div>
     <input type="hidden" name="uid" id="uid" value="<?php echo $uid;?>">





    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit"  name="updateBtn" id="updateBtn" class="btn btn-default" value="Submit">
      </div>
    </div>
  </form>
</div>
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
