<?php
     require_once ('Confiq.php');

     session_start();
     if(!isset($_SESSION['id'])){
         header("Location:../login.php");
         exit();
     }
     if(isset($_GET['eventID'])){
        $id = $_GET['eventID'];
        $query = "SELECT * FROM event WHERE eventID = $id";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        $userid= $row['user_id'];
        $eventname =$row['eventname'];
        $startDate=$row['startDate'];
        $endDate=$row['endDate'];
        $starttime= $row['startTime'];
        $endtime=$row['endTime'];
        $price=$row['priceTicket'];
        $img=$row['img'];
        $description=$row['description'];
        

        $query1 = "SELECT * FROM user_profile WHERE id = $userid";
        $result1 = mysqli_query($conn, $query1);
        $row1 = mysqli_fetch_array($result1);
        $username=$row1['name'];
        $address= $row1['address'];

        $userid1=$_SESSION['id'];
        $q= "SELECT * FROM ticketbuy WHERE user_id=$userid1 AND event_id=$id";
        $r=mysqli_query($conn,$q);
        if(mysqli_num_rows($r)>0){
            $buy=1;
            $statement="You have already bought this ticket";
        }
        else{
            $buy=0;
            $statement="To join the event you need to purchase the ticket";
        }
         
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/28e6d5bc0f.js" crossorigin="anonymous"></script>
  <title>Demo Art Detail</title>
</head>
<body>

  <!-- Starts Nav code -->
  <nav>
    <div class="nav">
        <div class="left">
            <img src="logo1.png" alt="">
            <span onclick="window.location.href='artistpage.php'">Home</span>
            <span onclick="window.location.href='art.php'">Arts</span>
            <span onclick="window.location.href='Artists.php'">Artists</span>
            <span onclick="window.location.href='event.php'">Events</span>
            <span onclick="window.location.href='event.php'">Events</span>
            <span onclick="window.location.href='ongoinevent.php'">On Going Events</span>
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
                <a href="artistprofile.php">Profile</a>
                    <a href="artistrfav.php">Favourite</a>
                    <a href="purchasedarts.php">Purchased Arts</a>
                    <a href="purchasedtickets.php">Purchased Tickets</a>
                    <a href="uploadTheArt.php">Upload Arts</a>
                    <a href="withdraw1.php">Withdraw Coin</a>
                    <a href="../logout.php" style="color:tomato;">Logout</a>
            </div>
            
            <!-- <span>Sign in</span>
            <button>Sign up</button> -->
        </div>
    </div>
    <!-- <hr style="position: relative; margin: 0; color: rgb(238, 235, 235)"> -->
</nav>
<!-- Ends Nav code -->

<div class="eventPopup">
		<h2>Do you want to purchase the ticket?</h2>
        <div style="display: flex; gap: 20px; justify-content: end;">
            <button class="eventYesBtn">Yes</button>
		    <button class="eventNoBtn">No</button>
            
        </div>
</div>

<div class="eventPopup2">
		<h2>You already purchase the ticket.</h2>
        <div style="display: flex; gap: 20px; justify-content: end;">
            <button class="eventCloseBtn">Close</button>
            
        </div>
</div>

<div class="container">
    <div class="image">
        <img src="../banner/<?php echo $img ?>" alt="">
    </div>
    <div class="details">
       <h1><?php echo $eventname?></h1> 
        
        <p><span>Host: </span><?php echo $username?></p>
        <p><span>Starting Date: </span><?php echo $startDate?></p>
        <p><span>Ending Date: </span><?php echo $endDate?></p>
        <p><span>Starting Time: </span><?php echo $starttime?></p>
        <p><span>Ending Time: </span><?php echo $endtime?></p>
        <p><span>Ticket Price: </span><?php echo $price?></p>
        <p><span>Address: </span><?php echo $address ?></p>

        
        <div>
            <a href="pdfmaker2.php?eventID=<?php echo $id  ?>" class=""><button>Download Invoice</button></a>
    
        </div>
       

    </div>
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





.eventPopup , .eventPopup2{
  display: none;
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: white;
  width: 400px;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-shadow:0 0 20px #404040;
}

 .eventCloseBtn, .eventNoBtn{
  background-color: #f44336;
  border: none;
  color: white;
  padding: 10px 33px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin-top: 20px;
  cursor: pointer;
  border-radius: 12px;
}

.eventYesBtn {
  background-color: #000;
  border: none;
  color: white;
  padding: 10px 30px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin-top: 20px;
  cursor: pointer;
  border-radius: 8px;
}




    .container{
        width: 80%;
        background-color: #D9D9D9;
        margin: 30px auto;
        display: flex;
        justify-content: space-evenly;
        padding: 30px;
        border-radius: 20px;
        box-shadow:0 0 20px #404040;
    }
    .container .image{
        width: 40%;
        display: flex;
        align-items: center;
        
    }
    .container .image img{
        width: 90%;
        border-radius: 20px;
        box-shadow:0 0 20px #141414;
        
        
    }
    .container .details{
        width: 50%;
    }
    .container .details h1{
        font-size: 40px;
        text-decoration: underline;
    }
    .container .details p{
        font-size: 20px;
    }
    .container .details p span{
        font-weight: bold;
    }
    
    .container .details button{
        border: none;
        padding: 12px 40px;
        cursor: pointer;
        background-color: #000;
        font-size: 16px;
        color: white;
        border-radius: 15px;
    }
    .container .details button:hover{
        background-color: transparent;
        color: #000;
        border: 1px solid black;
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

    const purchaseBtn = document.querySelector('.purchaseBtn');
    const eventPopup = document.querySelector('.eventPopup');
    const eventPopup2 = document.querySelector('.eventPopup2');
    const eventYesBtn = document.querySelector('.eventYesBtn');
    const eventNoBtn = document.querySelector('.eventNoBtn');
    const eventCloseBtn = document.querySelector('.eventCloseBtn');

    purchaseBtn.addEventListener('click',() =>{
        <?php
        $q= "SELECT * FROM ticketbuy WHERE user_id=$userid AND event_id=$id";
        $a=mysqli_query($conn,$q);
        $x = mysqli_num_rows($a);
        ?>
        console.log(<?php echo $x?>);
        if(<?php echo $x?> == 0){
            eventPopup.style.display = 'block';
        }
        else{
            eventPopup2.style.display = 'block';
        }
    })
    eventYesBtn.addEventListener('click',()=>{
        eventPopup.style.display = 'none';
        purchaseBtn.href = 'eventTicketbuy.php? eventID=<?php echo $row['eventID']  ?>';
        purchaseBtn.click();
    })
    eventNoBtn.addEventListener('click',()=>{
        eventPopup.style.display = 'none';
    })
    eventCloseBtn.addEventListener('click',()=>{
        eventPopup2.style.display = 'none';
    })
    


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