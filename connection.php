<?php
    $con = mysqli_connect("localhost", "root", "", "uiu_student_needs");

    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>