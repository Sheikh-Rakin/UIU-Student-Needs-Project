<?php
	session_start();
	
	$conn = new mysqli('localhost','root','','uiu_student_needs');
	
	$unsuccessfulmsg = '';

	if(isset($_POST['submit'])){
		$student_id 			= $_POST['student_id'];
		$student_password 		= $_POST['student_password'];
		$passwordmd5 	= md5($student_password);
		
		if(empty($student_id)){
			$emailmsg = 'Enter an id.';
		}else{
			$emailmsg = '';
		}
		
		if(empty($student_password)){
			$passmsg = 'Enter your password.';
		}else{
			$passmsg = '';
		}
		
		if(!empty($student_id) && !empty($student_password)){
			$sql = "SELECT * FROM student WHERE student_id='$student_id' AND student_password = '$passwordmd5'";
			$query = $conn->query($sql);
			
			if($query->num_rows > 0){
				$row = $query->fetch_assoc();
				$student_name = $row['student_name'];
				$student_id = $row['student_id'];
				
				$_SESSION['student_id'] = $student_id;
				$_SESSION['student_name'] = $student_name;
				header('location:dashboard.php');
			}else{
				$unsuccessfulmsg = 'Wrong student_id or Password!';
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
				               <h3 class="text-center"><font color="orange">Login System</font></h3>
							  
								<label for="student_id">Student ID:</label>
								<input type="student_id" name="student_id" class="form-control" placeholder="Enter your student id" value="<?php if(isset($_POST['submit'])){echo $student_id; } ?>">
								<span class="text-danger"><?php if(isset($_POST['submit'])){ echo $emailmsg; }?></span>
							</div>
							<div class="mt-1 pb-2">
								<label for="password">Password:</label>
								<input type="password" name="student_password" class="form-control" placeholder="Enter your password">
								<span class="text-danger"><?php if(isset($_POST['submit'])){ echo $passmsg; }?></span>
							</div>
							<div class="mt-1 pb-2">
								<button name="submit" class="btn btn-success">Login</button>
							</div>
							<div class="mt-1 pb-2">
							<font color="black">Not an account?</font> <a href="signup.php" class="text-decoration-none">Sign Up</a>
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