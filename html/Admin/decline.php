<?php
    require_once ('Confiq.php');
    session_start();
    
    if(isset($_GET['dltid'])){
        $id = $_GET['dltid'];
        $query ="UPDATE user_profile SET requestCurrency =0,requestedCurrency=0 WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if($result>0){
            header("Location: admin.php");
        }else{
            echo "ERRORS";
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