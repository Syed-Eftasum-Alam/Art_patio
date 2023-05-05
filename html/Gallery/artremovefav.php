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
        $query = "DELETE FROM favourite WHERE art_id = '$artid' and user_id = '$ownerid'";
        $result= mysqli_query($conn,$query);
        if($result){
            echo "Art removed from favourite";
            header("Location:art_detail.php? artID= $artid");
        }
        else{
            echo "Error Occured";
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