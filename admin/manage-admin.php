<?php  include('partials/menu.php'); ?>


        <!--content starts-->
        <div class="content">
        <div class="wrapper">
              <h1>Manage Admin</h1>
              <br/> <br/>

              <?php 
                  if(isset($_SESSION['add']))
                  {
                        echo $_SESSION['add']; //displaying session message
                        unset($_SESSION['add']); //removing session message
                  }

                  if(isset($_SESSION['delete']))
                  {
                        echo $_SESSION['delete']; //displaying session message
                        unset($_SESSION['delete']); //removing session message
                  }

                  if(isset($_SESSION['update']))
                  {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                  }

              ?>
              <br> <br> <br>

              <!-- button to add admin -->

              <a href="add-admin.php" class="btn-primary">Add Admin</a>
              <br/> <br/> <br/>

               <table class="table">
                  <tr>
                        <th>S.N.</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>E-mail</th>
                        <th>Actions</th>
                  </tr>

                  <!-- display admin -->
                  <?php 
                        $sql = "SELECT * FROM admin where current_status In (2,1)";
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
                                          $full_name=$rows['ad_name'];
                                          $email=$rows['email'];
                                          $username=$rows['username'];
                                          $status=$rows['current_status'];
                                          if($status==2)
                                          {
                                                ?>

                                                      <tr>
                                                      <td><?php echo $serial_number++ ; ?></td>
                                                      <td><?php echo $full_name ; ?></td>
                                                      <td><?php echo $username ; ?></td>
                                                      <td><?php echo $email ; ?></td>
                                                      <td>
                                                      <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>

                                                      </td>
                                                      </tr>
                                          <?php
                                           }
                                           else
                                           {
                                                ?>

                                                      <tr>
                                                      <td><?php echo $serial_number++ ; ?></td>
                                                      <td><?php echo $full_name ; ?></td>
                                                      <td><?php echo $username ; ?></td>
                                                      <td><?php echo $email ; ?></td>
                                                      <td>
                                                      <!-- <a href="#>" class="btn-secondary">Change</a> -->
                                                      <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                                      <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                                                      </td>
                                                      </tr>

                                                <?php

                                           }
                                    
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