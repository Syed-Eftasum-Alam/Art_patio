<?php
    require_once ('Confiq.php');
    session_start();
    
    if(isset($_GET['approve'])){
        $id = $_GET['approve'];
        echo $id;
        $query1="SELECT * FROM user_profile WHERE id = $id";
        $result1 = mysqli_query($conn, $query1);
        if($result1){
            $row=mysqli_fetch_assoc($result1);
            $value=$row['requestedCurrency'];
            $status=$row['requestCurrency'];
        }
        if($status==-1){
            $query ="UPDATE user_profile SET requestCurrency =0,requestedCurrency=0,currancy=currancy-$value WHERE id = $id";
            $result = mysqli_query($conn, $query);
            if($result>0){
                header("Location: admin.php");
            }else{
                echo "ERRORS";
            }
        }
        else if($status==1){
            $query ="UPDATE user_profile SET requestCurrency =0,requestedCurrency=0,currancy=currancy+$value WHERE id = $id";
            $result = mysqli_query($conn, $query);
            if($result>0){
                header("Location: admin.php");
            }else{
                echo "ERRORS";
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
    <title>Recharge</title>
</head>
<body>
    
</body>
</html>