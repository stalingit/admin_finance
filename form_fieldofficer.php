<!DOCTYPE html>
<html lang="en">
<head>
  <title>Field Office Form Creation</title>
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
  <h2 style="text-align: center">Field Officer Form </h2>
  <form class="form-horizontal"  name="fieldofficeForm" id="fieldofficeForm" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="fname">First Name:</label>
      <div class="col-sm-10">
        <input type="type" class="form-control" id="fname" placeholder="Enter First Name" name="fname" value="">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="lname">Last Name:</label>
      <div class="col-sm-10">          
        <input type="type" class="form-control" id="lname" placeholder="Enter Last Name" name="lname" value="">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">          
        <input type="type" class="form-control" id="email" placeholder="Enter Last Name" name="email" value="">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="username">User Name:</label>
      <div class="col-sm-10">          
        <input type="type" class="form-control" id="username" placeholder="Enter User Name" name="username" value="">
      </div>
    </div>
<div class="form-group">
      <label class="control-label col-sm-2" for="password">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" value="">
      </div>
    </div>

<div class="form-group">
      <label class="control-label col-sm-2" for="cpassword">Confirm Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="cpassword" placeholder="Enter Conform password" name="password" value="">
      </div>
    </div>

 <div class="form-group">
      <label class="control-label col-sm-2" for="phone">Phone:</label>
      <div class="col-sm-10">          
        <input type="type" class="form-control" id="phone" placeholder="Enter Phone No" name="phone" value="">
      </div>
    </div>




<div class="form-group">
      <label class="control-label col-sm-2" for="address">Address:</label>
      <div class="col-sm-10">          
        <textarea class="form-control" name="address" id="address" rows="5" id="comment"></textarea>
      </div>
    </div>
    <input type="hidden" name="usertype" id="usertype" value="2">





    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit"  name="addBtn" id="addBtn" class="btn btn-default" value="Submit">
      </div>
    </div>
  </form>
</div>
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
