<?php
     require_once ('Confiq.php');

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
  <script src="https://kit.fontawesome.com/28e6d5bc0f.js" crossorigin="anonymous"></script>
  <title>Event Page</title>
</head>
<body>

 <!-- Starts Nav code -->
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

<main>
  <form action="" method="GET">
  <div class="search-area">
      <span class="search-icon" style="padding-top: 5px;"><i class="fas fa-search" style="color: #b1b1b1;"></i></span>
      <input type="search" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>"class="form-control"  placeholder="Search Event">
  </div>
  </form>
</main>



  <div class="container">
   
    <?php
     if(isset($_GET['search'])){
                
      $filevalue=$_GET['search'];
      $query="SELECT * FROM event where  approval=1 and (eventname LIKE '%$filevalue%' or description LIKE '%$filevalue%')";
      $result = mysqli_query($conn, $query);
      $check_images= mysqli_num_rows($result);

      if($check_images>0){

          while($row= mysqli_fetch_array($result)){

              ?>
              <div class="card">
              <img src="../banner/<?php echo $row['img'];?>" alt="">
              <div class="overlay">
                <h1><?php echo $row['eventname']?></h1>
                <p>$<?php echo $row['priceTicket']?></p>
                <p><?php echo $row['description'];?></p>
                <div style="width: fit-content; margin: auto">
                <a href="eventDetail.php? eventID=<?php echo $row['eventID']  ?>" style="text-decoration:none;"><button>Event Details</button></a>
                </div>
            </div>
          </div>

              <?php

          }


      }
      else{
          echo "No Images";
      }
  }
    else{
         
         $query="SELECT * FROM event where approval=1";
         $result = mysqli_query($conn, $query);
         $check_images= mysqli_num_rows($result);
          if($check_images>0){
            while($row=mysqli_fetch_array($result)){

           ?>   
              <div class="card">
              <img src="../banner/<?php echo $row['img'];?>" alt="">
              <div class="overlay">
                <h1><?php echo $row['eventname']?></h1>
                <p>$<?php echo $row['priceTicket']?></p>
                <p><?php echo $row['description'];?></p>
                <div style="width: fit-content; margin: auto">
                <a href="eventDetail.php? eventID=<?php echo $row['eventID']  ?>" style="text-decoration:none;"><button>Event Details</button></a>
                </div>
            </div>
          </div>
    <?php
            }

          }
          else{
            echo "No image found";
          }
        }
        ?>
    
   
    
  </div>



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
    background-color: #f2efef;
    position: relative;
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



    main{
        margin-top: 80px;
        background-color: white;
    }
    main .search-area{
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        top: -33px;
    }
    main .search-area span{
        position: relative;
        left: 2.5rem;
    }
    main .search-area input{
        padding: 12px;
        padding-left: 60px;
        width: 40vw;
        height: 65px;
        border: none;
        border-radius: 10px;
        background-color: #fff;
        box-shadow:0 0 15px #d5d5d5;
        font-size: 17px;
    }



  .container{
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 30px;
    width: 95%;
    margin: auto;
    background-color: white;
    padding: 25px 50px;
    padding-bottom: 40px;
  }
  .card{
    position: relative;
    width: 100%;
    cursor: pointer;
    height: 400px;
    

  }
  .card img{
    display: block;
    width: 100%;
    height: 100%;
    border-radius: 10px;
    box-shadow:0 0 15px #1e1d1d;
  }
  .overlay{
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, .75);
    overflow: hidden;
    width: 100%;
    height: 0;
    transition: .5s ease;
  }
  .card:hover .overlay{
    height: 100%;
  }
  .card h1{
    width: 100%;
    color: white;
    font-size: 2vw;
    position: absolute;
    text-align: center;

  }
  .card p{
    text-align: center;
    color: white;
    font-size: 1.2vw;
    margin-top: 20%;
    margin-bottom: 10%;
    width: 100%;
    letter-spacing: 2px;
    line-height: 1.5em;
  }
  .card button{
        border: none;
        padding: 10px 40px;
        border-radius: 10px;
        color: #000;
        cursor: pointer;
        font-size: 1rem;
        background-color: #fff;
        display: flex;
        justify-content: center;
    }
    .card button:hover{
      background-color: #000;
      color: white;
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

  
    



</script>