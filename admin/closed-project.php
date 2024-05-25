<?php 

    //Include constants.php file here
    include('../config/constants.php');

    // 1. get the ID of post to be reject
    $id = $_GET['p_id'];

    //2. Create SQL Query to reject post
    $sql = "UPDATE project SET p_status=0  WHERE p_id=$id";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    // Check whether the query executed successfully or not
    if($res==true)
    {
        //Query Executed Successully and Admin Deleted
        //echo "Admin Deleted";
        //Create SEssion Variable to Display Message
        $_SESSION['reject'] = "<div class='success'>Closed.</div>";
        //Redirect to Manage Admin Page
        header('location:'.SITEURL.'admin/manage-category.php');
    }
    else
    {
        //Failed to Delete Admin
        //echo "Failed to Delete Admin";

        $_SESSION['reject'] = "<div class='error'>Something is wrong!! Try Again Later.</div>";
        header('location:'.SITEURL.'admin/manage-category.php');
    }

    //3. Redirect to Manage Admin page with message (success/error)

?>