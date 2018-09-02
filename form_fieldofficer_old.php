<!DOCTYPE html>
<html>
<head>
<title>Form</title>
</head>
<body>
<br><br>

<br><br>
<div id="errormsg"></div>
<a href="dashboard.php">Back</a>

<form method="post" name="fieldofficeForm" id="fieldofficeForm">
<h3>Fieldofficer Form</h3>
	<input type="text" name="fname" id="fname" placeholder="First Name"><br><br>
	<input type="text" name="lname" id="lname" placeholder="Last Name"><br><br>
	<input type="email" name="email" id="email" placeholder="Email Id"><br><br>

	<input type="text" name="username" id="username" placeholder="username "><br><br>
	<input type="password" name="password" id="password" placeholder="Password"><br><br>
	<input type="text" name="cpassword" id="cpassword" placeholder="Confirm Password "><br><br>

	<input type="text" name="phone" id="phone" placeholder="Phone"><br><br>
	<input type="text" name="address" id="address" placeholder="Address"><br><br>

	<input type="hidden" name="usertype" id="usertype" value="2"><br><br>

	<input type="submit" name="addBtn" id="addBtn" value="submit"><br>
 </form>
 
 
 
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>		
<script type="text/javascript">
$("#fieldofficeForm").submit(function(e){
	 e.preventDefault();
		var username= $("#username").val();
		var password= $("#password").val();
		var cpassword= $("#cpassword").val();
		
		var form = new FormData($("#fieldofficeForm")[0]);
		
		if(username.length <=5){
			$("#errormsg").fadeIn().html("<div class='alert alert-danger'>* Username min 6 characters.</div>");
			return false;
		} 
		if(password == cpassword){	
			$.ajax({
				type: 'POST',
				url: 'check_username',
				data: {username:username},
				success: function (data) {
					if(data == 1){
						$("#errormsg").html("<div class='alert alert-danger'>* Username already exist.</div>");
					}else{
						$.ajax({
							type: 'POST',
							url: 'add_fieldofficer',
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
					}
					
				}
			});
		
		}else{
		 $("#errormsg").html("<div class='colo:red'>*Password doesn't match.</div>");
		  return false;
		}
	return true;	
});
</script>
 
</body>
</html>