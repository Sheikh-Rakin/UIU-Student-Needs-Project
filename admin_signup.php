<?php
	session_start();
	$conn = new mysqli('localhost', 'root', '', 'uiu_student_needs');

	if(isset($_POST['submit'])){
		$admin_name 		= $_POST['admin_name'];
		$admin_id 		= $_POST['admin_id'];
		$admin_email 			= $_POST['admin_email'];
		$admin_password 		= $_POST['admin_password'];
		$passwordagain  = $_POST['passwordagain'];
		$md5password 	= md5($admin_password);
		
		$emptymsg1 = $emptymsg2 = $emptymsg3 = $emptymsg4 = $emptymsg5 = $pasmatchmsg = '';
		
		
		if(empty($admin_name)){
			$emptymsg1 = 'Write Firstname';
		}
		if(empty($admin_id)){
			$emptymsg2 = 'Write id';
		}
		if(empty($admin_email)){
			$emptymsg3 = 'Write email';
		}
		if(empty($admin_password)){
			$emptymsg4 = 'Write password';
		}
		if(empty($passwordagain)){
			$emptymsg5 = 'Write password Again';
		}		
		
		if(!empty($admin_name) && !empty($admin_id) && !empty($admin_email) && !empty($admin_password) && !empty($passwordagain)){
			if($admin_password !== $passwordagain){
				$pasmatchmsg = 'Password does not match!';
			}else{
				$pasmatchmsg='';
				$sql = "INSERT INTO admin(admin_name, admin_id, admin_email, admin_password) 
						VALUES('$admin_name', '$admin_id', '$admin_email', '$md5password')";
			
				if($conn->query($sql) == TRUE){
					header('location: admin_login.php');
					$_SESSION['signupmsg']='Sign Up Complete. Please Log in now.';
				}else{
					echo 'data not inserted';
				}
			}
		}else{
			$emptymsg = 'Fill up all fields';
		}
		
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
	</head>
	
	<body>
	<style>body {
    	background-image: url('https://admission.uiu.ac.bd/Images/Img/carosol_img/Carosol_4.jpg');
    	color: #FFFFFF;
	}
		</style>
		<div class="container">
			<div class="container" style="margin-top:50px">
			
			</div>
			<div class="container" style="margin-top:50px">
				<div class="row">
					<div class="col-sm-4">
						
					</div>
					<div class="col-sm-4">
						<div class="container bg-light p-4">
							<form action="" method="POST">
							<div class="mt-2 pb-2">
							<img style="display:block;width:90px;margin: 0 auto;" src="https://www.uiu.ac.bd/wp-content/uploads/2016/02/UIU-Logo-250.png">
				               <h3 class="text-center"><font color="orange">Registration System</font></h3>
								<label for="admin_name">admin Name:</label>
								<input type="name" name="admin_name" class="form-control" placeholder="admin_name" value="<?php if(isset($_POST['submit'])){echo $admin_name; } ?>">
								<span class="text-danger"><?php if(isset($_POST['submit'])){ echo $emptymsg1; }?></span>
							</div>
							<div class="mt-2 pb-2">
								<label for="admin_id">admin id:</label>
								<input type="id" name="admin_id" class="form-control" placeholder="admin_id" value="<?php if(isset($_POST['submit'])){echo $admin_id; } ?>">
								<span class="text-danger"><?php if(isset($_POST['submit'])){ echo $emptymsg2; }?></span>
							</div>
							<div class="mt-2 pb-2">
								<label for="email">Email:</label>
								<input type="email" name="admin_email" class="form-control" placeholder="Enter your email" value="<?php if(isset($_POST['submit'])){echo $admin_email; } ?>">
								<span class="text-danger"><?php if(isset($_POST['submit'])){ echo $emptymsg3; }?></span>
							</div>
							<div class="mt-1 pb-2">
								<label for="password">Password:</label>
								<input type="password" name="admin_password" class="form-control" placeholder="Enter New password" >
								<span class="text-danger"><?php if(isset($_POST['submit'])){ echo $emptymsg4; }?></span>
							</div>
							<div class="mt-1 pb-2">
								<label for="password">Password Again:</label>
								<input type="password" name="passwordagain" class="form-control" placeholder="Enter password Again" >
								<span class="text-danger"><?php if(isset($_POST['submit'])){ echo $emptymsg5.''.$pasmatchmsg; }?></span>
							</div>
							<div class="mt-1 pb-2">
								<button name="submit" class="btn btn-success">Sign In</button>
							</div>
							<div class="mt-1 pb-2">
							<font color="black">Alrady have an account?</font> <a href="admin_login.php" class="text-decoration-none">Login</a>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
