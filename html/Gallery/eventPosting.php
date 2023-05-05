<?php
require_once('Confiq.php');

session_start();
if(!isset($_SESSION['id'])){
    header("Location:../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery Owner Event Posting</title>
    <!-- <link rel="stylesheet" href="../../css/eventPosting.css"> -->
</head>
<body>
<nav>
    <div class="nav">
        <div class="left">
        <a href="../index3.php"> <img src="logo1.png" alt=""></a>
            <span onclick="window.location.href='gallerypage.php'">Home</span>
            <span onclick="window.location.href='art.php'">Arts</span>
            <span onclick="window.location.href='Artists.php'">Artists</span>
            <span onclick="window.location.href='gallery.php'">Gallery</span>
            <span onclick="window.location.href='event.php'">Events</span>
            <!-- <span>Higher Designers</span> -->
        </div>
        <div class="right">
          
            <!-- <div class="search-area">
                <span class="search-icon" style="padding-top: 5px;"><i class="fas fa-search" style="color: #b1b1b1;"></i></span>
                <input type="search" name="" id="" placeholder="Search">
            </div> -->
            <a href="addFunds.php"  style="text-decoration:none;"><span>$<?php echo $_SESSION['currancy'] ?></span></a>
            <div style="position: relative;">
            <img  src="../userDP/<?php echo $_SESSION['dp'] ?> " alt="" onclick=showDropdown()>
                <div id="myDropdown" class="dropdown-content">
                <a href="galleryprofile.php">Profile</a>
                    <!-- <a href="galleryfav.php">Favourite</a>
                    <a href="purchasedarts.php">Purchased Arts</a> -->
                    <a href="requests.php">Requests</a>
                    <a href="eventPosting.php">Event Post</a>
                    <a href="withdraw1.php">Withdraw Coin</a>
                    <a href="purchasedarts.php">Purchased Arts</a>
                    <a href="galleryfav.php">Favourite</a>
                    <a href="../logout.php" style="color:tomato;">Logout</a>
            </div>
            
            <!-- <span>Sign in</span>
            <button>Sign up</button> -->
        </div>
    </div>
    <!-- <hr style="position: relative; margin: 0; color: rgb(238, 235, 235)"> -->
</nav>
<!-- Ends Nav code -->


    <div>
      <?php

      if($_SESSION['email']==FALSE){
        header("Location: login.php");
      }
      $ownerID=$_SESSION['id'];
      if(isset($_POST['create'])){
      $filename=$_FILES["image-upload"]["name"];
      $tep_name=$_FILES["image-upload"]["tmp_name"];
       $img_ex = pathinfo($filename, PATHINFO_EXTENSION);
       $img_ex_lc = strtolower($img_ex);
       $allowed_exs = array("jpg", "jpeg", "png"); 

      if(in_array($img_ex_lc, $allowed_exs)){

      $folder = "../banner/".$filename;
      move_uploaded_file($tep_name,$folder);  
      $eventname=$_POST['eventname'];
      $ticektPrice=$_POST['ticektPrice'];
      $startDate=$_POST['startDate'];
      $startTime=$_POST['startTime'];
      $endDate=$_POST['endDate'];
      $endTime=$_POST['endTime'];
      $description=$_POST['description'];
      $sql="INSERT INTO event (eventname,user_id,startDate,startTime,endDate,endTime,description,priceTicket,img) VALUES ('$eventname','$ownerID','$startDate','$startTime','$endDate','$endTime','$description','$ticektPrice','$filename')";
      $result=mysqli_query($conn,$sql);
       if($result){
           header("Location: gallerypage.php");
       }else{
           echo "fail";
     }
  }
  else{
    echo "You can't upload files of this type";
  }
      
       
}
      ?>

    </div>

    <form action="" method="post" class="imageUpload" enctype="multipart/form-data">
        <div style="width: fit-content; margin: auto; ">
            <img id="uploaded-image" src="../../images/upload.png" alt="">
        </div>
        <br>
        
        <div>
            <label for="image-upload" class="upload">Upload Event Cover</label>
            <input type="file" id="image-upload" name="image-upload" required>
        </div>
       
        <table style="width: 50%; border: none; margin: 20px auto;">
            <tr>
              <td>Event Name:</td>
              <td><input type="text" name="eventname"required></td>
              <td>Ticket Pricing:</td>
              <td><input type="number" name="ticektPrice"required></td>
            </tr>
            <tr>
              <td>Event Date:</td>
              <td><input type="date" name="startDate"required></td>
              <td>Starting Time:</td>
              <td><input type="time" name="startTime"required></td>
            </tr>
            <tr>
              <td>Ending Date:</td>
              <td><input type="date" name="endDate"required></td>
              <td>Ending Time:</td>
              <td><input type="time" name="endTime"required></td>
            </tr>
          </table>
        <div style="width: fit-content; margin: auto; margin-bottom: 10px;">
            <textarea id="description" name="description" rows="5" cols="50" placeholder="Event Description (400 words)" required></textarea>
        </div>
        <div style="width: fit-content; margin:20px auto; ">
            <button type="submit" name="create" class = "post">Post</button>
        </div>
    </form>


    <footer>
        <div class="logo">
            <img src="logo1.png" alt="" class="logoPic">
            <span>Dribbble is the world’s leading community for creatives to share, grow, and get hired. </span>
            <div style="display: flex; flex-direction:column; gap:10px; align-items:center;">
                <div>
                    <h2 style="margin:0; color:white; font-size:17px">Connected Us With</h2>
                </div>
                <div style="display: flex; gap: 20px; align-items: center;">
                    <a href="facebook.com"><img src="../../images/facebook-f.svg" alt="" style="width: 8px; background-color: white; padding:8px 12px;"></a> 
                    <img src="../../images/linkedin-in.svg" alt="" >
                    <img src="../../images/google.svg" alt="">
                    <img src="../../images/linkedin-in.svg" alt="" >
                </div>
            </div>
        </div>
        
    </footer>
      
    
    
    
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
    background-color: #d6d0d0;
}

 /* Starts Nav Code */

 .nav{
  width: 100%;
  height: 80px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #000;
  box-shadow:0 0 15px #a5a5a5;
  
}
nav .left, .right{
  display: flex;
  gap: 18px;
  align-items: center;
  margin-right: 15px;
}
.right{
margin-right: 60px;
}
nav .left img{
  width: 200px;
}
nav .right img{
        width: 35px;
        height: 35px;
        cursor: pointer;
        border-radius: 50px;
    }
nav .left span, .right span{
  color: rgb(237, 234, 234);
  cursor: pointer;
  font-weight: 600;
  padding: 0 20px;
}
nav .left span:hover, .right span:hover{
  color: white;
  text-decoration:underline;
}
nav .right .search-area{
  display: flex;
  align-items: center;
  position: relative;
}
nav .right .search-area span{
  position: absolute;
  left: .8rem;
}
nav .right .search-area input{
  padding: 12px;
  padding-left: 40px;
  width: 15vw;
  border: none;
  border-radius: 10px;
  background-color: #f2efef;
  font-size: 17px;
}
nav .right .search-area input:hover{
  background-color: #fff;
  border: 4px solid rgba(248, 178, 166, 0.2);
}
nav .right button{
  border: none;
  padding: 10px 22px;
  border-radius: 10px;
  background-color: white;
  color: #5FB090;
  font-size: 1rem;
  cursor: pointer;
}
nav .right button:hover{
  background-color: #5FB090;
  color: white;
  border: 2px solid black;
  margin: 0;
}

.dropdown-content {
  display: none;
  position: absolute;
  top: 52px;
  left: -50px;
  z-index: 1;
  width: fit-content;
  background-color: black;
}

.dropdown-content a{
  color: white;
  text-decoration: none;
  width: 100%;
  padding: 10px 20px;
  margin: 0px 0;
  background-color: black;
}
.dropdown-content a:hover{
  background-color: white;
  color: black;
}

/* Ends Nav code */

form div{
    width: fit-content;
    margin: auto;
}
input[type="file"] {
    display: none;
  }
  
.upload , .post{
    display: inline-block;
    padding: 10px 35px;
    background-color: #000;
    border: none;
    border-radius: 5px;
    margin: 10px auto;
    color: white;
    cursor: pointer;
    
  }
  
  .upload:hover, .post:hover {
    background-color: #fff;
    color: black;
  }
  
  input[type="file"]:focus + .upload {
    outline: 1px dotted #000;
    outline: -webkit-focus-ring-color auto 5px;
  }
  
  input[type="file"]:valid + .upload {
    background-color: #5cb85c;
    color: #fff;
  }
  .imageUpload{
    width: 80%;
    background: #EFEAEA;
    margin: auto;
  }
  #uploaded-image{
    width: 100%;
    height: 200px;
    margin: 20px auto;
  }
  table {
    border-collapse: collapse;
    width: 100%;
  }
  
  td {
    text-align: left;
    width: fit-content;
    padding: 8px ;
    font-size: 20px;
    font-weight: bold;
  }
  input{
    padding: 10px;
    width: 300px;
    background-color: #D9D9D9;
    border: none;
    height: 30px;
    border-radius: 20px;
    margin: 10px 0;
  }
  textarea {
    border: 2px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    font-size: 16px;
    background-color: #fff;
    color: #333;
  }
  
  textarea:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px #007bff;
    outline: none;
  }



  footer{
        background-color: #000;
        padding: 20px 0;
        display: flex;
        gap: 50px;
        width: 100%;
        justify-content: center;
        bottom: 0;
        margin-top: 60px;
        
    }
    footer .logo{
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 80%;
        gap: 20px;
        margin-left: 20px;
    }
    footer .logoPic{
        width: 200px;
        cursor: pointer;
    }
    footer .logo div img{
        width: 10px;
        cursor: pointer;
        background-color: white; 
        padding:8px 12px;
        border-radius: 12px;
    }
    footer .logo span{
        color: rgb(222, 219, 219);
        margin-bottom: 10px;
    }
    img {
        border-radius: 50%;
    }
    

</style>


<script>


function showDropdown() {
        var dropdown = document.getElementById("myDropdown");
        if (dropdown.style.display === "flex") {
            dropdown.style.display = "none";
        } 
        else {
            dropdown.style.display = "flex";
            dropdown.style.flexDirection = "column";
            dropdown.style.gap = "0px";
        }
    }


    const input = document.querySelector('#image-upload');
    const image = document.querySelector('#uploaded-image');

input.addEventListener('change', function() {
const file = this.files[0];
if (file) {
    const reader = new FileReader();
    reader.addEventListener('load', function() {
    image.setAttribute('src', reader.result);
    });
    reader.readAsDataURL(file);
}
});
function toggleDropdown() {
    document.getElementById("myDropdown").classList.toggle("show");
}
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    for (var i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

</script>