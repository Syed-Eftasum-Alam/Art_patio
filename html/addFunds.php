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
    <!-- <link rel="stylesheet" href="../css/addFunds.css"> -->
    <title>Add Funds</title>
</head>
<body>


    <!-- Starts Nav code -->
    <nav>
    <div class="nav">
      <div class="left">
            <a href="index4.php"> <img src="6.png" alt=""></a>
            <span onclick="window.location.href='customerPage.php'">Home</span>
            <span onclick="window.location.href='art.php'">Arts</span>
            <span onclick="window.location.href='Artists.php'">Artists</span>
            <span onclick="window.location.href='gallery.php'">Gallery</span>
            <span onclick="window.location.href='event.php'">Events</span>
            <span onclick="window.location.href='ongoinevent.php'">On Going Events</span>
            <!-- <span>Higher Designers</span> -->
        </div>
        <div class="right">
          
            <!-- <div class="search-area">
                <span class="search-icon" style="padding-top: 5px;"><i class="fas fa-search" style="color: #b1b1b1;"></i></span>
                <input type="search" name="" id="" placeholder="Search">
            </div> -->
            <a href="addFunds.php"  style="text-decoration:none;"><span>$<?php echo $currancy ?></span></a>
            <div style="position: relative;">
                <img src="userDP/<?php echo $_SESSION['dp'] ?> " alt="" onclick=showDropdown()>
                <div id="myDropdown" class="dropdown-content">
                    <a href="profile.php">Profile</a>
                    <a href="customerfav.php">Favoutites</a>
                    <a href="purchasedarts.php">Purchased Items</a>
                    <a href="purchasedtickets.php">Purchased Tickets</a>
                    <a href="logout.php" style="color:tomato;">Logout</a>
                </div>
            </div>
            
            <!-- <span>Sign in</span>
            <button>Sign up</button> -->
        </div>
    </div>
    <!-- <hr style="position: relative; margin: 0; color: rgb(238, 235, 235)"> -->
</nav>
    <!-- <hr style="position: relative; margin: 0; color: rgb(238, 235, 235)"> -->
</nav>

