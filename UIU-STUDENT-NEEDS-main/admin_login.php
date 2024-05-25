<?php
	session_start();
	
	$conn = new mysqli('localhost','root','','uiu_student_needs');
	
	$unsuccessfulmsg = '';

	if(isset($_POST['submit'])){
		$admin_id 			= $_POST['admin_id'];
		$admin_password 		= $_POST['admin_password'];
		$passwordmd5 	= md5($admin_password);
		
		if(empty($admin_id)){
			$emailmsg = 'Enter an id.';
		}else{
			$emailmsg = '';
		}
		
		if(empty($admin_password)){
			$passmsg = 'Enter your password.';
		}else{
			$passmsg = '';
		}
		
		if(!empty($admin_id) && !empty($admin_password)){
			$sql = "SELECT * FROM admin WHERE admin_id='$admin_id' AND admin_password = '$passwordmd5'";
			$query = $conn->query($sql);
			
			if($query->num_rows > 0){
				$row = $query->fetch_assoc();
				$admin_name = $row['admin_name'];
				$admin_id = $row['admin_id'];
				
				$_SESSION['admin_id'] = $admin_id;
				$_SESSION['admin_name'] = $admin_name;
				header('location:dashboard.php');
			}else{
				$unsuccessfulmsg = 'Wrong admin_id or Password!';
			}
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
				<p class="text-center text-success">
				<?php if(!empty($_SESSION['signupmsg'])){ echo $_SESSION['signupmsg']; } ?></p>
			</div>
			<div class="container" style="margin-top:50px">
				<div class="row">
					<div class="col-sm-4">
						
					</div>
					<div class="col-sm-4">
						<div class="container bg-light p-4">
							<p class="text-danger"><?php echo $unsuccessfulmsg ?> </p>
							<form action="" method="POST">
							<div class="mt-2 pb-2">
							<img style="display:block;width:90px;margin: 0 auto;" src="https://www.uiu.ac.bd/wp-content/uploads/2016/02/UIU-Logo-250.png">
				               <h3 class="text-center"><font color="orange">UIU STUDENT NEEDS</font></h3>
				               <h3 class="text-center"><font color="orange">Admin Login System</font></h3>
							  
								<label for="admin_id">Admin ID:</label>
								<input type="admin_id" name="admin_id" class="form-control" placeholder="Enter your admin id" value="<?php if(isset($_POST['submit'])){echo $admin_id; } ?>">
								<span class="text-danger"><?php if(isset($_POST['submit'])){ echo $emailmsg; }?></span>
							</div>
							<div class="mt-1 pb-2">
								<label for="password">Password:</label>
								<input type="password" name="admin_password" class="form-control" placeholder="Enter your password">
								<span class="text-danger"><?php if(isset($_POST['submit'])){ echo $passmsg; }?></span>
							</div>
							<div class="mt-1 pb-2">
								<button name="submit" class="btn btn-success">Login</button>
							</div>
							<div class="mt-1 pb-2">
							<font color="black">Not an account?</font> <a href="admin_signup.php" class="text-decoration-none">Sign Up</a>
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