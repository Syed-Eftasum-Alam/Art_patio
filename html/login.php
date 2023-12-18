<?php
require_once('Confiq.php');
require_once('sendOTP.php');
session_start();

?>
<!DOCTYPE html>
<html>
<head>
  <title>Digital Art Gallery - Login</title>
  <!-- <link rel="stylesheet" href="../css/login.css"> -->
  
</head>
<body>

<div>
    <?php

    if(isset($_POST['create'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $select = "SELECT * FROM user_profile WHERE email = '$email' && password = '$password' ";
    $result = mysqli_query($conn, $select);
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_array($result);

        // Send OTP
        $uid = $row['id'];
        $_SESSION['uid'] = $row['id'];
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM otp where uid=$uid")) == 0) {
            $otp = rand(100000, 999999);
            mysqli_query($conn, "INSERT INTO otp (uid, otp) VALUES ('$uid', '$otp')");
            sendOTP($row, $otp);
        }

        header('location:otp.php');
    }
    else{
        echo "Incorrect email or password!";
        $error[] ="Incorrect email or password!";
    }


}
 ?>


</div>
  <div class="loginPart" >
    
    <div class="leftLogin">
        <div style="width: 70%;">
            <div class="imageDiv">
                <img src="../images/logo1.png" alt="" onclick="window.location.href='index.php'" style="cursor:pointer">
            </div>
            <h2 style="text-align: center;">Creativity takes courage</h2>
            <p>Creativity is allowing yourself to make mistakes. Art is knowing which ones to keep. <br>
                -Scott Adams</p>
            <div style="width: fit-content; margin: auto; margin-top: 50px;">
                <a href="signup.php"><button>Sign Up</button></a>
            </div>
        </div>
    </div>
    
    <div class="rightLogin">
        <h1>Sign in to Art Patio</h1>
        <!-- <p>or do it via email</p> -->
        
        <div style="width: fit-content; margin: auto;">
        <form action="" method="post">
            <span>E-mail</span><br>
            <input type="email" name="email" id="email" placeholder="@mail.com" class="input" required><br>
            <span>Password</span><br>
            <input type="password" name="password" id="password" placeholder="Password" class="input" required><br>
            <span style="color: rgb(155, 155, 155); font-size: 15px;" >Must be 8 character atleast</span><br>
            <div class="checkbox">
            <div >
                <input type="checkbox" name="" id=""> <span>Remember me</span>
            </div>
                
            <div>
                <a href="#">Forgot Password?</a>
            </div>
        </div>
            <br>      
        <button type="submit" name="create">Sign in</button>
        </form>
      
        <br>
        <!-- <span style="text-align: center; color: rgb(116, 116, 116); font-size: 15px;">@2023 All Rights Reserved</span> -->
    </div>
    </div>
  </div>
  <script src="https://kit.fontawesome.com/28e6d5bc0f.js" crossorigin="anonymous"></script>
  <script src="../js/script.js"></script>
</body>
</html>


<style>
    
@import url('https://fonts.googleapis.com/css2?family=Offside&display=swap');
  *{
    font-family: 'Offside', cursive;
  }

body{
    margin: 0;
    padding: 0;
    
    /* font-family: 'Ubuntu', sans-serif;
    font-family: 'Varela Round', sans-serif;
    font-family: 'Roboto', sans-serif; */
}
.loginPart{
    
    font-family: 'Offside', cursive;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    width: 100%;
}
.leftLogin{
    background: url("../images/blackbg.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    background-color: #000;
    width: 100%;
    color: white;
    height: 700px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 0px 30px 30px 0px;
    box-shadow:0 0 30px #4b4b4d;
}
.leftLogin span{
    margin: 50px 20px;
    background-color: #d3d3d3; 
    border-radius: 33px;
    padding: 10px;
    color: black;
}
.imageDiv{
    width: fit-content;
    margin: auto;
}
.leftLogin img{
    width: 350px;
}
.leftLogin button{
    border:1px solid white; 
    padding:15px 44px; 
    background-color:transparent;
    border-radius:33px; 
    color:white; 
    font-size:16px
}
.leftLogin button:hover{
    background-color: white;
    color: black;
    cursor: pointer;
}
.rightLogin{
    display: flex;
    flex-direction: column;
    justify-content: center;
    width: 100%;
}
.rightLogin h1,p{
    text-align: center;
}
.input {
    padding: 10px;
    width: 400px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box; 
    font-size: 16px;
    margin: 10px 0;
  }
  
  .input:focus {
    border-color: #007bff;
    outline: none;
  }
  .rightLogin button{
    text-align: center;
    display: inline-block;
    width: 400px;
    padding: 10px 20px;
    background-color: #000;
    color: #fff;
    border-radius: 4px;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
    cursor: pointer;
    margin: 50px 0;
    border: none;
  }
  .rightLogin button:hover {
    background-color: #fff;
    color: #000;
    border: 1px solid black;
  }
  
  .rightLogin button:active {
    background-color: #1c2a29;
  }
  .checkbox{
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
  }
  
</style>