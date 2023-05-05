<?php
     require_once ('Confiq.php');
     session_start();
     if(isset($_GET['artID'])){
        $id = $_SESSION['id'];
        $eventid = $_SESSION['eventID'];
        $q5= "SELECT * FROM event where eventID=$eventid";
        $result5= mysqli_query($conn, $q5);
        $row5= mysqli_fetch_assoc($result5);
        $eventOwner=$row5['user_id'];

        $artID = $_GET['artID'];
        $id= $_SESSION['id'];
        $query="SELECT * FROM applyevent WHERE event_id=$eventid and art_id=$artID";
        $result=mysqli_query($conn,$query);
        $num= mysqli_num_rows($result);
        if($num>0){
            header ("Location: eventDetail.php?eventID=$eventid");
            exit();
        }
        else{
            $query1="INSERT INTO applyevent (event_id,art_id,user_id,eventOwner) VALUES ($eventid,$artID,$id,$eventOwner)";
            $result1=mysqli_query($conn,$query1);
            if($result1){
                echo "Applied Successfully";
                header ("Location: eventDetail.php?eventID=$eventid");
            }
            else{
                echo "Error";
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
    <title>Document</title>
</head>
<body>
    <p>hello</p>
    <p><?php echo $_SESSION['eventID']  ?></p>
    <p><?php echo $_GET['artID']  ?></p>
    
    
</body>
</html>