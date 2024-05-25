<?php  include('partials/menu.php'); ?>

<div class="content">
    <div class="wrapper">
        <h1>Post In Details</h1>


        <table class="table">
        <tr>
                        <th>Description</th>
                        <th>Actions</th>
        </tr>

        <?php
        
            //1. Get the ID of Selected post
            $id=$_GET['id'];

            //2. Create SQL Query to Get the Details
            $sql="SELECT * FROM post WHERE id=$id";

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

                    $post = $row['post'];
                    ?>
                    <tr>
                        <td><?php echo $post ; ?></td>                      
                        <td>
                            <a href="<?php echo SITEURL; ?>admin/accept.php?id=<?php echo $id; ?>" class="btn-secondary">Accept</a>
                            <!-- <a href="accept.php" class="btn-secondary">Accept</a> -->
                            <!-- <a href="reject.php" class="btn-danger">Reject</a> -->
                            <a href="<?php echo SITEURL; ?>admin/reject.php?id=<?php echo $id; ?>" class="btn-danger">Reject</a>

                        </td>
                    </tr>

                    <?php
                    }
                else
                {
                    //Redirect to Manage Admin PAge
                    header('location:'.SITEURL.'admin/verification.php');
                }
            }
        
        ?>
        </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>       