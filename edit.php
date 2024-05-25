<?php 
session_start();

if (isset($_SESSION['student_id']) && isset($_SESSION['student_name']))  {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	
	<link rel="stylesheet" type="text/css" href="style1.css">
	
</head>
<body>

    <form action="edit-p.php" method="post">
	                        <img style="display:block;width:90px;margin: 0 auto;" src="https://www.uiu.ac.bd/wp-content/uploads/2016/02/UIU-Logo-250.png">
				               <h3 class="text-center"><font color="orange">UIU STUDENT NEEDS</font></h3>
				               <h3 class="text-center"><font color="orange">Change password System</font></h3>
     	<!-- <h2>Change Password</h2> -->
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

     	<?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>

     	<label>Old Password</label>
     	<input type="password" 
     	       name="op" 
     	       placeholder="Old Password">
     	       <br>

     	<label>New Password</label>
     	<input type="password" 
     	       name="np" 
     	       placeholder="New Password">
           
     	       <br>

     	<label>Confirm New Password</label>
     	<input type="password" 
     	       name="c_np" 
     	       placeholder="Confirm New Password">
     	       <br>

     	<button type="submit">CHANGE</button>
          <a href="dashboard.php" class="ca">HOME</a>
     </form>
</body>
</html>

<?php 
}else{
     header("Location: login-as.php");
     exit();
}
 ?>