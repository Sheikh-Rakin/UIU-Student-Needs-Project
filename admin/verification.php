<?php  include('partials/menu.php'); ?>


        <!--content starts-->
        <div class="content">
        <div class="wrapper">
              <h1>Verify User's Post</h1>

              <table class="table">
                  <tr>
                        <th>S.N.</th>
                        <th>Complain</th>
                        <th>Actions</th>
                  </tr>

                  <!-- display user's request -->
                  <?php 
                        $sql = "SELECT * FROM posts where status =0";
                        //execute the querry
                        $res = mysqli_query($conn, $sql) or die(mysqli_error());

                        // check whether the query is executed or not
                        if($res==TRUE)
                        {
                              //count rows whether we have data in the database
                              $count= mysqli_num_rows($res); //function to get all the rows in database

                              $serial_number=1;


                              if($count==0)
                              {
                                     ?> <h2><br> <?php echo "No complain yet!!" ; ?> </h2> <?php
                              }

                              //check the num of rows
                              elseif($count>0)
                              {
                                    //we have data in database
                                    while($rows=mysqli_fetch_assoc($res))
                                    {
                                          $id=$rows['id'];
                                          $post=$rows['post'];

                                                ?>

                                                      <tr>
                                                      <td><?php echo $serial_number++ ; ?></td>
                                                      <td><?php echo $post ; ?></td>
                                                      <td>
                                                      <!-- <a href="#>" class="btn-secondary">Change</a> -->
                                                      <a href="<?php echo SITEURL; ?>admin/accept.php?id=<?php echo $id; ?>" class="btn-secondary">Accept</a>
                                                      <a href="<?php echo SITEURL; ?>admin/reject.php?id=<?php echo $id; ?>" class="btn-danger">Reject</a>
                                                      <!-- <a href="#" class="btn-danger">Delete Admin</a> -->
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
                  ?>

            </table>

               <div class="clearfix"></div>
        </div>
        </div>
        <!--content ends-->


        