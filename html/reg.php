<?php
require_once ('Confiq.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery Owners Page</title>
</head>
<body>

<div>
    <?php
    if(isset($_POST['create'])){
       
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $sql = "INSERT INTO user_profile(name, email, password, address) VALUES ('$name','$email','$password','$address')";
        if(mysqli_query($conn, $sql)){
            echo 'User submitted';
            header("Location: login.php");
        }
        else{
            echo 'User not submitted';
        }

    }
    else{
        echo 'User not submitted';
    }
    ?>
</div>
 

<div>
    <form action="reg.php" method="post">
        <div class="container">
            <h1>Reg</h1>
            <p>Fill</p>
            <label for="name">Name</label>
            <input type="text" name="name"  required>
            <label for="email">Email</label>
            <input type="email" name="email" required>
            <label for="password">Password</label>
            <input type="password" name="password"  required>
            <label for="address">Address</label>
            <input type="text" name="address"required>
            <input type="submit" name = "create" value="Sign Up">
        </div>
    </form>
</div>
    
</body>
</html>