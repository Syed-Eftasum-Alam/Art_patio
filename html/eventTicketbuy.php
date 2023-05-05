<?php

require_once ('Confiq.php');
session_start();
$sql11= "SELECT * FROM user_profile WHERE id=".$_SESSION['id'];
$result11= mysqli_query($conn,$sql11);
$row11= mysqli_fetch_assoc($result11);
$currancy= $row11['currancy'];


if(isset($_GET['eventID'])){



    $id= $_GET['eventID'];
    $userid=$_SESSION['id'];
    $query1="SELECT * FROM user_profile WHERE id=$userid";
    $result1=mysqli_query($conn,$query1);
    if($result1){
        $row1=mysqli_fetch_array($result1);
        $currancy =$row1['currancy'];
    
    }
    else{
        echo "Error Occured";
    }



    $query2="SELECT * FROM event WHERE eventID=$id";
    $result2=mysqli_query($conn,$query2);
    if($result2){
        $row2=mysqli_fetch_array($result2);
        $eventprice =$row2['priceTicket'];
        $host= $row2['user_id'];
    
        
    }
    else{
        echo "Error Occured";
    }

    $q= "SELECT * FROM ticketbuy WHERE user_id=$userid AND event_id=$id";
    $r=mysqli_query($conn,$q);
    if(mysqli_num_rows($r)>0){
        echo "You have already bought this ticket";
        header("Location:eventDetail.php? eventID= $id");
    }
    else{
        if($currancy<$eventprice){
            echo "You don't have enough money to buy this event ticket";
        }
        else{
            $query3= "INSERT INTO ticketbuy (user_id,event_id) VALUES ($userid,$id)";
            $result3=mysqli_query($conn,$query3);
            if($result3){
                $query4="UPDATE user_profile SET currancy=currancy-$eventprice WHERE id=$userid";
                $result4=mysqli_query($conn,$query4);
                if($result4){
                    $query5="UPDATE user_profile SET currancy=currancy+$eventprice WHERE id=$host";
                    $result5=mysqli_query($conn,$query5);
                    if($result5){
                        echo "Ticket Bought";
                        header("Location:eventDetail.php? eventID= $id");
                    }
                    else{
                        echo "Error Occured";
                    }
                }
                else{
                    echo "Error Occured";
                }
            }
            else{
                echo "Error Occured";
            }
            
            
        }
    }




    
   
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Ticket Buy</title>
</head>
<body>
    
</body>
</html>