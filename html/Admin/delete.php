<?php
require_once ('Confiq.php');
session_start();


if(isset($_GET['dltid'])){
    $id = $_GET['dltid'];
    echo $id;
    $query1="SELECT * FROM user_profile WHERE id = $id";
    $result1 = mysqli_query($conn, $query1);
    if($result1){
      $row=mysqli_fetch_array($result1);
      $category=$row['category'];
      if($category=='Artist'){
         $query2="DELETE FROM arts WHERE user_id = $id";
         $result2 = mysqli_query($conn, $query2);
         if($result2){
            $query = "DELETE FROM user_profile WHERE id = $id";
            $result = mysqli_query($conn, $query);
            if($result){
               header("Location:admin.php");
            }else{
               echo "Data not deleted";
             }
         } 
      }
      else if($category=='Gallery'){
         $query2="DELETE FROM event WHERE user_id = $id";
         $result2 = mysqli_query($conn, $query2);
         if($result2){
            $query = "DELETE FROM user_profile WHERE id = $id";
            $result = mysqli_query($conn, $query);
            if($result){
               header("Location:admin.php");
            }else{
               echo "Data not deleted";
             }
         }
      else if($category=='Customer'){
         $query = "DELETE FROM user_profile WHERE id = $id";
         $result = mysqli_query($conn, $query);
         if($result){
            header("Location:admin.php");
         }else{
            echo "Data not deleted";
         }   
      }
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
    <title>Delete</title>
</head>
<body>
    
</body>
</html>