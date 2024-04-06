<?php
session_start(); // Start session to store error messages

// Check if the user is already logged in, if yes, redirect to home page
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database configuration
    require_once "config.php";

    // Retrieve form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate form data
    if (empty($email) || empty($password)) {
        $_SESSION['error_message'] = "Please enter both email and password.";
    } else {
        // Prepare and execute SQL query to check user credentials
        $sql = "SELECT * FROM user WHERE email = ? AND password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            // Set session variables and redirect to home page
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            header("Location: user/dashboard.php");
            exit();
        } else {
            // Invalid email or password
            $_SESSION['error_message'] = "Invalid email or password.";
        }
    }
    // Redirect back to login page to display error message
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- JavaScript (optional, for Bootstrap's JavaScript plugins) -->
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

            <h1 class="text-center"> Login form</h1>
            <!-- Display error message if any -->
            <?php if (isset($_SESSION['error_message'])): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['error_message']; ?>
                </div>
                <?php unset($_SESSION['error_message']); ?> <!-- Clear the error message after displaying it -->
            <?php endif; ?>

            <form action="login.php" method="post">
                <div class="p-2">
                    <input type="email" class="form-control" name="email" placeholder="Email address" required>
                </div>
                <div class="p-2">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
               <!-- Add a link/button to initiate password reset -->
<a href="reset/forgot_password.php" class="m-3" style="text-decoration:none;">Forget Password?</a>

                <button type="submit" class="btn btn-primary m-3">Submit</button>
                <br>
                <span class="mx-3">Don't have an account <a href="signup.php">SignUp</a> Now</span>
            </form>
        </div>
    </div>
</body>

</html>