<div>  
<?php
if($_SESSION['email']==FALSE){
    header("Location: login.php");
}
if(isset($_POST['request1'])){

    $currency = 500;
    $user_id = $_SESSION['id'];
    $query1 = "SELECT * FROM user_profile WHERE id = $user_id";
    $result1 = mysqli_query($conn, $query1);

    if($result1){
        $row = mysqli_fetch_assoc($result1);
        $requestCurrency = $row['requestCurrency'];
        if($requestCurrency==1){
            echo "<p style='color:red; text-align: center;'>You have already sent a request. Have to wait until the request is approved or rejected before making next currency request</p>";
        }
        else{
            $query = "UPDATE user_profile SET requestCurrency =1,requestedCurrency=$currency  WHERE id = $user_id";
            $result = mysqli_query($conn, $query);
            if($result>0){
            echo "<p style='color:red; text-align: center;'>Request send</p>";
            }else{
            echo "<p style='color:red; text-align: center;'>Request send</p>";
    
        }
    }
    


}
    
}
else if(isset($_POST['request2'])){

    $currency = 1000;
    $user_id = $_SESSION['id'];
    $query1 = "SELECT * FROM user_profile WHERE id = $user_id";
    $result1 = mysqli_query($conn, $query1);

    if($result1){
        $row = mysqli_fetch_assoc($result1);
        $requestCurrency = $row['requestCurrency'];
        if($requestCurrency==1){
            echo "<p style='color:red; text-align: center;'>You have already sent a request. Have to wait until the request is approved or rejected before making next currency request</p>";
        }
        else{
            $query = "UPDATE user_profile SET requestCurrency =1,requestedCurrency=$currency  WHERE id = $user_id";
            $result = mysqli_query($conn, $query);
            if($result>0){
                echo "<p style='color:red; text-align: center;'>Request send</p>";
                }else{
                echo "<p style='color:red; text-align: center;'>Request send</p>";
        
            }
    }
    


}
    
}
else if(isset($_POST['request3'])){

    $currency =1500;
    $user_id = $_SESSION['id'];
    $query1 = "SELECT * FROM user_profile WHERE id = $user_id";
    $result1 = mysqli_query($conn, $query1);

    if($result1){
        $row = mysqli_fetch_assoc($result1);
        $requestCurrency = $row['requestCurrency'];
        if($requestCurrency==1){
            echo "<p style='color:red; text-align: center;'>You have already sent a request. Have to wait until the request is approved or rejected before making next currency request</p>";
        }
        else{
            $query = "UPDATE user_profile SET requestCurrency =1,requestedCurrency=$currency  WHERE id = $user_id";
            $result = mysqli_query($conn, $query);
            if($result>0){
                echo "<p style='color:red; text-align: center;'>Request send</p>";
                }else{
                echo "<p style='color:red; text-align: center;'>Request send</p>";
        
            }
    }
    


}
    
}
if(isset($_POST['request4'])){

    $currency = 2000;
    $user_id = $_SESSION['id'];
    $query1 = "SELECT * FROM user_profile WHERE id = $user_id";
    $result1 = mysqli_query($conn, $query1);

    if($result1){
        $row = mysqli_fetch_assoc($result1);
        $requestCurrency = $row['requestCurrency'];
        if($requestCurrency==1){
            echo "<p style='color:red; text-align: center; text-align: center;'>You have already sent a request. Have to wait until the request is approved or rejected before making next currency request</p>";
        }
        else{
            $query = "UPDATE user_profile SET requestCurrency =1,requestedCurrency=$currency  WHERE id = $user_id";
            $result = mysqli_query($conn, $query);
            if($result>0){
                echo "<p style='color:red; text-align: center;'>Request send</p>";
                }else{
                echo "<p style='color:red; text-align: center;'>Request send</p>";
        
            }
    }
    


}
    
}
?>
</div> 


    <form action="" method="POST">
        <h1>Add Funds To your Wallet</h1>
        <div class="pContainer">
            <p>After Clicking on buy now you will be provided with the QR code and the number to send money to. after that enter next and post your TRX number there. 
                Admin will verify the number and add fund to your account. it will take 3/4 minutes.</p>
            <p><span style="font-weight: bold;">NB:</span> Money is non-refundable, So do the transection carefully.</p>
        </div>
        <div class="container">
            <div class="left">
                <div class="cart">
                    <div>
                        <img src="image/coin1.png" alt="">
                        <h3>500</h3>
                    </div>
                    <div>
                        <button type="submit" name="request1">Price:650৳ Buy Now</button>
                    </div>
                </div>
                <div class="cart">
                    <div>
                        <img src="image/coin1.png" alt="">
                        <h3>1000</h3>
                    </div>
                    <div>
                    <button type="submit" name="request2">Price:1100৳ Buy Now</button>
                    </div>
                </div>
                <div class="cart">
                    <div>
                        <img src="image/coin1.png" alt="">
                        <h3>1500</h3>
                    </div>
                    <div>
                    <button type="submit" name="request3">Price:1650৳ Buy Now</button>
                    </div>
                </div>
                <div class="cart">
                    <div>
                        <img src="image/coin1.png" alt="">
                        <h3>2000</h3>
                    </div>
                    <div>
                    <button type="submit" name="request4">Price:2200৳ Buy Now</button>
                    </div>
                </div>
            </div>
            <div class="right">
                <img src="../images/qr.png" alt="">
                <p>Terms and Condition</p>
            </div>
        </div>
    </form>

    <?php
    include '../hmtl/footer.php';
?>
</body>
</html>


<style>
   @import url('https://fonts.googleapis.com/css2?family=Offside&family=Roboto:ital@0;1&family=Varela+Round&display=swap');
  body{
    margin: 0;
    padding: 0;
    background-color: #f2efef;
    position: relative;
    font-family: 'Offside', cursive;
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



h1{
    text-align: center;
    margin-top: 110px;
}
.pContainer{
    width: 70%;
    margin: 20px auto;
}
.pContainer p{
    font-size: 15px;
}
.container{
    width: 70%;
    margin: 20px auto 80px;
    display: flex;
    justify-content: center;
    align-items: center;
}
.container .left{
    width: 65%;
}

.left .cart{
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #fff;
    padding: 10px;
    border-radius: 33px;
    margin: 10px 0;
    border: 1px solid black;
}
.cart img{
    width: 70px;
}
.cart div{
    display: flex;
    align-items: center;
    gap: 15px;
}
.cart div:last-child{
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 25px;
    background-color: #488280;
    color: white;
    border-radius: 33px;
    cursor: pointer;
}
.cart button{
    background-color: black;
    padding: 12px 30px;
    color:white;
    cursor: pointer;
    border: none;
    border-radius: 20px;
}
.container .right{
    width: 65%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 10px;
}
.container .right img{
    width: 300px;
    margin: auto;
}

/* Footer css starts here */



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