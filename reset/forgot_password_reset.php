<?php
$message = "";
$valid = 'true';
include("../config.php");
session_start();
if(isset($_GET['key']) && isset($_GET['email'])) {
    $key = $_GET['key'];
    $email = $_GET['email'];
    $check = mysqli_query($conn,"SELECT * FROM forget_password WHERE email='$email' and temp_key='$key'");
    // If key doesn't match
    if (mysqli_num_rows($check) != 1) {
      echo "This URL is invalid or has already been used. Please verify and try again.";
      exit;
    }
} else {
  header('location:index.php');
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $password1 = mysqli_real_escape_string($conn, $_POST['password1']);
    $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
    if ($password2 == $password1) {
        $message_success = "New password has been set for " . $email;
        // Destroy the key from table
        mysqli_query($conn, "DELETE FROM forget_password where email='$email' and temp_key='$key'");
        // Update password in the database without hashing
        mysqli_query($conn, "UPDATE user set password='$password1' where email='$email'");
        // Destroy the session to log out the user
        session_destroy();
    } else {
        $message = "Verify your password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <title>Reset Password</title>
</head>
<body>
<div class="container">
    <div class="row"><br><br><br>
        <div class="col-md-4"></div>
        <div class="col-md-4" style="  ">
            <br><br>
            <form role="form" method="POST">
                <label>Please enter your new password</label><br><br>
                <div class="form-group">
                    <input type="password" class="form-control" id="pwd" name="password1" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="pwd" name="password2" placeholder="Re-type Password">
                </div>
                <?php if (isset($error)) {
                    echo"<div class='alert alert-danger' role='alert'>
                    <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
                    <span class='sr-only'>Error:</span>".$error."</div>";
                } ?>
                <?php if ($message <> "") {
                    echo"<div class='alert alert-danger' role='alert'>
                    <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
                    <span class='sr-only'>Error:</span>".$message."</div>";
                } ?>
                <?php if (isset($message_success)) {
                    echo"<div class='alert alert-success' role='alert'>
                    <span class='glyphicon glyphicon-ok' aria-hidden='true'></span>
                    <span class='sr-only'>Error:</span>".$message_success."</div>";
                } ?>
                <button type="submit" class="btn btn-primary pull-right" name="submit" style="display: block; width: 100%;">Save Password</button>
                <br><br>
                <label>This link will work only once for a limited time period.</label>
                <center> <a href="../login.php">Back to Login</a></center>
                <br>
            </form>
        </div>
        <div class="col-md-4">
            <br><br>
        </div>
    </div>
</div>
</body>
</html>
