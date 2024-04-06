<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Application</title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
.try {
    background-image: url('../img.png');
    background-repeat: no-repeat;
}

.card-container {
    display: flex;
    align-items: center;
    justify-content: center;
}

.card {
    background: rgba(255, 255, 255, 0.5);
    border-radius: 10px;
    width: 60%;
}

@media screen and (max-width: 768px) {
    .card {
        width: 90%;
    }
}
</style>

<body>
    <div class="try pb-4">
        <?php 
        require "nav.php";
        ?>

<?php
require "../config.php";
$id = $_SESSION['user_id'];
// Fetch saved questions for the current student
$sql = "SELECT name 
        FROM user
        WHERE id =$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc(); // Fetching the data
$name =  ucwords($row['name']); // Storing the name in a variable
?>

        <div class="container mt-4">
            <h1>Welcome, <?= $name;?></h1>
            <p>This application provides a platform for users to participate in quizzes on various topics. Whether
                you're looking to test your knowledge or prepare for an exam, our quizzes cover a wide range of
                subjects.</p>
            <p>To get started, simply navigate to the quiz section and select a quiz of your interest. You can also
                create an account and track your progress over time.</p>
            <p>Good luck and have fun!</p>
            <div class="card-container">
                <div class="card m-4 shadow-lg">
                    <h3 class="text-center mt-3">Instructions</h3>
                    <hr>
                    <ul>
                        <li>Total number of questions: 20.</li>
                        <li>
                            Time allotted: 15 minutes.
                        </li>
                        <li>
                            DO NOT refresh the page.
                        </li>
                        <li>Questions are divided into 3 categories : Easy, Medium and Hard</li>
                        <li>All the best!</li>
                        <a href="quiz.php" class="btn btn-outline-dark my-3 p-2">Start Now</a>
                    </ul>
                </div>
            </div>

        </div>
    </div>

<?php
    require "../footer.php";
?>

    <!-- JavaScript (optional, for Bootstrap's JavaScript plugins) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>