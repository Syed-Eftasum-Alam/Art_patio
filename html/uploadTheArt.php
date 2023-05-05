<?php
require_once ('Confiq.php');
session_start();
if(!isset($_SESSION['id'])){
  header("Location:login.php");
  exit();
}
$sql11= "SELECT * FROM user_profile WHERE id=".$_SESSION['id'];
$result11= mysqli_query($conn,$sql11);
$row11= mysqli_fetch_assoc($result11);
$currancy= $row11['currancy'];
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/uploadTheArt.css">
    <title>Upload The Art</title>
</head>
<body>
    <!-- Navbar html code -->
    <nav>
        <div class="imgDiv">
            <div class="logo">
                <img src="../images/logo1.png" alt="" class="artpatioLogo">
            </div>
            <div class="home">
                <span>Home</span>
                <div class="dropdown">
                    <img src="../images/profileLogo.png" alt="" class="profileLogo" onclick="toggleDropdown()">
                    <div id="myDropdown" class="dropdown-content">
                    <a href="#">Art Gallery</a>
                    <a href="#">Art Exhibution</a>
                    <a href="#">Gallery Owner</a>
                    <a href="#">Purchase Art</a>
                    <a href="#">Artists</a>
                    <a href="logout.php" style="text-decoration:none;">Logout</a>
                </div>
                </div>
            </div>
        </div>    
    </nav>
    <div>

    <?php
    if($_SESSION['email']==FALSE){
        header("Location: login.php");
    }
      $ownerID=$_SESSION['id'];
      // echo $ownerID;
      if(isset($_POST['create'])){
        //print_r($_FILES["image-upload"]);     
        $filename=$_FILES["image-upload"]["name"];         
        $tep_name=$_FILES["image-upload"]["tmp_name"];
        $img_ex = pathinfo($filename, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        $allowed_exs = array("jpg", "jpeg", "png"); 

      if(in_array($img_ex_lc, $allowed_exs)){

      $folder = "arts/".$filename;
      move_uploaded_file($tep_name,$folder);  
      $tile=$_POST['title'];
      $type=$_POST['type'];
      $matrial=$_POST['material'];
      $price=$_POST['price'];
      $initialbid=$_POST['initialbid'];
      $description=$_POST['description'];
      $height=$_POST['height'];
      $width=$_POST['width'];
      $approval=0;
      $status="Available";
      $sql= "INSERT INTO arts (user_id,title,type,material,price,initalbid,description,img,approval,status,height,width) VALUES ('$ownerID','$tile','$type','$matrial','$price','$initialbid','$description','$filename','$approval','$status','$height','$width')";
     
      $result=mysqli_query($conn,$sql);
       if($result){
           header("Location: artistpage.php");
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

    <form action="uploadTheArt.php" method="post" style="width: 80%; margin:30px auto; background-color: #EFEAEA; padding: 15px;"enctype="multipart/form-data">
        <div class="uploadField">
            <div class="uploadArt">
                <div style="width: fit-content; margin: auto;">
                    <img src="../images/upload.png" alt="" id="uploaded-image">
                </div>
                <form action=""method="post"enctype="multipart/form-data">
                    <div>
                        <label for="image-upload" class="upload">Upload Art</label>
                        <input type="file" id="image-upload" name="image-upload" required>
                    </div>
                </form>
            </div>
            <div class="artDetail">
                <table>
                    <tr>
                      <td>Title:</td>
                      <td><input type="text" name="title" required></td>
                    </tr>
                    <tr>
                      <td>Type:</td>
                      <td><input type="text" name="type"required></td>
                    </tr>
                    <tr>
                      <td>Material:</td>
                      <td><input type="text"name="material"required></td>
                    </tr>
                    <tr>
                      <td>Price:</td>
                      <td><input type="text"name="price"required></td>
                    </tr>
                    <tr>
                      <td>Initial Bid :</td>
                      <td><input type="text"name="initialbid"required></td>
                    </tr>
                    <tr>
                      <td>Height</td>
                      <td><input type="text"name="height"required></td>
                    </tr>
                    <tr>
                      <td>Width</td>
                      <td><input type="text"name="width"required></td>
                    </tr>
                    <tr>
                      <td colspan="2"><textarea name="description" cols="30" rows="10" style="width: 100%; border: none; background-color: #D9D9D9; font-size: 15px;" placeholder="Short Description Of Art (200 Words)"required></textarea></td>
                    </tr>
                    
                  </table>
                  <button type="submit" name="create" style="border: none; padding: 10px 30px; background-color: #488280; color: white; font-size: 15px; margin-bottom: 10px;">Post</button>
            </div>
        </div>
        <div style="width: fit-content; margin:20px auto; ">
        
        </div>
    </form>
</body>
</html>


<script>
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
</script>