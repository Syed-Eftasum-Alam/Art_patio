<?php
 require_once ('Confiq.php');
 session_start();

 if(isset($_GET['artid'])){

    $artid= $_GET['artid'];
    $q1= "SELECT * FROM arts WHERE artID='$artid'";
    $result1= mysqli_query($conn,$q1);
    $row1= mysqli_fetch_assoc($result1);
    $artstatus= $row1['status'];
    $bid=$row1['initalbid'];
    $bidamount= $row1['bid_amount'];
    
    $q3= "SELECT * FROM bid WHERE art_id='$artid'";
    $result3= mysqli_query($conn,$q3);
    $row3= mysqli_fetch_assoc($result3);
    $bidcount= $row3['bid_count'];

   
    if($artstatus=='Sold'){
        echo "This art is already sold";
        header("Location:art_detail.php? artID= $artid");
    }
    else{
        $currancy= $_SESSION['currancy'];
        if($currancy<($bidcost=$bid+($bidamount*$bidcount))){
            
            
            echo $currancy;
            echo "You don't have enough money to bid this art";
            header("Location:art_detail.php? artID= $artid");
            echo $bidcost;
            echo "<br>";
            echo $bid;
            echo "<br>";
            echo $bidcount;
            echo "<br>";
            echo $bidamount;
        }
        else{
             
              $q2= "UPDATE bid SET bid_count=bid_count+1, user_id='$_SESSION[id]' where art_id='$artid'";
              $result2= mysqli_query($conn,$q2);
              if($result2){
                  echo "Bid placed successfully";
                  header("Location:art_detail.php? artID= $artid");
              }
              else{
                  echo "Error Occured";
              }

       

        }

       
      
    }


 }
 else{
     echo "Error Occured";
 }

?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bid</title>
</head>
<body>
    
</body>
</html>