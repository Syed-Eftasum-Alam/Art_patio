<?php
session_start();
require_once('Confiq.php');
require_once('sendOTP.php');

    if (!isset($_SESSION['uid'])) {
        header("Location:login.php");
    }

    $uid = $_SESSION['uid'];
    $otp = mysqli_query($conn, "SELECT * FROM otp WHERE uid=$uid");

    if(mysqli_num_rows($otp) > 0){
        $otp=mysqli_fetch_assoc($otp)['otp'];
    } else {
        header("Location:login.php");
    }

    $result = mysqli_query($conn, "SELECT * FROM user_profile WHERE id='$uid'");
    $row = mysqli_fetch_array($result);

    if (isset($_POST['resend'])) {
        unset($_POST['resend']);
        sendOTP($row, $otp);
    }

    if(isset($_POST['otp']))
    {
        $u_otp = $_POST['otp'];
        unset($_POST['otp']);

        if ($otp == $u_otp) {
            if(mysqli_num_rows($result)>0){
                $_SESSION['email'] = $row['email'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['category'] = $row['category'];
                $_SESSION['currancy'] = $row['currancy'];
                $_SESSION['requestedCurrency'] = $row['requestedCurrency'];
                $_SESSION['dp'] = $row['dp'];
                $_SESSION['address'] = $row['address'];
                $_SESSION['contact'] = $row['conatact'];
                $_SESSION['followers'] = $row['followers'];
                $_SESSION['description'] = $row['description'];

                // Delete OTP
                unset($_SESSION['uid']);
                mysqli_query($conn, "DELETE FROM otp WHERE uid='$uid'");

                // Redirect to respective page
                if($row['category'] == 'Customer'){        
                    header('location:customerpage.php');

                }else if($row['category'] == 'Artist'){   
                    header('location:Artist/artistpage.php');

                }else if($row['category'] == 'Gallery'){
                    header('location:Gallery/gallerypage.php');

                } else if($row['category'] == 'Admin'){
                    header('location:Admin/admin.php');
                }
            }
        } else {
            echo "<div class='otp-warning'>OTP not matched!</div>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <link rel="stylesheet" href="../css/otp.css">
</head>
<body>
    <div class="otp-field">
        <form method="post" class="otp-form">
            <input type="number" name="otp" id="otp" placeholder="Enter Your OTP">
            <button class="btn-otp-submit" type="submit">Submit</button>
        </form>

        <form method="post">
            <input type="hidden" name="resend" id="resend">
            <button class="btn-otp-resend" type="submit">Resend OTP</button>
        </form>
    </div>
</body>
</html>