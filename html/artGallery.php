<?php
     require_once ('Confiq.php');
     session_start();
     if(!isset($_SESSION['id'])){
         header("Location:../login.php");
         exit();
     }
     if(isset($_GET['eventID'])){
      $eventid= $_GET['eventID'];
      $q2="SELECT * FROM applyevent where event_id=$eventid and approval=1 ";
      $result2=mysqli_query($conn,$q2);
      $check_images= mysqli_num_rows($result2);
     }

     $q= "SELECT * FROM user_profile WHERE id = '".$_SESSION['id']."'";
      $result = mysqli_query($conn, $q);
      $row = mysqli_fetch_array($result);
      $name = $row['name'];
      $image = $row['dp'];
      $_SESSION['dp'] = $row['dp'];

      $q3= "SELECT * FROM event where eventID='$eventid' ";
      $result3 = mysqli_query($conn, $q3);
      $row3 = mysqli_fetch_array($result3);
      $eventname=$row3['eventname'];


      

     
     $datetime= date("Y-m-d H:i:s");

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
</head>
<body>
  
    <!-- Add the images and buttons to the HTML -->
    <div class="allImage">
    <h1 style="text-align: center; color: White; margin:0;"><?php echo"Welcome to ". $eventname?></h1>
    <h1 style="text-align: center; color: White; margin:0;"><?php echo $datetime?></h1>
      <div class="exit"><button onclick="window.location.href='customerpage.php'">Exit From the Gallery</button></div>
      <div>
        
       
       
        <div class="image-container">
        <?php
        if($check_images>0){
          while($row2 = mysqli_fetch_array($result2)){
             $artid= $row2['art_id'];
             $q3= "SELECT * FROM arts where artID='$artid' ";
             $result3 = mysqli_query($conn, $q3);
             $check_images= mysqli_num_rows($result3);
             $row3 = mysqli_fetch_array($result3);
             $img=$row3['img'];
             $title=$row3['title'];
             $description=$row3['description'];
             $price=$row3['price'];
             $material=$row3['material'];

            ?>
            
    
            <img src="arts/<?php echo $img?> " alt="Artwork" class="artwork">
         
        
          <?php
          }
          
        }
        ?>
         
      </div>
   

      <div class="exit"><button onclick="window.location.href='customerpage.php'">Exit From the Gallery</button></div>
    </div>

  
</body>
</html>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Offside&display=swap');
  *{
    font-family: 'Offside', cursive;
  }
    /* Style the image container */
    body{
        margin: 0;
        padding: 0;
        font-family: 'Offside', cursive;
    }
    .allImage{
        background-image: url(../images/background1.jpg);
        background-size: cover;
        background-repeat:repeat;
    }

    .exit{
      width: fit-content;
      margin: auto;
      
    }

    .exit button{
      border: none;
      background-color: red;
      color: white;
      padding: 10px 45px;
      cursor: pointer;
      margin: 30px 0;
      font-size: 18px;
      
    }
    .exit button:hover{
      background-color: tomato;
    }


    .image-container {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      grid-gap: 30px;
      width: 95%;
      margin: auto;
       /* background-color: transpare; */
    padding: 25px 50px;
    padding-bottom: 40px;
      }
      
      /* Style the image */
      .artwork {
        display: block;
        max-width: 100%;
        height: auto;
        cursor: pointer;
        box-shadow:0 0 20px #727272;
        transition: transform 0.4s ease-in-out;
        border: 15px solid white;
        border-radius: 10px;
      }
      .artwork:hover{
        transform: scale(1.1);
      }
      
      /* Style the button */
      .art-detail {
        position: absolute;
        bottom: 10px;
        left: 0;
        right: 0;
        margin: 0px auto 15px;
        padding: 10px 40px;
        background-color: #fff;
        color: black;
        font-size: 16px;
        text-align: center;
        border-radius: 8px;
        border: none;
        cursor: pointer;
      }
      
      /* Style the button when hovered over */
      .art-detail:hover {
        background-color: #000;
        color: white;
      }
      .detail{
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: black;
        width: 600px;
        padding: 20px;
        border: 1px solid black;
        border-radius: 5px;
        box-shadow:0 0 20px #404040;
        color: white;
        font-size: 20px;
      }
      .detail button{
        border: none;
        border-radius: 8px;
        padding: 10px 40px;
        background-color: red;
        font-size: 16px;
        color: white;
        cursor: pointer;
      }
      /* Style the expanded image */
      .expanded-image {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 9999;
        background-color: rgba(0, 0, 0, 0.8);
        display: flex;
        justify-content: center;
        align-items: center;
        object-fit: cover;
        transition: transform 0.4s ease-in-out;
      }

      .expanded-image:hover{
        transform: scale(.8);
      }
      
      /* Style the expanded image's inner image */
      .expanded-image img {
        width: 100vw;
        height: 100vh;
        /* transform: scale(0.5); */
        /* transition: height 0.3s ease-out; */
      }

      
  </style>

<script>
    const images = document.querySelectorAll('.artwork');
    const btns = document.querySelectorAll('.art-detail');
    const detail = document.querySelector('.detail');
    const closeBtn = document.getElementById('close');
      
      images.forEach(function(image) {
        image.addEventListener('click', function() {
          // Create a new image element
          const expandedImage = document.createElement('img');
          expandedImage.src = image.src;
          
          // Create a container for the expanded image
          const expandedImageContainer = document.createElement('div');
          expandedImageContainer.classList.add('expanded-image');

          // Add the expanded image to the container and append it to the body
      expandedImageContainer.appendChild(expandedImage);
      document.body.appendChild(expandedImageContainer);
      
      // Hide the image and button that was clicked
      image.style.display = 'none';
      image.nextElementSibling.style.display = 'none';
      
      // Add a click event listener to the expanded image to remove it
      expandedImage.addEventListener('click', function() {
        document.body.removeChild(expandedImageContainer);
        image.style.display = 'block';
        image.nextElementSibling.style.display = 'block';
      });

      
    });
    
  });

  btns.forEach(function(btn){
    btn.addEventListener('click', () =>{
        detail.style.display = 'block';
    });
  });


  closeBtn.addEventListener('click', () =>{
        detail.style.display = 'none';
    });

  
  
  
  </script>