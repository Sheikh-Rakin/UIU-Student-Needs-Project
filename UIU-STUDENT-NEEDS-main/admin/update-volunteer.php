<?php  include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1><br><br>Update Volunteer<br></h1>

        <?php
        
            //1. Get the ID of Selected Admin
            $id=$_GET['id'];

            //2. Create SQL Query to Get the Details
            $sql="SELECT * FROM volunteer_data WHERE id=$id";

            //Execute the Query
            $res=mysqli_query($conn, $sql);

            //Check whether the query is executed or not
            if($res==true)
            {
                // Check whether the data is available or not
                $count = mysqli_num_rows($res);
                //Check whether we have admin data or not
                if($count==1)
                {
                    // Get the Details
                    //echo "Admin Available";
                    $row=mysqli_fetch_assoc($res);

                    $full_name = $row['full_name'];
                    $username = $row['username'];
                    $email = $row['email'];
                }
                else
                {
                    //Redirect to Manage Admin PAge
                    header('location:'.SITEURL.'admin/manage-volunteer-admin.php');
                }
            }
        
        ?>


        <form action="" method="POST">

        <table class="table-30">
                    <tr>
                        <td>Full Name:</td>
                        <td>
                            <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                        </td> 
                    </tr>


                    <tr>
                        <td>Username:</td> 
                        <td> 
                            <input type="text" name="username" value="<?php echo $username; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>E-mail:</td> 
                        <td> 
                            <input type="text" name="email" value="<?php echo $email; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="Update Volunteer" class="btn-secondary">
                        </td>
                    </tr>
                </table>
        </form>
    </div>
</div>


<?php 

    //Check whether the Submit Button is Clicked or not
    if(isset($_POST['submit']))
    {
        //echo "Button CLicked";
        //Get all the values from form to update
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $email = $_POST['email'];

        //Create a SQL Query to Update Admin
        $sql = "UPDATE volunteer_data SET
        full_name = '$full_name',
        username = '$username',
        email = '$email'
        WHERE id='$id'
        ";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Check whether the query executed successfully or not
        if($res==true)
        {
            //Query Executed and Admin Updated
            $_SESSION['update'] = "<div class='success'>Volunteer Updated Successfully.</div>";
            //Redirect to Manage Admin Page
            header('location:'.SITEURL.'admin/manage-volunteer-admin.php');
        }
        else
        {
            //Failed to Update Admin
            $_SESSION['update'] = "<div class='error'>Failed to Delete Volunteer.</div>";
            //Redirect to Manage Admin Page
            header('location:'.SITEURL.'admin/manage-volunteer-admin.php');
        }
    }

?>



<?php include('partials/footer.php'); ?>