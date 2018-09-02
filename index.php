<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</head>
<body>

<div class="container">
  <h2 style="text-align: center">Login Form </h2>
  <form class="form-horizontal"  name="loginForm" id="loginForm" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">User Name:</label>
      <div class="col-sm-10">
        <input type="type" class="form-control" id="usename" placeholder="Enter email" name="username">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox" name="remember"> Remember me</label>
        </div>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit"  name="Login_btn" id="Login_btn" class="btn btn-default" value="Submit">
      </div>
    </div>
  </form>
</div>
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
