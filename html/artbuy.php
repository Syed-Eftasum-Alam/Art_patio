<?php

require_once ('Confiq.php');
session_start();
$sql11= "SELECT * FROM user_profile WHERE id=".$_SESSION['id'];
$result11= mysqli_query($conn,$sql11);
$row11= mysqli_fetch_assoc($result11);
$currancy= $row11['currancy'];

if(isset($_GET['artID'])){

    $id=$_GET['artID'];
    $ownerid=$_SESSION['id'];
    $query1="SELECT * FROM user_profile WHERE id=$ownerid";
    $result1=mysqli_query($conn,$query1);
    if($result1){
        $row1=mysqli_fetch_array($result1);
        $currancy =$row1['currancy'];
    }
    else{
        echo "Error Occured";
    }
    $query2="SELECT * FROM arts WHERE artID=$id";
    $result2=mysqli_query($conn,$query2);
    if($result2){
        $row2=mysqli_fetch_array($result2);
        $artprice =$row2['price'];
        $artist=$row2['user_id'];
        $artstatus=$row2['status'];
    }
    else{
        echo "Error Occured";
    }
    if($artstatus=="Sold"){
        echo "Art is already sold";
        header("Location:art_detail.php? artID= $id");
        
    }
    else{
    if($currancy<$artprice){
        echo "You don't have enough money to buy this art";
    }
    else{
        $currancy=$currancy-$artprice;
        $query3="UPDATE user_profile SET currancy=$currancy WHERE id=$ownerid";
        $result3=mysqli_query($conn,$query3);
        if($result3){
            $query="SELECT * FROM arts WHERE artID=$id";
            $result=mysqli_query($conn,$query);
            if($result){
                $row=mysqli_fetch_array($result);
                $artist=$row['user_id']; 
                if($artstatus=="Sold"){
                    echo "Art is already sold";
                    header("Location:art_detail.php? artID= $id");
                }else{
                    $ownername=$_SESSION['name'];
                    $query="UPDATE arts SET status='Sold', owner=$ownerid WHERE artID=$id";
                    $result=mysqli_query($conn,$query);
                    if($result){
                        $q="UPDATE user_profile SET currancy=currancy+$artprice WHERE id=$artist";
                        $r=mysqli_query($conn,$q);
                        if($r){
                            echo "Art Bought Successfully";
                            header("Location:art_detail.php? artID= $id");
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
    <title>art buy</title>
</head>
<body>
    
</body>
</html>