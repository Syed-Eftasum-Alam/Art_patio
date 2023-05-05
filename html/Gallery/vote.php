<?php

require_once ('Confiq.php');
session_start();

if(isset($_GET['artID'])){

    $artid=$_GET['artID'];
    $ownerid=$_SESSION['id'];
    $query="SELECT * FROM vote WHERE user_id=$ownerid and art_id=$artid";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
        echo "You have already voted";
        header("Location:art_detail.php? artID= $artid");
        exit();
    }
    else{
    $query1="INSERT into vote (art_id,user_id) VALUES ($artid,$ownerid)";
    $result1=mysqli_query($conn,$query1);
    if($result1){
        echo "vote Completed";
        $query2= "UPDATE arts SET votes=votes+1 WHERE artID=$artid";
        $result2=mysqli_query($conn,$query2);
        if($result2){
            echo "vote updated";
            header("Location:art_detail.php? artID= $artid");
        }
        else{
            echo "error occured";
        }
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
    <title>Vote Art</title>
</head>
<body>
    
</body>
</html>

<script>
</script>