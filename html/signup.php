<?php
require_once ('Confiq.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/signup.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <title>Create an Account</title>
</head>
<body>
<div>
    <?php
    if(isset($_POST['create'])){
      print_r($_FILES["image-upload"]);   
      $filename=$_FILES["image-upload"]["name"];         
      $tep_name=$_FILES["image-upload"]["tmp_name"];
      $img_ex = pathinfo($filename, PATHINFO_EXTENSION);
      $img_ex_lc = strtolower($img_ex);
      $allowed_exs = array("jpg", "jpeg", "png"); 
      if(in_array($img_ex_lc, $allowed_exs)){

        $folder = "userDP/".$filename;
        move_uploaded_file($tep_name,$folder); 

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword= $_POST['cpassword'];
        $address = $_POST['address'];
        $contact = $_POST['conatct'];
        $user_type= $_POST['user_type'];
        $description= $_POST['description'];
        $select= "SELECT * FROM user_profile WHERE email='$email'";
        $result = mysqli_query($conn, $select);
        $num = mysqli_num_rows($result);
        if($num>0){
            echo "Email already exists";
        }else{
            if($password != $cpassword){
                echo "Password not matched";
            }
            else{
                $sql = "INSERT INTO user_profile(name, email, password, address,category,dp,conatact,description ) VALUES ('$name','$email','$password','$address','$user_type','$filename','$contact','$description')";
                if(mysqli_query($conn, $sql)){
                header("Location: login.php");
         
            }
                else{
               // echo 'User not submitted';
            }
                
            }
        }
      }
        
        else{
            //echo 'User not submitted';
        }
    }
    else{
        //echo 'User not submitted';
    }
    ?>
</div>
<form action="signup.php" method="post" class="container" enctype="multipart/form-data">
        <div class="left">
                    <img src="../images/logo1.png" alt=""  onclick="window.location.href='index.php'" style="cursor:pointer;">
                    <h1>Welcome to Art Patio!</h1>
                    <p>Already have an account?</p>
                    <a href="login.php">Sign in</a>
            
        </div>
        <div class="right">
            <h1>Create Account</h1>
            <div class="image">
                <img src="../images/facebook-f.svg" alt="">
                <img src="../images/google.svg" alt="">
                <img src="../images/linkedin-in.svg" alt="">
            </div>
         
            
            <input type="text" name="name"placeholder="Name" required>
            <input type="email" name="email"placeholder="Email" required>
            <input type="password" name="password"placeholder="Password"  required>
            <input type="password" name="cpassword"placeholder="Confirm password" required>
            <input type="text" name="address" placeholder="Address"required>
            <input type="text" name="conatct" placeholder="Contact"required>
            <!-- <input type="text" name="description" placeholder="description (180 words)"required> -->
            <textarea name="description" id="" cols="60" rows="5" placeholder="description" ></textarea>
            

            <input type="file" id="image-upload" name="image-upload" required>
            

            <select name="user_type" style="   padding: 10px; width: 400px; border: 0px solid #ccc; box-sizing: border-box; font-size: 16px; margin: 10px 0; background-color: #e5f3f3;" >
            <option value="Customer">Customer</option>
             <option value="Artist">Artist</option>
             <option value="Gallery">Gallery</option>
            </select>
            <button type="submit" name="create">Sign Up</button>
           
         
        </div>
</form>
    <script src="https://kit.fontawesome.com/28e6d5bc0f.js" crossorigin="anonymous"></script>
</body>
</html>



<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:ital@0;1&family=Ubuntu:ital@0;1&family=Varela+Round&display=swap');
body{
    margin: 0;
    padding: 0;
}
.container{
    width: 100%;
    display: flex;
}
.container .left{
    font-family: 'Offside', cursive;
    background-image: url("../images/blackbg.jpg");
    background-size: cover;
    background-color: black;
    color: white;
    width: 42%;
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    border-radius: 0px 30px 30px 0px;
    box-shadow:0 0 30px #4b4b4d;
}
.left img{
    width: 340px;
    display: flex;
    
}
.container .left p{
    width: 70%;
    margin-top: 0;
    text-align: center;
}
.container .left h1{
    font-size: 35px;
}
.container .left a{
    text-decoration:none;
    background-color: transparent;
    background-repeat: no-repeat;
    border: 1px solid white;
    padding: 13px 50px;
    border-radius: 33px;
    cursor: pointer;
    color: white;
    margin-top: 20px;
    overflow: hidden;
    outline: none;
}
.left a:hover {
    background-color: white;
    color: black;
}
.container .right{
    width: 58%;
    font-family: 'Roboto', sans-serif;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
input {
    padding: 10px;
    width: 400px;
    border: 0px solid #ccc;
    box-sizing: border-box; 
    font-size: 16px;
    margin: 10px 0;
    background-color: #e5f3f3;

  }
  
  .right .image{
    display: flex;
    gap: 10px;

  }
  .right .image img:nth-of-type(1){
    width: 10px;
    border: 1px solid gray;
    padding: 8px 10px;
    border-radius: 80%;
  }
  .right .image img:nth-of-type(1):hover{
    background-color: #5f9393;
  }
  .right .image img:nth-of-type(2){
    width: 15px;
    border: 1px solid gray;
    padding: 8.2px 8px;
    border-radius:90%;
  }
  .right .image img:nth-of-type(2):hover{
    background-color: #5f9393;
  }
  .right .image img:nth-of-type(3){
    width: 15px;
    border: 1px solid gray;
    padding: 8px 8px;
    border-radius: 80%;
  }
  .right .image img:nth-of-type(3):hover{
    background-color: #5f9393;
  }
  .right h1{
    color: #264747;
  }
  .right p{
    color: rgb(122, 121, 121);
    margin-top: 30px;
    font-size: 15px;
  }
  .right button {
    background-color: #000;
    background-repeat: no-repeat;
    border: 1px solid white;
    padding: 13px 50px;
    border-radius: 33px;
    cursor: pointer;
    color: white;
    margin-top: 20px;
    overflow: hidden;
    outline: none;
    border: none;
}
.right button:hover{
    background-color: #fff;
    border: 1px solid black;
    color: black;
}
select{
  padding: 10px;
  width: 400px;
  border: 0px solid #ccc;
  box-sizing: border-box; 
  font-size: 16px;
  margin: 10px 0;
  background-color: #e5f3f3;
}
/* .right a:hover{
  color: black;
  background-color: white;
} */

</style>