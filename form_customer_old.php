<!DOCTYPE html>
<html>
<head>

   <meta charset = "utf-8">
      <title>Customer</title>
	   <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script>	 
$(function() {
    $( "#datepicker-3" ).datepicker({
	     minDate: 0
      });
  });
</script>
</head>
<body>
<br><br>

<br><br>
<div id="errormsg"></div>
<a href="dashboard.php">Back</a>
<form method="post" name="CustomerForm" id="CustomerForm">
<h3>Customer Form</h3>
	<input type="text" name="fname" id="fname" placeholder="First Name"><br><br>
	<input type="text" name="lname" id="lname" placeholder="Last Name"><br><br>
	<input type="email" name="email" id="email" placeholder="Email Id"><br><br>
	<input type="text" name="phone" id="phone" placeholder="Phone"><br><br>
	<input type="text" name="address" id="address" placeholder="Address"><br><br>
	
	<!--<input type="text" name="username" id="username" placeholder="username "><br><br>
	<input type="text" name="password" id="password" placeholder="Password"><br><br>
	<input type="text" name="cpassword" id="cpassword" placeholder="Confirm Password "><br><br>-->
	
	<input type="text" name="loanstart_date" id="datepicker-3"><br><br>
	<input type="text" name="loan_amount" id="loan_amount" placeholder="Loan Amount"><br><br>
	<span id="errormsg" style="text-color:red;"></span>
	<select name="interest_percent" id="interest_percent"><br><br>
	   <option>Select percent of interest</option>
		<option value="1">1%</option>
		<option value= "1.5">1.5%</option>
		<option value="2">2%</option>
		<option value="2.5">2.5</option>
	</select><br><br>
	<input type="text" name="balance_amount" id="balance_amount" <br><br>
	<input type="hidden" name="usertype" id="usertype" value="3"><br><br>
	<input type="submit" name="addcustomerBtn" id="addcustomerBtn" value="submit"><br>
</form>
 

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>		
<script type="text/javascript">
$("#interest_percent").change(function(){
	var amount= $("#loan_amount").val();
	var percent= $("#interest_percent").val();
	if(amount!=''){
		var  interest_minus= amount*(percent/100);
		balance= amount-interest_minus;
		$("#balance_amount").val(balance);
		//$("#balance_amount").prop("disabled", true);
	}else{
		$("#errormsg").fadeIn().html("<div>* Please enter the loan amount...</div>");
	}
	
});
$("#CustomerForm").submit(function(e){
	 e.preventDefault();
	 var form = new FormData($("#CustomerForm")[0]);
		$.ajax({
		type: 'POST',
		url: 'add_customer',
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