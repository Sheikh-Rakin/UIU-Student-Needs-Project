<?php  include('partials/menu.php'); ?>

<div class="content">
    <div class="wrapper">
              <h1>Add Volunteer</h1>
              <br/> <br/> 

              <?php 
                  if(isset($_SESSION['add']))
                  {
                        echo $_SESSION['add']; //displaying session message
                        unset($_SESSION['add']); //removing session message
                  }
              ?>
              
              <form action="" method="POST">

                <table class="table-30">
                    <tr>
                        <td>Full Name:</td>
                        <td>
                            <input type="text" name="full_name" placeholder="Enter your name">
                        </td> 
                    </tr>


                    <tr>
                        <td><br>Username:<br></td> 
                        <td> 
                            <br><input type="text" name="username" placeholder="Your username"><br>
                        </td>
                    </tr>

                    <tr>
                        <td><br>E-mail:<br></td> 
                        <td> 
                            <br><input type="text" name="email" placeholder="Enter your email"><br>
                        </td>
                    </tr>


                    <tr>
                        <td><br>Password:<br></td> 
                        <td> 
                            <br><input type="password" name="password" placeholder="Enter password"><br>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <br><br><input type="submit" name="submit" value="Add Volunteer" class="btn-secondary"><br><br>
                        </td>
                    </tr>
                </table>

              </form>
    </div>
</div>


<?php  include('partials/footer.php'); ?>

<?php 
error_reporting(0);
  //process the value from form and save it to database

  //check whether the submit button is clicked or not

  if(isset($_POST['submit']))
  {
    //button clicked
    //echo "Button Clicked";

    //1.get the data from form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); //password encryption with md5

    //2.sql query to save the data into database
    $sql = "INSERT INTO volunteer_list SET

    full_name = '$full_name',
    username = '$username',
    email ='$email',
    password ='$password',
    status=1;
    ";

    //3.execute query and save data in database
    $res = mysqli_query($conn, $sql) or die(mysqli_error());

    //4. check the (query is execute) data is inserted or not and display appropiate meesage
    if($res==TRUE)
    {
        //create a session variable to display the message
        $_SESSION['add'] = "Volunteer added successfully!";
        //Redirect page to manage admin
        header("location:".SITEURL.'admin/manage-volunteer-admin.php');
    }
    else
    {
        //create a session variable to display the message
        $_SESSION['add'] = "Oops! Failed your request.";
        //Redirect page to add admin
        header("location:".SITEURL.'admin/add-volunteer.php');
    }
  }
  

?>