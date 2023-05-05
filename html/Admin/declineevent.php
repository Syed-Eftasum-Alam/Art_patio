<?php
    require_once ('Confiq.php');
    session_start();
    
    
    if(isset($_GET['dltid'])){
        $id = $_GET['dltid'];
        $query = "DELETE FROM event WHERE eventID = $id";
        $result = mysqli_query($conn, $query);
        if($result){
            header("Location: admin.php");
        }else{
            echo "Data not deleted";
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