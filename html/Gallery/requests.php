<?php

require_once ('Confiq.php');

session_start();
if(!isset($_SESSION['id'])){
    header("Location:../login.php");
    exit();
}

$owner= $_SESSION['id'];

$art_query= "SELECT * FROM applyevent where eventOwner=$owner and approval=0 ";
$art_result = mysqli_query($conn, $art_query);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <title>Request</title>
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


    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center">Requested Art Upload</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr class="bg-dark text-white">
                                <th>Event ID</th>
                                <th>Event Name</th>
                                <th>Applicant Id</th>
                                <th>Art ID</th>
                                <th>Image</th>
                            </tr>
                            <tr>
                                <?php
                                while($row = mysqli_fetch_assoc($art_result))
                                {

                                  $eventID= $row['event_id'];
                                  $_SESSION['eventID']=$eventID;
                                  $applicantID= $row['user_id'];
                                  $artID= $row['art_id'];
                                  $q12= "SELECT * FROM event where eventID=$eventID";
                                  $res12= mysqli_query($conn, $q12);
                                    $row12= mysqli_fetch_assoc($res12);
                                    $eventname=$row12['eventname'];

                                  $q11= "SELECT * FROM arts where artID=$artID";
                                  $result11= mysqli_query($conn, $q11);
                                  $row11= mysqli_fetch_assoc($result11);
                                  $img=$row11['img'];

                            ?>
                                <td><?php echo $eventID; ?></td>
                                <td><?php echo $eventname; ?></td>
                                <td><?php echo $applicantID; ?></td>
                                <td><?php echo $artID; ?></td>
                                <td><img src="../arts/<?php echo $img; ?>" width="100px" height="100px"></td>

                                <td><a href="artapproval.php? approve=<?php echo $artID; ?>" class="btn btn-primary">Approve</a></td>    
                                <td><a href="declineart.php? dltid=<?php echo $artID; ?>" class="btn btn-danger">Decline</a></td>

                                </tr> 

                                <?php
                                }
                                ?>
                            
                                
                           
                        </table>

                    </div>


                </div>

            </div>

        </div>

    </div>
    

</div>


<footer>
        <div class="logo">
            <img src="../../images/logo1.png" alt="" class="logoPic">
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
  }

  
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

.container{
    width: 100%;
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