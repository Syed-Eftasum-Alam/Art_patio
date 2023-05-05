<?php
     require_once ('Confiq.php');
     session_start();
     $sql11= "SELECT * FROM user_profile WHERE id=".$_SESSION['id'];
        $result11= mysqli_query($conn,$sql11);
        $row11= mysqli_fetch_assoc($result11);
        $currancy= $row11['currancy'];
        if(!isset($_SESSION['id'])){
            header("Location:login.php");
            exit();
        }


     if(isset($_GET['artID'])){
        $id = $_GET['artID'];
        $query = "SELECT * FROM arts WHERE artID = $id";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        $artname=$row['title'];
        $artprice=$row['price'];
        $artdescription=$row['description'];
        $artimg=$row['img'];
        $artID=$row['artID'];
        $artistID=$row['user_id'];
        $bid=$row['initalbid'];
        $artstatus=$row['status'];
        $arttype=$row['type'];
        $artmaterrial=$row['material'];
        $bid_amount= $row['bid_amount'];
        $biddingTime= $row['bidding_time'];
        $vote= $row['votes'];

        $query1 = "SELECT * FROM user_profile WHERE id = $artistID";
        $result1 = mysqli_query($conn, $query1);
        $row1 = mysqli_fetch_array($result1);
        $artistname=$row1['name'];

        $query2 = "SELECT * FROM bid WHERE art_id = $artID";
        $result2 = mysqli_query($conn, $query2);
        $num= mysqli_num_rows($result2);
        if($num<1){
         $s= "INSERT INTO bid (art_id, bid_count) VALUES ('$artID', 0)";
         $r= mysqli_query($conn,$s);
         header ("Location: art_detail.php?artID=$artID");
            
        }
        $row2 = mysqli_fetch_array($result2);
            $bid_count=$row2['bid_count'];
            $bid_user=$row2['user_id'];
        
        $bidprice= $bid + ($bid_count  * $bid_amount);
        
        
        if($bid_user){
            $q5= "SELECT * FROM user_profile WHERE id='$bid_user'";
             $r5= mysqli_query($conn,$q5);
                $row5= mysqli_fetch_assoc($r5);
            $bid_username= $row5['name'];
            $user_currancy= $row5['currancy'];
        }
        else{
             $bid_username=NULL;
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
  <title>Art Detail</title>
</head>
<body>

<div>
    <?php

        $q7= "SELECT * FROM bid WHERE art_id='$artID'";
        $r7= mysqli_query($conn,$q7);
        $row7= mysqli_fetch_assoc($r7); 
        $bidtime= $row7['last_bid_time'];
        $bidtime1= new DateTime($bidtime);
        //$bidtime->modify("+{$biddingTime} minutes");
        //$diff= $currentDateTime->diff($bidtime);
        $currentDateTime = new DateTime();
        if($bidtime!=NULL  ){

            $diff= $currentDateTime->diff($bidtime1);
            
            if($diff->format('%i')>=$biddingTime && $artstatus!="Sold"){
                //echo "Bidding time is over"; 
                $q10= "UPDATE arts SET status='Sold', owner=$bid_user WHERE artID='$artID'"; 
                $r10= mysqli_query($conn,$q10);
                if($r10){
                    //$currancy = $user_currancy;
                    $bidprice2= $bid + (($bid_count-1)*$bid_amount);
                    $q11= "UPDATE user_profile SET currancy=currancy-$bidprice2 WHERE id='$bid_user'";
                    $r11= mysqli_query($conn,$q11);
                    if($r11){
                        //echo "Art is sold";
                        $q12= "UPDATE user_profile SET currancy=currancy+$bidprice2 WHERE id='$artistID'";
                        $r12= mysqli_query($conn,$q12);
                        if($r12){
                            //echo "Art is sold";
                            $q13= "UPDATE arts SET price=$bidprice2 WHERE artID='$artID'";
                            $r13= mysqli_query($conn,$q13);
                            if($r13){
                               // echo "Art is sold";
                                $q14= "UPDATE bid SET bid_count=0   WHERE art_id='$artID'";
                                $r14= mysqli_query($conn,$q14);
                            }
                            else{
                                 //echo "Art is not sold";
                            }
                        }
                        else{
                            //echo "Art is not sold";
                        }

                    }
                    else{
                        //echo "Art is not sold";
                    }
                }
                else{
                   //echo "Art is not sold";
                    
                }
                
            }
            else{
                //echo "Bidding time is not over";
                //echo $diff->format('%i');
            }
        }
        else{
            //  echo "Bidding time has not been Started";
        }
        



    ?>
</div>

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
<div class="popup">
		<h2>Do you want to buy this art?</h2>
		<p>Give your confirmation</p>
        <div style="display: flex; gap: 20px; justify-content: end;">
            <button class="yesBtn">Yes</button>
		    <button class="noBtn">No</button>
        </div>
</div>

<div class="popup2">
		<h2><span style="color:#4CAF50">Great!!</span> You have purchased the art.</h2>
		<p>You can see your purchased art in the Purchased Item section</p>
        <div style="display: flex; gap: 20px; justify-content: end;">
		    <button class="closeBtn">Close</button>
        </div>
</div>
<div class="popup3">
		<h2><span style="color:red">Sorry</span> This art is already sold</h2>
        <div style="display: flex; gap: 20px; justify-content: end;">
		    <button class="closeBtn2">Close</button>
        </div>
</div>

<div class="insuficientPopup">
		<h2><span style="color:red">Sorry</span> you don't have enough balance to purchase the art</h2>
        <div style="display: flex; gap: 20px; justify-content: end;">
		    <button class="insuficientCloseBtn">Close</button>
        </div>
</div>

<div class="favPopup">
		<h2>It is already in your favorite list</h2>
        <div style="display: flex; gap: 20px; justify-content: end;">
		    <button class="favCloseBtn">Close</button>
        </div>
</div>

<div class="favPopup2">
		<h2>Do you want to add in favorite list?</h2>
        <div style="display: flex; gap: 20px; justify-content: end;">
            <button class="favYesBtn">Yes</button>
		    <button class="favNoBtn">No</button>
            
        </div>
</div>
<div class="removePopup">
		<h2>The art is remove from your favorite list.</h2>
        <div style="display: flex; gap: 20px; justify-content: end;">
		    <button class="removeCloseBtn">Close</button>
        </div>
</div>


<div class="votePopup">
		<h2>Vote added for the art</h2>
        <div style="display: flex; gap: 20px; justify-content: end;">
		    <button class="voteCloseBtn">Close</button>
        </div>
</div>

<div class="container">
    <div class="image">
        <img src="arts/<?php echo $artimg ?>" alt="">
    </div>
    <div class="details">
        <h1><?php echo $artname?></h1>
        <p><span>Total Votes: </span><?php echo $vote?></p>
        <p><span>Artist: </span><?php echo $artistname?></p>
        <p><span>Type: </span><?php echo $arttype?></p>
        <p><span>Material: </span><?php echo $artmaterrial?></p>
        <p><span>Status: </span><?php echo $artstatus?></p>
        <p class="des"><span>Description: </span><?php echo $artdescription?></p>
        <p><span>Price: </span><?php echo $artprice?> </p>

        <?php 
        $ownerid=$_SESSION['id'];
        $query2="SELECT * FROM vote WHERE user_id=$ownerid and art_id=$id";
        $result2=mysqli_query($conn,$query);
        $s = mysqli_num_rows($result2);
        
        ?>
        
        <div style="margin-top: 20px;">
        <!-- <form action="art_detail.php"method='post'> -->
            <a href="#" class="voteBtn"><button>+</button></a>
            
            <a href="#" class="buyBtn"><button>Buy</button></a>
            <a href="bid.php?artid=<?php echo $id ?>"><button>Bid for <?php echo $bidprice ?></button></a>
            
            <a href="#" class="favBtn"><button>Add To Favourite</button></a>
            <a href="#" class="removeBtn"><button>Remove From Fav</button></a>
            <!-- </form> -->
        </div>
        
        <?php
        if($bid_user && $artstatus!="Sold"){
            echo "<p>Every Time The bid amount will increase by $bid_amount</p>";
            echo "<p><span>Current Bid: </span>$bid_username</p>";
            $c= $currentDateTime->format('Y-m-d H:i:s');
            echo "<p><span>Current Time: </span>$c</p>";
            $d= $bidtime1->format('Y-m-d H:i:s');
            echo "<p><span>Last Bidding Time: </span>$d</p>";
            echo " Time Differnce from last bidder ".$diff->format('%i')." minutes.";
           
        }
       
        if($artstatus=="Sold"){
            echo "<p style='color:red;'>This art is already sold out.</p>";
        }
        else{
            echo "<p style='color:green;'>This art is available for sale.</p>";
        }
        ?>
       
    </div>
</div>



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



.popup, .popup2, .popup3, .favPopup, .favPopup2, .removePopup, .votePopup, .insuficientPopup{
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

.noBtn , .closeBtn, .closeBtn2, .favCloseBtn, .favNoBtn, .removeCloseBtn, .voteCloseBtn, .insuficientCloseBtn{
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

.yesBtn, .favYesBtn {
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
        padding: 12px 30px;
        cursor: pointer;
        background-color: #000;
        font-size: 14px;
        color: white;
        border-radius: 15px;
        margin: 8px 0;
    }
    .container .details button:hover{
        background-color: #fff;
        color: black;
        
    }

    

</style>

<script>

const buyBtn = document.querySelector('.buyBtn');
const favBtn = document.querySelector('.favBtn');
const removeBtn = document.querySelector('.removeBtn');
const voteBtn = document.querySelector('.voteBtn');
const popup = document.querySelector('.popup');
const popup2 = document.querySelector('.popup2');
const popup3 = document.querySelector('.popup3');
const insuficientPopup = document.querySelector('.insuficientPopup');
const favPopup = document.querySelector('.favPopup');
const favPopup2 = document.querySelector('.favPopup2');
const removePopup = document.querySelector('.removePopup');
const votePopup = document.querySelector('.votePopup');
const favNoBtn = document.querySelector('.favNoBtn');
const favYesBtn = document.querySelector('.favYesBtn');
const yesBtn = document.querySelector('.yesBtn');
const noBtn = document.querySelector('.noBtn');
const closeBtn = document.querySelector('.closeBtn');
const closeBtn2 = document.querySelector('.closeBtn2');
const insuficientCloseBtn = document.querySelector('.insuficientCloseBtn');
const removeCloseBtn = document.querySelector('.removeCloseBtn');
const voteCloseBtn = document.querySelector('.voteCloseBtn');
const favCloseBtn = document.querySelector('.favCloseBtn');
const purchasedItem = document.querySelector('.purchasedItem');

buyBtn.addEventListener('click', () => {

    <?php
        $query2="SELECT * FROM arts WHERE artID=$id";
        $result2=mysqli_query($conn,$query2);
        $row2=mysqli_fetch_array($result2);
        $artstatus=$row2['status'];
        $artprice = $row2['price'];
        
    ?>
    if("<?php echo $artstatus?>" == "Available" && <?php echo $_SESSION['currancy'] ?> >= <?php echo $artprice?>){
        popup.style.display = 'block';
    }
    else if(<?php echo $_SESSION['currancy'] ?> < <?php echo $artprice?>){
        insuficientPopup.style.display = 'block';
    }
    else{
        popup3.style.display = 'block';
        body.style.backgroundColor = "black";
    }
    
    
});
noBtn.addEventListener('click',()=>{
    popup.style.display = 'none';
})

yesBtn.addEventListener('click',()=>{
    popup.style.display = 'none';
    popup2.style.display = 'block';
    
})
closeBtn.addEventListener('click',()=>{
    buyBtn.href = 'artbuy.php? artID=<?php echo $row['artID']  ?>';
    buyBtn.click();
    popup.style.display = 'none';
    popup2.style.display = 'none';
})
closeBtn2.addEventListener('click',()=>{
    popup3.style.display = 'none';
})

insuficientCloseBtn.addEventListener('click',()=>{
    insuficientPopup.style.display = 'none';
})

favBtn.addEventListener('click', ()=>{
    console.log("d");
    <?php 
    $ownerid=$_SESSION['id'];
    $query="SELECT * FROM favourite WHERE user_id=$ownerid and art_id=$id";
    $result=mysqli_query($conn,$query);
    $s = mysqli_num_rows($result);
    ?>
    
    if(<?php echo $s?>==0){
        favPopup2.style.display = 'block';
        
    }
    else{
        favPopup.style.display = 'block';
    }
     
})
favCloseBtn.addEventListener('click',()=>{
    favPopup.style.display = 'none';
})
favNoBtn.addEventListener('click',()=>{
    favPopup2.style.display = 'none';
})
favYesBtn.addEventListener('click',()=>{
    favPopup2.style.display = 'none';
    favBtn.href = 'artfav.php? artID=<?php echo $row['artID']  ?>';
    favBtn.click();
    
})

removeBtn.addEventListener('click', ()=>{
    removePopup.style.display = 'block';
})

removeCloseBtn.addEventListener('click',()=>{
    removePopup.style.display = 'none';
    removeBtn.href = 'artremovefav.php? artID=<?php echo $row['artID']  ?>';
    removeBtn.click();
})

voteBtn.addEventListener('click',()=>{
    votePopup.style.display = 'block';
})
voteCloseBtn.addEventListener('click',()=>{
    votePopup.style.display = 'none';
    voteBtn.href = 'vote.php? artID=<?php echo $row['artID']  ?>';
    voteBtn.click();
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

function voteBtnClicked(x){

    
    
        // console.log(x); 
        if(x>0){
            alert("Already voted");
        }
        else{
            alert("Vote is completed");
            window.location.href("vote.php? artID=<?php echo $row['artID']?>");
        }
        // console.log(paramtr);   
    }

</script>