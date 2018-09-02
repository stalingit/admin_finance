<!DOCTYPE html>
<html lang="en">
<head>
  <title>Customer Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
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
<div id="errormsg"></div>
<a href="dashboard.php">Back</a>
<div class="container">
  <h2 style="text-align: center">Field Officer Form </h2>
  <form class="form-horizontal"  name="CustomerForm" id="CustomerForm" method="post">
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

    <div class="form-group">
      <label class="control-label col-sm-2" for="loanstart_date">Loan Date</label>
      <div class="col-sm-10">    
       <input type="type" class="form-control" id="datepicker-3" placeholder="Enter Phone No" name="loanstart_date" value="">      
       
      </div>
    </div>

<div class="form-group">
      <label class="control-label col-sm-2" for="loan_amount">Loan Amount</label>
      <div class="col-sm-10">    
       <input type="type" class="form-control" id="loan_amount" placeholder="Enter Loan Amount" name="loan_amount" value="">      
       <span id="errormsg" style="text-color:red;"></span>
      </div>
    </div>

<div class="form-group">
      <label class="control-label col-sm-2" for="interest_percent">Select Interest</label>
       <div class="col-sm-10">  
      <select class="form-control" id="interest_percent" name="interest_percent">
      	<option>Select percent of interest</option>
        <option value="1">1%</option>
		<option value= "1.5">1.5%</option>
		<option value="2">2%</option>
		<option value="2.5">2.5</option>
      </select>
  </div>
 </div>     
<div class="form-group">
      <label class="control-label col-sm-2" for="balance_amount">Balance Amount</label>
      <div class="col-sm-10">    
       <input type="type" class="form-control" id="balance_amount" placeholder="Enter Loan Amount" name="balance_amount" value="">      
       <span id="errormsg" style="text-color:red;"></span>
      </div>
    </div>

<input type="hidden" name="usertype" id="usertype" value="3">





    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit"  name="addcustomerBtn" id="addcustomerBtn" class="btn btn-default" value="Submit">
      </div>
    </div>
  </form>
</div>
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
