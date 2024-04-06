<?php
$message="";
$valid='true';
include("../config.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $details=mysqli_query($conn,"SELECT name,email FROM user WHERE email='$email'");
    if (mysqli_num_rows($details)>0) { //if the given email is in database, ie. registered
        $message_success=" Please check your email inbox or spam folder and follow the steps";
        //generating the random key
       
        header("Location: ../test.php?email=" . urlencode($email));
        exit();
    }
    else{
        $message="Sorry! no account associated with this email";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Result</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .card {
            margin-top: 1%;
            width: 40%;
            border: none; /* Remove card border */
        }

        .btn {
            width: 90%;
        }

        @media screen and (max-width: 768px) {
            .card {
                width: 90%;
                margin-top: 0%;
            }
        }
    </style>
</head>
<body>
<div class="container">
        <div class="card">
            <h1 class="text-center">Forgot Password</h1>
            <!-- Display error message if any -->
            <?php if (isset($_SESSION['error_message'])): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['error_message']; ?>
                </div>
                <?php unset($_SESSION['error_message']); ?> <!-- Clear the error message after displaying it -->
            <?php endif; ?>
            <form method="post" action="forgot_password.php">
                <div class="p-2">
                    <input type="email" id="email" class="form-control" name="email" placeholder="Enter your email address" required>
                </div>
                <button type="submit" class="btn btn-primary m-3">Reset Password</button>
            </form>
        </div>
    </div>
</body>
</html>
