<?php
    require_once ('Confiq.php');
    session_start();
    
    if(isset($_GET['approve'])){
        $id = $_GET['approve'];
        $query ="UPDATE event SET approval =1 WHERE eventID = $id";
        $result = mysqli_query($conn, $query);
        if($result>0){
            header("Location: admin.php");
        }else{
            echo "Art not approve";
        }
    }

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approve Events</title>
</head>
<body>
    
</body>
</html>