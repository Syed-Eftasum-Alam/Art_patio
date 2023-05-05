<?php

$conn = mysqli_connect('localhost','root','','art_patio');

if($conn->connect_error){
    die("Connection failed: ".mysqli_connect_error());
}
else{
    // echo "Connected successfully";
 
}

?>