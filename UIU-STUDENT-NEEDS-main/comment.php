<?php
	include("connection.php");
?>
    <head>
        <title>User - Page</title>
        <link rel="stylesheet" href="css/admin.css"> 
    </head>



<div class="content">
    <div class="wrapper">
              <h1>Comment</h1>
              <br/>  

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
                        <td>Comment:<br><br><br><br><br><br><br><br></td> 
                        <td> 
                            <textarea name="comment" rows="10" cols="100"></textarea>
                            <br>
                        </td>
                    </tr>


                    <tr>
                        <td colspan="2">
                        <br>
                            <input type="submit" name="submit" value="Submit" class="btn-secondary">
                            <!-- <input type="submit" name="submit" value="cancel" class="btn-danger"> -->
                        <br>
                        </td>
                    </tr>
                </table>

              </form>
    </div>
</div>


<?php 
error_reporting(0);
  //process the value from form and save it to database

  //check whether the submit button is clicked or not

  if(isset($_POST['submit']))
  {
    //button clicked
    //echo "Button Clicked";

    //1.get the data from form
    //$image=$_POST['pic'];
    //$name = $_POST['full_Name'];
    //$contact = $_POST['contact'];
    $post=trim($_POST['comment']);
    //$username = $_POST['username'];
    //$pass=$_POST['password'];

    //2.sql query to save the data into database
    $sql1 = "INSERT INTO comment SET

    -- full_name = '$name',
    -- contact ='$contact',
    content='$post'
	";

    //3.execute query and save data in database
    $res = mysqli_query($con, $sql1) or die(mysqli_error());

    //4. check the (query is execute) data is inserted or not and display appropiate meesage
    if($res==TRUE)
    {
        //create a session variable to display the message
        $_SESSION['add'] = "Your post has been submitted to admin.";
        //Redirect page to create project
        header("location: dashboard.php");
    }
    else
    {
        //create a session variable to display the message
        $_SESSION['add'] = "Oops! Failed your request.";
        //Redirect page to add project
        header("location:comment.php");
    }
  }

?>


        