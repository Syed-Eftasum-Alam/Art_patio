<?php
    require_once ('Confiq.php');
    session_start();
    
    if(isset($_GET['dltid'])){
        $eventid= $_SESSION['eventID'];
        $id = $_GET['dltid'];
        $query ="DELETE FROM applyevent WHERE art_id = $id and event_id=$eventid";
        $result = mysqli_query($conn, $query);
        if($result>0){
            header("Location: requests.php");
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
    <title>approve</title>
</head>
<body>
    <p>Hio</p>
    
</body>
</html>