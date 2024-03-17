<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
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
</head> 
<body>
    <?php include("../Admin/modules/header.php") ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="text-center">Login Page</h2><hr>
				<div class="login-page">
					<h4 class="text-center">Login Form</h4><hr>
					<form method="post" action="" id="loginForm">
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="username" id="username" class="form-control" value=<?php if(isset($_SESSION['USERNAME'])){echo $_SESSION['USERNAME'];}?> >
							<div class="username-error"></div>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" id="password" class="form-control" value=<?php if(isset($_SESSION['PASSWORD'])){echo $_SESSION['PASSWORD'];}?>>
							<div class="password-error"></div>
						</div>
						<button class="submit-login" type="Submit"  >Login</button>
					</form>
				</div>
				<p class="text-center">
					<a href="register.php" class="">Create Account</a>
				</p>
				
			</div>
		</div>
	</div>
	<script type="text/javascript">
	  $(document).ready(function() {
            $("#loginForm").submit(function(e) {
                e.preventDefault();
                var username = $('#username').val();
                var password = $('#password').val();
                if (username == ''||$('#username').length<3) {
                    $('.username-error').html('Username is required or wrong').addClass('text-danger');
                    flag = false;
                } 
                else {
                    $('.username-error').html('');
                }
               
                if (password == '') {
                    $('.password-error').html('Password is required').addClass('text-danger');
                    flag = false;
                } else {
                    $('.password-error').html('');
                }
                if (username != '' && password != '') {
                    $.ajax({
                        url: 'handlelogin.php',
                        type: 'POST',
                        data: {
                            user: username,
                            pass: password
                        },
                        success: function(data) {
                            if (data == 'success-user') {
								window.location.href = "http://localhost:8080/%C4%90%E1%BB%93%20%C3%81n%20Web2/index.php";
                            } else if (data == '') {
                               $('.username-error').html('Account don\'t exitst. Please enter create account').addClass('text-danger');
                             
                            } else if (data == 'success-admin') {
                                window.location.href = 'http://localhost:8080/%C4%90%E1%BB%93%20%C3%81n%20Web2/Admin/index.php';
                            } else if (data == 'fail-pass') {
                                $('.password-error').html('Incorrect password').addClass('text-danger');
                            }
                            console.log(data);
                           
                        }
                    })
                }
            })
        })
</script>
</body>
</html>