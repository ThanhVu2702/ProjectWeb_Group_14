<?php 
session_start();
require('../dbhelper.php');
if(isset($_POST['doimatkhau'])){
    $user=$_POST["username"];
    $pass=md5($_POST["password"]);
	$newpass=md5($_POST["new_pass"]);
    $sql = "SELECT * FROM tbl_taikhoan 
";
$row=mysqli_query($mysqli,$sql);
$count=mysqli_num_rows($row);
if($count>0){
	$sql_update=mysqli_query($mysqli,"UPDATE tbl_taikhoan SET username='".$user."'AND password='".$newpass."'");
echo '<p style:"color:green">Thay Doi Mat Khau Thanh Cong</p>';
}
else{
	echo '<p style:"color:red">Thay Doi Mat Khau Ko Thanh Cong</p>';
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Quên Mật Khẩu</title>
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
				<h2 class="text-center">Change PWD Page</h2><hr>
				<div class="login-page">
					<h4 class="text-center">Đổi Mật Khẩu</h4><hr>
                    <form method="POST" autocomplete="off" id="loginForm">
                      <div class="form-group">
                       <p>Đổi Mật Khẩu</p>
                     </div>
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
                        <div class="form-group">
							<label> New Password</label>
							<input type="password" name="new-password" id="password-new" class="form-control" value=<?php if(isset($_SESSION['PASSWORD'])){echo $_SESSION['PASSWORD'];}?>>
							<div class="password-error"></div>
						</div>
						<button class="submit-login" type="Submit"  >Login</button>
					</form>
				</div>
			</div>
		</div>
</div>
</body>