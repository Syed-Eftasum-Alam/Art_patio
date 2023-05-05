<?php
     require_once ('Confiq.php');
     session_start();
     if(!isset($_SESSION['id'])){
        header("Location:../login.php");
        exit();
    }
    
     $description = $_SESSION['description'];
     if(isset($_POST['update'])){
        $id= $_SESSION['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        $select= "SELECT * FROM user_profile WHERE id= '$id'"; ;
        $result = mysqli_query($conn, $select);
        if($result){
            $row=mysqli_fetch_array($result);
            $sql = "UPDATE user_profile SET name='$name', email='$email', address='$address',conatact='$contact' WHERE id='$id'";
            if(mysqli_query($conn, $sql)){
                $_SESSION['email'] = $email;
                $_SESSION['name'] = $name;
                $_SESSION['address'] = $address;
                $_SESSION['contact'] = $contact;
                header("Location: artistprofile.php");
            }
            else{
                echo 'User not submitted';
            }
           
        }
        else{
            echo 'User not submitted';
        }
        
    }
      



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          <?php

            $result=$conn->query("SELECT * FROM arts WHERE user_id = '$_SESSION[id]'AND status = 'Available' ");
            $num= mysqli_num_rows($result);
            echo "['Total Arts', $num],";

            $result2=$conn->query("SELECT * FROM arts WHERE user_id = '$_SESSION[id]' AND status = 'Sold' ");
            $num2= mysqli_num_rows($result2);
            echo "['Sold Arts', $num2],";

          ?>
          
        ]);

        var options = {
          title: 'Progression Bar'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    <title>Profile</title>
</head>
<body>
    <div class="wholePart">
        <div class="left">
            <div class="logo">
                <img src="../../images/logo1.png" alt="">
                <div style="width: 100%;">
                    <hr>
                </div>
            </div>
            <div class="userImage">

                <img src="../userDP/<?php echo $_SESSION['dp'];?>" alt="">  
                <h1> <?php echo $_SESSION['name'];?> </h1>
                <p> <?php echo $_SESSION['category'];?></p>
                <p> <?php echo $_SESSION['address'];?></p>
            </div>

            <div class="leftButton">
                <p>Profile</p>
                <!-- <p>Uploaded Art</p> -->
            </div>
            
        </div>
        <div class="right">
            
            <div class="header" style="position: relative;">
                <h1> <?php echo $_SESSION['category'];?> Profile</h1>
                <img src="../userDP/<?php echo $_SESSION['dp'];?>" alt=""onclick=showDropdown()>
                <div id="myDropdown" class="dropdown-content">
                <a href="artistprofile.php">Profile</a>
                    <a href="artistrfav.php">Favourite</a>
                    <a href="purchasedarts.php">Purchased Arts</a>
                    <a href="purchasedtickets.php">Purchased Tickets</a>
                    <a href="uploadTheArt.php">Upload Arts</a>
                    <a href="withdraw1.php">Withdraw Coin</a>
                    <a href="../logout.php" style="color:tomato;">Logout</a>
                </div>
            </div>
            <div style="width: 87%; margin:0 auto">
                <hr>
            </div>

            <div class="profileInfo">
                <div class="infoLeft">
                    <div>
                    <img src="../userDP/<?php echo $_SESSION['dp'];?>" alt="">  
                    </div>
                    <div>
                        <h1> <?php echo $_SESSION['name'];?></h1>
                        <p style="margin-top: 5px; color: grey; font-size: 14px"> <?php echo $_SESSION['category'];?></p>

                        <p style="margin-top: 30px; margin-bottom: 0px; color: grey;">About</p>
                        <p style="margin-top: 10px;"><?php echo $description?></p>
                        <br>
                        <div id="piechart" style="width: 300px; height: 300px;"></div>
                    </div>
                </div>
                <div class="infoRight">
                    <form action=""method="post">
                    <input type="text" name="name" id="" placeholder="<?php echo $_SESSION['name'];?>" value="<?php echo $_SESSION['name'];?>" >
                    <input type="email" name="email" placeholder="<?php echo $_SESSION['email'];?>" id=""value="<?php echo $_SESSION['email'];?> ">
                    <input type="text" name="contact" placeholder="+88<?php echo $_SESSION['contact'];?>" id=""value="+88<?php echo $_SESSION['contact'];?>">
                    <input type="text" name="address" placeholder="<?php echo $_SESSION['address'];?>" id=""value="<?php echo $_SESSION['address'];?>">
                    <button type="submit" name="update">Update Information</button>
                    </form>
                </div>
            </div>

            <div class="header">
                <h1>Arts</h1>
                
            </div>
            <div style="width: 87%; margin:0 auto">
                <hr>
            </div>

            <div class="cardContainer">
                <?php
                    $q= "SELECT * FROM arts WHERE user_id = '$_SESSION[id]' ";
                    $result = mysqli_query($conn, $q);
                    $check_image= mysqli_num_rows($result);
                    if($check_image>0){
                        while($row=mysqli_fetch_array($result)){
                            $arttitle= $row['title'];
                            $artprice= $row['price'];
                            $description= $row['description'];
                            $image= $row['img'];
                            $artstatus= $row['status'];

                            ?>    
                            <div class="card">
                             <img src="../arts/<?php echo  $image?>" alt="">
                                <div class="overlay">
                                 <h1><?php echo $arttitle ?></h1>
                                 <p><?php echo $artprice ?></p>
                                <p><?php echo $description?></p>
                                <div style="width: fit-content; margin: auto">
                             <a href="#" style="text-decoration:none;">
                             <a href="art_detail.php? artID=<?php echo $row['artID']  ?>" style="text-decoration:none;"><button>Art Details</button></a>
                      </div>
                  </div>
                </div>

                   <?php

                        }
                    }
                    else{
                        echo 'No Art Found';
                       
                    }

                ?>
                
               
              
            

        </div>
       
    </div>
        
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
        background-color: rgb(243, 246, 241);
    }
    .wholePart{
        width: 100%;
        display: flex;
        
        /* align-items: center; */
    }
    .wholePart .left{
        position: fixed;
        top: 0;
        left: 0;
        height: 100vh;
        width: 17%;
        background-color: black;
        display: flex;
        gap: 50px;
        flex-direction: column;
        /* justify-content: center; */
        align-items: center;
        color: white;
    }
    .wholePart .left .logo{
        display: flex;
        flex-direction: column;
        /* gap: 10px; */
        justify-content: center;
        align-items: center;
        width: 100%;
        margin-top: 20px;
    }
    .wholePart .left .logo img{
        width: 80%;
        margin-bottom: 0;
        margin: auto;
    }
    
    .wholePart .left .userImage{
        width: 80%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .wholePart .left .userImage img{
        width: 100px;
        height: 100px;
        border-radius: 90px;
    }
    .wholePart .left .userImage h1{
        font-size: 20px;
        margin: 10px 0 10px;
    }
    .wholePart .left .userImage p{
        font-size: 10px;
        margin: 5px 0 2px;
        color: rgb(201, 201, 201);
    }
    .wholePart .left .leftButton{
        width: 100%;
    }
    .wholePart .left .leftButton p{
        font-size: 17px;
        /* background-color: white; */
        border: 1px solid white;
        padding: 10px 20px;
        border-radius: 20px;
        /* color: black; */
        text-align: center;
        cursor: pointer;
    }
    .wholePart .left .leftButton p:hover{
        background-color: white;
        color: black;
        border: none;
    }
    .wholePart .right{
        width: 83%;
        margin-left: 261px;
    }
    .wholePart .right .header{
        width: 87%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        color: black;
        margin: auto;
        
    }
    .wholePart .right .header img{
        width: 35px;
        height: 35px;
        cursor: pointer;
        border-radius: 50px;
    }
    


    .dropdown-content {
        display: none;
        position: absolute;
        top: 52px;
        right: -30px;
        z-index: 1;
        width: 130px;
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

    .wholePart .right .header h1{
        font-size: 25px;
        margin-bottom: 0px;
    }
    .profileInfo{
        width: 87%;
        margin: auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 60px;
        background-color: white;
        padding: 15px 20px;
        border-radius: 10px;
        box-shadow:0 0 5px #a5a5a5;
        margin-bottom: 40px;
    }
    .profileInfo .infoLeft{
        width: 50%;
        display: flex;
        align-items: center;
        gap: 15px;
        
    }
    .profileInfo .infoLeft img{
        width: 150px;
        border-radius: 20px;
    }
    .profileInfo .infoLeft h1{
        font-size: 22px;
        margin-bottom: 0;
    }
    .profileInfo .infoRight{
        width: 50%;
        display: flex;
        flex-direction: column;
        gap: 15px;
    }
    .profileInfo .infoRight input{
        width: 80%;
        margin: auto;
        height: 45px;
        border: none;
        padding-left: 10px;
        border-radius: 10px;
        background-color: #edecec;
        color: black;
        box-shadow:0 0 5px #a5a5a5;
        font-size: 16px;
    }
    .profileInfo .infoRight button{
        width: 80%;
        margin: auto;
        padding: 15px 0;
        cursor: pointer;
        border: none;
        background-color: black;
        color: white;
    }

    .cardContainer{
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-gap: 30px;
        width: 85%;
        margin: 20px auto;
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
    img {
  border-radius: 60%;
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