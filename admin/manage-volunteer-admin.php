<?php include('partials/menu.php'); ?>

<!--content starts-->
<div class="content">
        <div class="wrapper">
              <h1>Manage Volunteer</h1>

              <br/> <br/>

              <?php 
                  if(isset($_SESSION['add']))
                  {
                        echo $_SESSION['add']; //displaying session message
                        unset($_SESSION['add']); //removing session message
                  }
                  if(isset($_SESSION['update']))
                  {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                  }

                  if(isset($_SESSION['delete']))
                  {
                        echo $_SESSION['delete']; //displaying session message
                        unset($_SESSION['delete']); //removing session message
                  }

              ?>
               <br/> <br/>


                <!-- button to add admin -->

                <a href="add-volunteer.php" class="btn-primary">Add Volunteer</a>
                <br/> <br/> <br/>

                <table class="table">
                        <tr>
                                <th>S.N.</th>
                                <th>Volunteer Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Skill</th>
                                <th>Actions</th>
                        </tr>


                        <!-- display project -->
                        <?php 
                                $sql = "SELECT * FROM volunteer_data WHERE status=1";
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
                                                        $id=$rows['id'];
                                                        $name=$rows['full_name'];
                                                        $email=$rows['email'];
                                                        $contact=$rows['phn_no'];
                                                        $skill=$rows['skill'];


                                                        ?>
                                                        <tr>
                                                                <td><?php echo $serial_number++ ; ?></td>
                                                                <td><?php echo $name ; ?></td>
                                                                <td><?php echo $email ; ?></td>
                                                                <td><?php echo $contact ; ?></td>
                                                                <td><?php echo $skill ; ?></td>
                                                                <td>
                                                                <a href="<?php echo SITEURL; ?>admin/update-volunteer.php?id=<?php echo $id; ?>" class="btn-secondary">Update </a>
                                                                <a href="<?php echo SITEURL; ?>admin/removed-volunteer.php?id=<?php echo $id; ?>" class="btn-danger">Removed</a>
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