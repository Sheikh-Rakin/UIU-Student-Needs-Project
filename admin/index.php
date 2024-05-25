<?php  include('partials/menu.php'); ?>

        <!--content starts-->
        <div class="content">
        <div class="wrapper">
              <h1>Dashboard</h1>
              <br><br>

              <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

            ?>
            <br><br>


            
            <br/> <br/> <br/>

               <div class="col-4 text-center">
                <h1>User List</h1>
                <br/>
                <a href="user-list.php" class="btn-primary">View</a>
               </div>
               <br/> <br/> <br/>

               <!-- <div class="col-4 text-center">
                <h1>Doctor List</h1>
                <br/>
                <a href="doctor-list.php" class="btn-primary">View</a>
               </div>
               <br/> <br/> <br/> -->

               <!-- <div class="col-4 text-center">
                <h1>Volunteer List</h1>
                <br/>
                <a href="volunteer-list.php" class="btn-primary">View</a>
               </div> -->
               <br/> <br/> <br/>

               <div class="col-4 text-center">
                <h1>Admin List</h1>
                <br/>
                <a href="admin-list.php" class="btn-primary">View</a>
               </div>


               <div class="clearfix"></div>
        </div>
        </div>


        <!--content ends-->


       <?php include('partials/footer.php'); ?>