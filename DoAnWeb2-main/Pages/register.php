<!DOCTYPE html>
<html>
<head>
	<title>Sign Up Page</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

<!-- CSS Libraries -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  
	<link rel="stylesheet" type="text/css" href="../Admin/css/styleAdmin.css">
	<link rel="stylesheet" type="text/css" href="../Admin/css/styleFormLogin.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<body>
<?php include("../Admin/modules/header.php") ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				
				<div class="login-page">
					<h4 class="text-center">Sign Up Form</h4><hr>
					<form method="post" action="" id="registerForm">
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="username" id="username" class="form-control" >
							<span class="username-error"></span>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" id="email" class="form-control" >
							<span class="email-error"></span>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" id="password" class="form-control" >
							<span class="password-error"></span>
						</div>
						<div class="form-group">
							<label>Confirm Password</label>
							<input type="password" name="re-password-register" id="re-password-register" class="form-control">
							<span class="re-password-error"></span>
						</div>
						<button class="btn btn-primary submit-button" type="Submit">Submit</button>
					</form><hr>
					<div class="result-div"></div>
				</div>
				<p class="text-center"><a href="login.php" class="register">Already a Member ? Login</a></p>

			</div>
		</div>
	</div>
	
	<script type="text/javascript">
		       function showSuccessToast() {
            toast({
                title: "Successfull",
                message: "Đăng ký thành công tài khoản tại E Shop",
                type: "success",
                duration: 5000
            });
        }
            /*  function ValidateUserName() {
				var UserName=$("#username").val();
				var Password=$("#password").val();
				if(UserName.length<3){
					UserName.html
				}
			  }
			  */
	$(document).ready(function(){
	
	$("#registerForm").submit(function(event){
		event.preventDefault();
		var username=document.getElementById('username');
		if ($("#username").val() == "") {
			$(".username-error").html("Username is required ").addClass('text-danger');
			return false;
		}else if(username.value.length<3) {
			$(".username-error").html("Username is at least 3 characters long ").addClass('text-danger');
			return false;
		}
		else{
			$(".username-error").html("");
		}
		
        if ($("#email").val() == "") {
			$(".email-error").html("Email is required").addClass('text-danger');
			return false;
		}
		else{
			$(".email-error").html("");
		}
		if ($("#password").val() == "") {
			$(".password-error").html("password is required").addClass('text-danger');
			return false;
		}
		else{
			$(".password-error").html("");
		}
        if ($("#re-password-register").val() == "") {
			$(".re-password-error").html("Confirm password is required").addClass('text-danger');
			return false;
		}else{
			$(".re-password-error").html("");
		}
	   if($("#password").val()!=$("#re-password-register").val()){
		$('.re-password-error').html('Re-password different password. Please re-check').addClass('text-danger');
		return false;
	   }
	   else{
		$(".re-password-error").html("");
	   }
		var username=$("#username").val();
		var password=$("#password").val();
		var email=$("#email").val();
        var confirmPassword=$("#re-password-register").val();
	     if(username!=''&&password!=''&&email!=''&&confirmPassword!=''){
			$.ajax({
                        type: 'POST',
                        url: 'handleregister.php',
                        data: {
                            username: username,
                            email: email,
                            password: password
                        },
                        success: function(data) {
                            var data = JSON.parse(data);
                            if (data.statusCode == 200) {
                                window.location.href="http://localhost:8080/%C4%90%E1%BB%93%20%C3%81n%20Web2/Pages/login.php";
                            } else {
                                $('.username-error').html('Account already exitst. Please enter another account').addClass('text-danger');
                            }
							
							
                        }
                    })
		 }
	});
})
	</script>
</body>

</html>