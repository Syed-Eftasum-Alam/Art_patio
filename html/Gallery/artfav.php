<?php

require_once ('Confiq.php');
session_start();

if(!isset($_SESSION['id'])){
    header("Location:../login.php");
    exit();
}

if(isset($_GET['artID'])){

    $artid=$_GET['artID'];
    $ownerid=$_SESSION['id'];
    $query="SELECT * FROM favourite WHERE user_id=$ownerid and art_id=$artid";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
        echo "Art is already in your favourite";
        header("Location:art_detail.php? artID= $artid");
        exit();
    }
    else{
    $query1="INSERT into favourite (art_id,user_id) VALUES ($artid,$ownerid)";
    $result1=mysqli_query($conn,$query1);
    if($result1){
        echo "Art added to favourite";
        header("Location:art_detail.php? artID= $artid");
    }
    else{
        echo "Error Occured";
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