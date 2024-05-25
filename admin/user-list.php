<?php  include('partials/menu.php'); ?>


        <!--content starts-->
        <div class="content">
        <div class="wrapper">
              <h1>User List</h1>
              <br/> <br/>

              <br/> <br/>

               <table class="table">
                  <tr>
                        <th>S.N.</th>
                        <th>Full Name</th>
                        <th>ID</th>
                        <th>E-mail</th>
                        <th>Contact No.</th>
                  </tr>

                  <!-- display admin -->
                  <?php 
                        $sql = "SELECT * FROM student";
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
                                          $id=$rows['student_id'];
                                          $full_name=$rows['student_name'];
                                          $email=$rows['student_email'];
                                          $username=$rows['student_id'];
                                          $contact=$rows['student_phone'];

                                    ?>
                                    <tr>
                                          <td><?php echo $serial_number++ ; ?></td>
                                          <td><?php echo $full_name ; ?></td>
                                          <td><?php echo $username ; ?></td>
                                          <td><?php echo $email ; ?></td>
                                          <td><?php echo $contact ; ?></td>
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