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
    background-image: url('img.png');
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
        <nav class="navbar navbar-expand-lg navbar-light p-3 bg-none shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Quiz Application</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="login.php">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container mt-4">
            <h1>Welcome to Quiz Application</h1>
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
                        <a href="login.php" class="btn btn-outline-dark my-3 p-2">Start Now</a>
                    </ul>
                </div>
            </div>

        </div>
    </div>

<?php
    require("footer.php");
?>

    <!-- JavaScript (optional, for Bootstrap's JavaScript plugins) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>