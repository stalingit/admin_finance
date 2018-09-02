<!DOCTYPE html>
<html>
<head>
</head>
<body>

	<form  name="loginForm" id="loginForm" method="post">
	<h3>Login</h3>
    <br><br>
	<input type="text" name="username" placeholder="Username" required /><br><br>
	<input type="password" name="password" placeholder="password" required /><br><br>
	<input type="submit" name="Login_btn" id="Login_btn" value="Login" />

	</form>
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script>
$("#loginForm").submit(function(e) {
	 e.preventDefault();
	 var form= new FormData($("#loginForm")[0]);
    $.ajax({
           type: "POST",
           url: "check_user",
           data: form,
		   processData:false,
		   contentType:false,
           success: function(data){
			   if(data == 1){
			     location.href= "dashboard";
			   }else{
				   alert("Invalid username and password.");
			   }           }
         });
   return true;
});
</script>

</body>
</html>

