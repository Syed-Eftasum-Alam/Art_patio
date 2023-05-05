<?php

require_once ('Confiq.php');
session_start();

$user_query= "SELECT * FROM user_profile where category!='Admin'";
$user_result = mysqli_query($conn, $user_query);

$art_query= "SELECT * FROM arts where approval=0";
$art_result = mysqli_query($conn, $art_query);

$user_currency= "SELECT * FROM user_profile where requestCurrency=1 or requestCurrency=-1";
$user_currency_result = mysqli_query($conn, $user_currency);

$art_query2= "SELECT * FROM arts where approval=1";
$art_result2 = mysqli_query($conn, $art_query2);

$event_query= "SELECT * FROM event where approval=0";
$event_result = mysqli_query($conn, $event_query);

$event_query2= "SELECT * FROM event where approval=1";
$event_result2 = mysqli_query($conn, $event_query2);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <title>Admin Page</title>
</head>
<body>
<div>  
<?php
if($_SESSION['email']==FALSE){
    header("Location: login.php");
}
  
?>
<!-- Starts Nav code -->
<nav>
    <div class="nav">
      <div class="left">
      <a href="../indexAdmin.php"> <img src="../6.png" alt=""></a>
            <span onclick="window.location.href='../indexAdmin.php'">Home</span>
            
            <!-- <span>Higher Designers</span> -->
        </div>
        <div class="right">
          
            <!-- <div class="search-area">
                <span class="search-icon" style="padding-top: 5px;"><i class="fas fa-search" style="color: #b1b1b1;"></i></span>
                <input type="search" name="" id="" placeholder="Search">
            </div> -->
            <div style="position: relative;">
                <img src="profileLogo.png" alt="" onclick=showDropdown()>
                <div id="myDropdown" class="dropdown-content">
                    
                    <a href="../logout.php" style="color:tomato;">Logout</a>
                </div>
            </div>
            
            <!-- <span>Sign in</span>
            <button>Sign up</button> -->
        </div>
    </div>
    <!-- <hr style="position: relative; margin: 0; color: rgb(238, 235, 235)"> -->
