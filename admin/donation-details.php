<?php  include('partials/menu.php'); ?>


        <!--content starts-->
        <div class="content">
        <div class="wrapper">
              <h1>Donation Details</h1>


              <table class="table">
                  <tr>
                        <th>S.N.</th>
                        <th>P_ID</th>
                        <th>Project Name</th>
                        <th>Total Amount</th>
                        <th>Spent Amount</th>
                        <th>Current Amount</th>
                        <th>Status</th>
                  </tr>

                  <!-- display donation details -->
                  <?php 
                        $sql = "SELECT * FROM donation_details";
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
                                          $p_name=$rows['p_name'];
                                          $total=$rows['total_donation'];
                                          $spent=$rows['spent_amount'];
                                          $current=$rows['current_amount'];
                                          $status=$rows["status"];

                                    ?>
                                    <tr>
                                          <td><?php echo $serial_number++ ; ?></td>
                                          <td><?php echo $id ; ?></td>
                                          <td><?php echo $p_name ; ?></td>
                                          <td><?php echo $total ; ?></td>
                                          <td><?php echo $spent ; ?></td>
                                          <td><?php echo $current; ?></td>
                                          <td><?php echo $status; ?></td>
                                    </tr>

                                    <?php
                                    }
                              }
                              else
                              {
                                    //we do not have data in database
                                    echo "maintenance is running -_-";
                              }
                        }
                  ?>

            </table>

               

               <div class="clearfix"></div>
        </div>
        </div>
        <!--content ends-->


        <?php include('partials/footer.php'); ?>  