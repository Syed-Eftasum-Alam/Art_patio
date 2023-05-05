<?php
    require_once ('Confiq.php');
    session_start();

    if(isset($_GET['eventID'])){
      $eventiD= $_GET['eventID'];
    }
    if(isset($_POST['login'])){
      $eventid=$_POST['eventid'];
      $pass=$_POST['password'];

      $select="SELECT * FROM event where eventID='$eventid'";
      $result=mysqli_query($conn, $select);
      $row=mysqli_fetch_array($result);

      $password = $row['password'];
      if($eventiD==$eventid && $pass=$password){
         header("Location:artGallery.php? eventID= $eventiD");
   
      }
   
      else{
         echo "Wrong Credential";
      }
   }
 

   
 ?>
 
 <!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	
</head>
<body>
	<div class="container">
		<form action="#" method="post">
            <h2>Login To The Event</h2>
			<!-- <label for="userid">User ID:</label> -->
			<input type="text" id="eventid" name="eventid" required placeholder="Event id">
			<!-- <label for="password">Password:</label> -->
			<input type="password" id="password" name="password" required placeholder="Password">
			<div>
                <button type="submit" name="login">Login</button>
                <button onclick="window.location.href='customerpage.php'">Home</button>
            </div>
            
            <span>You will have Your Event Id and Password in Ticket invoice</span>
		</form>
	</div>
</body>
</html>



<style>
    @import url('https://fonts.googleapis.com/css2?family=Offside&display=swap');
  *{
    font-family: 'Offside', cursive;
  }
    body {
        background-color: #414141;
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }
    h2{
        color: tomato;
    }
    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }
    form {
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: #fff;
        padding: 30px;
        border-radius: 5px;
        box-shadow: 0px 5px 20px rgba(0,0,0,0.1);
        width: 300px;
    }
    input[type="text"], input[type="password"] {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 16px;
        box-sizing: border-box;
    }
    button[type="submit"] , button{
        background-color: #000;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    button[type="submit"]:hover, button:hover {
        background-color: #fff;
        color: black;
        border: 1px solid black;
        margin: 0;
    }
    span{
        margin-top: 20px;
        color: rgb(75, 75, 75);
        text-align: center;
    }
</style>