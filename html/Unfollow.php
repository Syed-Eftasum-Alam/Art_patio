<?php
     require_once ('Confiq.php');
     session_start();

     if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql55= "SELECT * FROM user_profile WHERE id = '$id'";
            $result55 = mysqli_query($conn, $sql55);
            $row55 = mysqli_fetch_assoc($result55);
            $category = $row55['category'];
            $sql3= "SELECT * FROM follower WHERE following_id = '".$_SESSION['id']."' AND follower_id = '$id'";
            $result3 = mysqli_query($conn, $sql3);
           
            if(mysqli_num_rows($result3)>0) {
               $sql= "DELETE FROM follower WHERE following_id = '".$_SESSION['id']."' AND follower_id = '$id'";
                $result = mysqli_query($conn, $sql);
                if($result){
                    $q2="UPDATE user_profile SET followers = followers - 1 WHERE id = '$id'";
                    $result2 = mysqli_query($conn, $q2);
                    if( $category=="Artist"){
                        header('location: ArtistDetail.php?id='.$id.'');
                       }
                     else{
                        header('location: galleryDetails.php?id='.$id.'');
                     }
                      
                }
            }
           else{
            if( $category=="Artist"){
                header('location: ArtistDetail.php?id='.$id.'');
               }
             else{
                header('location: galleryDetails.php?id='.$id.'');
             }
              
             }
          
     }
     else{
         echo "Error";
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
<p>problem</p>
    
</body>
</html>