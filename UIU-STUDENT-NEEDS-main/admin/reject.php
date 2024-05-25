<?php 

    //Include constants.php file here
    include('../config/constants.php');

    // 1. get the ID of post to be reject
    $id = $_GET['id'];

    //2. Create SQL Query to reject post
    $sql = "UPDATE posts SET status=2  WHERE id=$id";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    // Check whether the query executed successfully or not
    if($res==true)
    {
        //Query Executed Successully and Admin Deleted
        //echo "Admin Deleted";
        //Create SEssion Variable to Display Message
        $_SESSION['reject'] = "<div class='success'>Rejected.</div>";
        //Redirect to Manage Admin Page
        header('location:'.SITEURL.'admin/verification.php');
    }
    else
    {
        //Failed to Delete Admin
        //echo "Failed to Delete Admin";

        $_SESSION['reject'] = "<div class='error'>Something is wrong!! Try Again Later.</div>";
        header('location:'.SITEURL.'admin/verification.php');
    }

    //3. Redirect to Manage Admin page with message (success/error)

?>