</nav>
<!-- Ends Nav code -->

  <div class="container" style="margin-top:20px">
        <div class="display-6 text-center">
                <div>
                    <h2 >Welcome Admin</h2>
                </div>
        </div>

  </div>  

    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center">All User Data</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr class="bg-dark text-white">
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Category</th>
                                <th>Address</th>
                                
                            </tr>
                            <tr>
                                <?php
                                while($row = mysqli_fetch_assoc($user_result))
                                {
                                    $id=$row['id'];
                                    $name=$row['name'];
                                    $email=$row['email'];
                                    $category=$row['category'];
                                    $address=$row['address'];

                            ?>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $email; ?></td>
                                <td><?php echo $category; ?></td>
                                <td><?php echo $address; ?></td>
                                <td><a href="delete.php? dltid=<?php echo $id; ?>" class="btn btn-danger">Delete</a></td>

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
                                <th>Artist ID</th>
                                <th>Art Id</th>
                                <th>Art title</th>
                                <th>Type</th>
                                <th>Material</th>
                                <th>Price</th>
                                <th>Initial bid</th>
                                <th>description</th>
                                <th>Image</th>
                            </tr>
                            <tr>
                                <?php
                                while($row = mysqli_fetch_assoc($art_result))
                                {

                                    $artistid=$row['user_id'];
                                    $artid=$row['artID'];
                                    $arttitle=$row['title'];
                                    $type=$row['type'];
                                    $material=$row['material'];
                                    $price=$row['price'];
                                    $initialbid=$row['initalbid'];
                                    $description=$row['description'];
                                    $img=$row['img'];

                            ?>
                                <td><?php echo $artistid; ?></td>
                                <td><?php echo $artid; ?></td>
                                <td><?php echo $arttitle; ?></td>
                                <td><?php echo $type; ?></td>
                                <td><?php echo $material; ?></td>
                                <td><?php echo $price; ?></td>
                                <td><?php echo $initialbid; ?></td>
                                <td><?php echo $description; ?></td>
                                <td><img src="../arts/<?php echo $img; ?>" width="100px" height="100px"></td>

                                <td><a href="artapproval.php? approve=<?php echo $artid; ?>" class="btn btn-primary">Approve</a></td>    
                                <td><a href="deleteart.php? dltid=<?php echo $artid; ?>" class="btn btn-danger">Decline</a></td>

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

<div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center">Requestes For purchasing our Coins or Withdraw Money</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr class="bg-dark text-white">
                                <th>User Name</th>
                                <th>User ID</th>
                                <th>Requested Amount</th>
                                <th>Status</th>

                            </tr> 
                            <?php
                                while($row = mysqli_fetch_assoc($user_currency_result))
                                {

                                    $username=$row['name'];
                                    $id=$row['id'];
                                    $req=$row['requestedCurrency'];
                                    $status=$row['requestCurrency'];
                                    if($status==1){
                                        $status="Coin Purchase";
                                    }
                                    else{
                                        $status="Coin Withdraw";
                                    }

                            ?>
                                <td><?php echo $username; ?></td>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $req; ?></td>
                                <td><?php echo $status; ?></td>
                                <td><a href="rechargeORwithdraw.php? approve=<?php echo $id; ?>" class="btn btn-primary">Approve</a></td>    
                                <td><a href="decline.php? dltid=<?php echo $id; ?>" class="btn btn-danger">Decline</a></td>

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
<div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center">All Registered Arts Data</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr class="bg-dark text-white">
                                <th>Artist ID</th>
                                <th>Art Id</th>
                                <th>Art title</th>
                                <th>Type</th>
                                <th>Material</th>
                                <th>Price</th>
                                <th>Initial bid</th>
                                <th>Status</th>
                                <th>description</th>
                                <th>image</th>
                                
                            </tr>
                            <tr>
                                <?php
                                while($row = mysqli_fetch_assoc($art_result2))
                                {
                                    $artistid=$row['user_id'];
                                    $artid=$row['artID'];
                                    $arttitle=$row['title'];
                                    $type=$row['type'];
                                    $material=$row['material'];
                                    $price=$row['price'];
                                    $initialbid=$row['initalbid'];
                                    $description=$row['description'];
                                    $status= $row['status'];
                                    $img= $row['img'];

                            ?>
                                 <td><?php echo $artistid; ?></td>
                                <td><?php echo $artid; ?></td>
                                <td><?php echo $arttitle; ?></td>
                                <td><?php echo $type; ?></td>
                                <td><?php echo $material; ?></td>
                                <td><?php echo $price; ?></td>
                                <td><?php echo $initialbid; ?></td>
                                <td><?php echo $status; ?></td>
                                <td><?php echo $description; ?></td>
                                <td><img src="../arts/<?php echo $img; ?>" width="100px" height="100px"></td>
                                <td><a href="deleteart.php? dltid=<?php echo $artid; ?>" class="btn btn-danger">Delete</a></td>

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
<div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center">Request for event</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr class="bg-dark text-white">
                                <th>USer ID</th>
                                <th>event Id</th>
                                <th>Event Name</th>
                                <th>Start Date</th>
                                <th>Start time</th>
                                <th>End Date</th>
                                <th>End Time</th>
                                <th>Ticket Price</th>
                                <th>description</th>
                                <th>Banner</th>
                                
                            </tr>
                            <tr>
                                <?php
                                while($row = mysqli_fetch_assoc($event_result))
                                {
                                    $userid=$row['user_id'];
                                    $eventid=$row['eventID'];
                                    $eventtitle=$row['eventname'];
                                    $startDate=$row['startDate'];
                                    $startTime=$row['startTime'];
                                    $endDate=$row['endDate'];
                                    $endTime=$row['endTime'];
                                    $ticketPrice=$row['priceTicket'];
                                    $description=$row['description'];
                                    $banner= $row['img'];

                            ?>
                                <td><?php echo $userid; ?></td>
                                <td><?php echo $eventid; ?></td>
                                <td><?php echo $eventtitle; ?></td>
                                <td><?php echo $startDate; ?></td>
                                <td><?php echo $startTime; ?></td>
                                <td><?php echo $endDate; ?></td>
                                <td><?php echo $endTime; ?></td>
                                <td><?php echo $ticketPrice; ?></td>
                                <td><?php echo $description; ?></td>
                                <td><img src="../banner/<?php echo $banner; ?>" width="100px" height="100px"></td>
                                <td><a href="approveevent.php? approve=<?php echo $eventid; ?>" class="btn btn-primary">Approve</a></td>
                                <td><a href="declineevent.php? dltid=<?php echo $eventid; ?>" class="btn btn-danger">Decline</a></td>

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

<div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center">All Registered Event</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr class="bg-dark text-white">
                                <th>USer ID</th>
                                <th>event Id</th>
                                <th>Event Name</th>
                                <th>Start Date</th>
                                <th>Start time</th>
                                <th>End Date</th>
                                <th>End Time</th>
                                <th>Ticket Price</th>
                                <th>description</th>
                                
                            </tr>
                            <tr>
                                <?php
                                while($row = mysqli_fetch_assoc($event_result2))
                                {
                                    $userid=$row['user_id'];
                                    $eventid=$row['eventID'];
                                    $eventtitle=$row['eventname'];
                                    $startDate=$row['startDate'];
                                    $startTime=$row['startTime'];
                                    $endDate=$row['endDate'];
                                    $endTime=$row['endTime'];
                                    $ticketPrice=$row['priceTicket'];
                                    $description=$row['description'];

                            ?>
                                <td><?php echo $userid; ?></td>
                                <td><?php echo $eventid; ?></td>
                                <td><?php echo $eventtitle; ?></td>
                                <td><?php echo $startDate; ?></td>
                                <td><?php echo $startTime; ?></td>
                                <td><?php echo $endDate; ?></td>
                                <td><?php echo $endTime; ?></td>
                                <td><?php echo $ticketPrice; ?></td>
                                <td><?php echo $description; ?></td>
                                <td><a href="declineevent.php? dltid=<?php echo $eventid; ?>" class="btn btn-danger">Delete</a></td>

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
<div>
        <h2 class="display-6 text-center"><a href="../logout.php"><button class="btn btn-danger" >logout</button></a> </h2>   
</div>

<footer>
        <div class="logo">
            <img src="../6.png" alt="" class="logoPic">
            <span>Dribbble is the world’s leading community for creatives to share, grow, and get hired. </span>
            <div style="display: flex; flex-direction:column; gap:10px; align-items:center;">
                <div>
                    <h2 style="margin:0; color:white; font-size: 17px;">Connected Us With</h2>
                </div>
                <div style="display: flex; gap: 20px; align-items: center;">
                    <a href="facebook.com"><img src="facebook-f.svg" alt="" style="width: 8px; background-color: white; padding:8px 12px;"></a> 
                    <img src="linkedin-in.svg" alt="" >
                    <img src="google.svg" alt="">
                    <img src="linkedin-in.svg" alt="" >
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
        background-color: #F3F3F4;
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

    footer{
        background-color: #000;
        padding: 20px 0;
        display: flex;
        gap: 50px;
        width: 100%;
        justify-content: center;
        bottom: 0;
        margin-top: 40px;
        
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