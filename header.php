<?php
  include("connection.php");
  session_start();
  $student_name = $_SESSION['student_name'];
?>

<header id="main-header">
  <!-- <h3>&nbsp;&nbsp;&nbsp;<?php echo "$student_name"; ?></h3> -->
  <div class="dash-nav">  
  <ul>
      <li> <a href="dashboard.php">Home</a></li>
      <!-- sgddfsdf -->
      <!-- <li> <a href="Complain.php">Complain & Opinion</a></li> -->
      
      <!--  -->

      <div class="dropdown">
  <button class="dropbtn"><h4>Complain & Opinion<h4></button>
  <div class="dropdown-content">
    <a href="posts.php">Classrom</a>
    <a href="posts.php">Library</a>
    <a href="posts.php">Canteen</a>
    <a href="posts.php">Common Room</a>
    <a href="posts.php">Medical Center</a>
    <a href="posts.php">Shuttle</a>
    <a href="posts.php">Washroom</a>

  </div>
</div>

      <!--  -->
      
    </ul>
  </div>
  <div id="topbar" class="section-p1">
    <div class="searchbar">
      <input type="text" placeholder="search .....">
      <img src="img/magnifying-glass.png" alt="" style="width: 30px;">
    </div>

    <!-- profile dropdown menu starts-->
    <div class="profile">
      
      <button onclick="myFunction()" class="drpdwn-btn">
        <img src="img/person_avatar_account_user_icon_191606.png" alt="" class="pro-icon" style="width: 50px;">
        <img src="img/down.png" alt="" class="dwn-icon">
      </button>

      <!-- dropdown menu goes here -->
      <div id="myDropdown" class="dropdown-content">
        <ul>
          <!-- logged in as ... -->
          <h4>&nbsp;&nbsp;&nbsp;<?php echo "$student_name"; ?></h4>

          <li><a href="profile.php"> &nbsp;&nbsp;&nbsp;&nbsp; <img src="img/profile_pic.jpg" style="width: 35px;"> &nbsp;&nbsp;&nbsp;&nbsp; Profile</a></li>
          <li><a href="dashboard.php"> &nbsp;&nbsp;&nbsp;&nbsp; <img src="img/home_pic.png" style="width: 35px;"> &nbsp;&nbsp;&nbsp;&nbsp; Home</a></li>
          <li><a href="edit.php"> &nbsp;&nbsp;&nbsp;&nbsp; <img src="img/edit.png" style="width: 35px;"> &nbsp;&nbsp;&nbsp;&nbsp; Edit</a></li>
          <li><a href="profile.php"> &nbsp;&nbsp;&nbsp;&nbsp; <img src="img/setting.png" style="width: 35px;"> &nbsp;&nbsp;&nbsp;&nbsp; Setting</a></li>
          <li><a href="index.php"> &nbsp;&nbsp;&nbsp;&nbsp; <img src="img/logout.png" style="width: 35px;"> &nbsp;&nbsp;&nbsp;&nbsp; Log Out</a></li>
        </ul>
      </div>

      <!-- src to js code for profile dropdown menu -->
      <script src="js_code/profile_dropdown.js"> </script>

    </div>
    <!-- profile dropdown menu ends-->

  </div>
</header>

<!-- css for profile dropdown menu -->
<style>
  .dropbtn {
    background-color: rgb(220, 220, 220);
    color: rgb(220, 220, 220);
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
  }

  .dropbtn:hover,
  .dropbtn:focus {
    background-color: #2980B9;
  }

  .dropdown {
    position: relative;
    display: inline-block;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #D8BEBE;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
    border-radius: 10px;
    right: 10px;
    width: 200px;
    height: 380px;
  }

  .dropdown-content a {
    color: black;
    padding: 20px 16px;
    text-decoration: double;
    display: table;
  }

  .show {
    display: block;
  }


/* complain and opinion dropdown  */
.dropbtn {
  background-color:rgb(220, 220, 220);
  color: black;
  /* padding: 16px; */
  font-size: 16px;
  border: none;
}


.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color:#ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color:rgb(220, 220, 220);}
/*  */


</style>