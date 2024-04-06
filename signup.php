<?php
require("config.php"); // Include database configuration

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $city = $_POST["city"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if email already exists
    $check_email_query = "SELECT * FROM user WHERE email = ?";
    $check_stmt = $conn->prepare($check_email_query);
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        echo "<script>alert('Email already exists! Please use a different email.'); window.location.href = 'signup.php';</script>";
        exit();
    }

    $check_stmt->close();

    // Insert data into the database
    $insert_query = "INSERT INTO user (name, city, phone, email, password) VALUES (?, ?, ?, ?, ?)";
    $insert_stmt = $conn->prepare($insert_query);
    $insert_stmt->bind_param("sssss", $name, $city, $phone, $email, $password);
    
    if ($insert_stmt->execute()) {
        echo "<script>alert('Signup successful!'); window.location.href = 'login.php';</script>";
        exit(); // Stop further execution
    } else {
        echo "Error: " . $insert_stmt->error;
    }

    $insert_stmt->close();
    $conn->close();
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- JavaScript (optional, for Bootstrap's JavaScript plugins) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 90vh;
        }

        .card {
           
            width: 40%;
            border: none; /* Remove card border */
        }

        .btn {
            width: 93%;
        }

        @media screen and (max-width: 768px) {
            .card {
                width: 90%;
                margin-top: 0%;
            }
        }
    </style>

</head>

<body>    <?php
       require "nav.php";?>

    <div class="container">
        <div class="card">

            <h1 class="text-center"> SignUp form</h1>
            <form method="POST" action="" onsubmit="return validateForm()">
                <div class="p-2">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                    <span id="nameError" class="text-danger"></span>
                </div>
                <div class="p-2">
                    <input type="text" class="form-control" name="city" id="city" placeholder="City" required>
                    <span id="cityError" class="text-danger"></span>
                </div>
                <div class="p-2">
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone No." required>
                    <span id="phoneError" class="text-danger"></span>
                </div>
                <div class="p-2">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email address" required>
                    <span id="emailError" class="text-danger"></span>
                </div>
                <div class="p-2">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    <span id="passwordError" class="text-danger"></span>
                </div>

                <button type="submit" class="btn btn-dark m-3">SignUp</button>
                <br>
                <span class="mx-3">Already have an account <a class="text-dark" href="login.php">Login</a> Now</span>
            </form>
        </div>
    </div>

    <script>
        function validateForm() {
            var name = document.getElementById("name").value;
            var city = document.getElementById("city").value;
            var phone = document.getElementById("phone").value;
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;

            // Reset previous errors
            document.getElementById("nameError").innerHTML = "";
            document.getElementById("cityError").innerHTML = "";
            document.getElementById("phoneError").innerHTML = "";
            document.getElementById("emailError").innerHTML = "";
            document.getElementById("passwordError").innerHTML = "";

            // Name validation (required)
            if (name.trim() === "") {
                document.getElementById("nameError").innerHTML = "Name is required";
                return false;
            }

            // City validation (required)
            if (city.trim() === "") {
                document.getElementById("cityError").innerHTML = "City is required";
                return false;
            }

            // Phone validation (required and numeric)
            if (phone.trim() === "") {
                document.getElementById("phoneError").innerHTML = "Phone number is required";
                return false;
            } else if (!/^\d+$/.test(phone)) {
                document.getElementById("phoneError").innerHTML = "Phone number must be numeric";
                return false;
            }

            // Email validation (required and format)
            if (email.trim() === "") {
                document.getElementById("emailError").innerHTML = "Email is required";
                return false;
            } else if (!/^\S+@\S+\.\S+$/.test(email)) {
                document.getElementById("emailError").innerHTML = "Invalid email format";
                return false;
            }

            // Password validation (required and length)
            if (password.trim() === "") {
                document.getElementById("passwordError").innerHTML = "Password is required";
                return false;
            } else if (password.length < 6) {
                document.getElementById("passwordError").innerHTML = "Password must be at least 6 characters long";
                return false;
            }

            return true; // Submit the form if all validations pass
        }
    </script>
</body>

</html>
