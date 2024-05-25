<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login As</title>
</head>

<body>
<style>body {
    	background-image: url('https://admission.uiu.ac.bd/Images/Img/carosol_img/Carosol_4.jpg');
    	color: #FFFFFF;
	}
		</style>
    <div class="wlcm">
        <h1>Welcome to <br> UIU STUDENT NEEDS!!!</h1>
        
    </div>

    <div class="login_as">
        <h1>login as</h1>
    </div>

    <div class="login-wrapper">
        <div class="login-container">
            <div class="login-row">
                <button id="admin-btn"> <a href="admin-login.php">Admin</button>
                <img src="img/admin2.png" alt="Admin"> <a href="admin-login.php">
            </div>
            
            <div class="login-row">
                <button id="user-btn"> <a href="login.php">Student</button>
                <img src="img/user2.jpg" alt="Student"><a href="login.php">
            </div>
        </div>
    </div>
</body>

</html>

<!-- css goes here -->
<style>
    .login-wrapper {
        border: 5px solid grey;
        width: 700px;
        height: 500px;
        margin: 0 auto;
        transform: translateX(400px) translateY(290px);
        border-radius: 7%;
        background-color: white;
        opacity: 0.9;
    }

    .login-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 500px;
        margin: 0 auto;
        color:black;
        transform: translateX(0px) translateY(60px);
    }

    .login-row {
        display: flex;
        align-items: center;
        margin-bottom: 40px;
    }

    button {
        border-radius: 7%;
        background-color: gray;
        border: 1px solid red;
        padding: 15px 0px;
        text-align: center;
        display: inline-block;
        font-size: 25px;
        cursor: pointer;
        width: 150px;
        height: 90px;
    }

    img {
        height: 100px;
        margin-left: 20px;
    }

    /* opacity of bg image */

    .login_as {
        position: absolute;
        top: 80px;
        left: 1250px;
        transform: translateX(15px) translateY(60px);
        font-size: 40px;
        color: black;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }

    .wlcm{
        position: absolute;
        top: 190px;
        left: 250px;
        transform: translateX(15px) translateY(60px);
        font-size: 30px;
        color: Black;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }

</style>