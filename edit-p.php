<?php 
session_start();

if (isset($_SESSION['student_id']) && isset($_SESSION['student_name'])) {

    include "connection.php";

if (isset($_POST['op']) && isset($_POST['np'])
    && isset($_POST['c_np'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$op = validate($_POST['op']);
	$np = validate($_POST['np']);
	$c_np = validate($_POST['c_np']);

    if(empty($op)){
      header("Location: edit.php?error=Old Password is required");
	  exit();
        } else if (empty($np)) {
            header("Location: edit.php?error=New Password is required");
            exit();
        }
      else if(empty($c_np)){
        header("Location: edit.php?error=The confirmation password is required");
        exit();
    }else if($np !== $c_np){
      header("Location: edit.php?error=The confirmation password  does not match");
	  exit();
    }else {
    	// hashing the password
    	$op = md5($op);
    	$np = md5($np);
        $id = $_SESSION['student_id'];

        $sql = "SELECT student_password
                FROM student WHERE 
                student_id='$id' AND student_password='$op'";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result)>0){

        	$sql_2 = "UPDATE student
        	          SET student_password='$np'
        	          WHERE student_id='$id'";
        	mysqli_query($con, $sql_2);
        	header("Location: edit.php?success=Your password has been changed successfully");
	        exit();

        }else {
        	header("Location: edit.php?error=Incorrect password");
	        exit();
        }

    }


}else{
	header("Location: edit.php");
	exit();
}

}else{
     header("Location: index.php");
     exit();
}