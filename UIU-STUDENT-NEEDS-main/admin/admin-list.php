<?php  include('partials/menu.php'); ?>


        <!--content starts-->
        <div class="content">
        <div class="wrapper">
              <h1>Admin List</h1>
              <br/> <br/>

              <br/> <br/>

               <table class="table">
                  <tr>
                        <th>S.N.</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>E-mail</th>
                        <th>Contact No.</th>
                        <th>Status</th>
                  </tr>

                  <!-- display admin -->
                  <?php 
                        $sql = "SELECT * FROM admin1";
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
                                          $contact=$rows['contact_no'];
                                          $status=$rows['current_status'];

                                    ?>
                                    <tr>
                                          <td><?php echo $serial_number++ ; ?></td>
                                          <td><?php echo $full_name ; ?></td>
                                          <td><?php echo $username ; ?></td>
                                          <td><?php echo $email ; ?></td>
                                          <td><?php echo $contact ; ?></td>
                                          <td><?php 
                                          if($status==0)
                                          {
                                            echo "Not in pannel";
                                          }
                                          else
                                          {
                                            echo "Pannel member" ;
                                          }
                                           ?></td>
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
   