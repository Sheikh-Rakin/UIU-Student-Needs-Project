<?php include('partials/menu.php'); ?>

<!--content starts-->
<div class="content">
        <div class="wrapper">
              <h1>Create Project</h1>

              <br/> <br/>

              <?php 
                  if(isset($_SESSION['add']))
                  {
                        echo $_SESSION['add']; //displaying session message
                        unset($_SESSION['add']); //removing session message
                  }

                  
              ?>
               <br/> <br/>


                <!-- button to add admin -->

                <a href="add-project.php" class="btn-primary">Add Project</a>
                <br/> <br/> <br/>

                <table class="table">
                        <tr>
                                <th>S.N.</th>
                                <th>Project Name</th>
                                <!-- <th>Description</th> -->
                                <th>Status</th>
                                <th>Actions</th>
                        </tr>


                        <!-- display project -->
                        <?php 
                                $sql = "SELECT * FROM project where p_status=1";
                                //execute the querry
                                $res = mysqli_query($conn, $sql) or die(mysqli_error());

                                // check whether the query is executed or not
                                if($res==TRUE)
                                {
                                        //count rows whether we have data in the database
                                        $count= mysqli_num_rows($res); //function to get all the rows in database

                                        $serial_number=1;

                                        //check the num of rows
                                        if($count>0)
                                        {
                                                //we have data in database
                                                while($rows=mysqli_fetch_assoc($res))
                                                {
                                                        $id=$rows['p_id'];
                                                        $name=$rows['p_name'];
                                                        $email=$rows['admin_email'];
                                                        $username=$rows['p_name'];
                                                        //$description=$rows['p_description'];


                                                        ?>
                                                        <tr>
                                                                <td><?php echo $serial_number++ ; ?></td>
                                                                <td><?php echo $name ; ?></td>
                                                                <td>Open</td>
                                                                <td>
                                                                        <a href="#" class="btn-secondary">Update </a>
                                                                        <a href="<?php echo SITEURL; ?>admin/closed-project.php?p_id=<?php echo $id; ?>" class="btn-danger">Closed</a>
                                                                </td>
                                                        </tr>

                                                        <?php
                                                }
                                        }
                                        else
                                        {
                                                //we do not have data in database
                                        }
                                 }
                        ?>


                </table>

               <div class="clearfix"></div>
        </div>
        </div>
        <!--content ends-->

<?php include('partials/footer.php'); ?>