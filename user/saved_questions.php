<?php
session_start();
require("../config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saved Questions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    .bg-success-light {
        background-color: #d1e7dd; /* Lighter shade of green */
    }
</style>
<body>
    <?php require "nav.php";?>
    <div class="container">
        <h1 class="text-center m-3">Saved Questions</h1><hr>
        <div class="row">
            <?php
            
if (!isset($_SESSION['user_id'])) {
    // Redirect the user if not logged in
    header("Location: login.php");
    exit();
}

$studentId = $_SESSION['user_id'];

// Fetch saved questions for the current student
$sql = "SELECT mcqs.*, mcqs.correct_ans 
        FROM saved_questions 
        JOIN mcqs ON saved_questions.question_id = mcqs.id 
        WHERE saved_questions.student_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $studentId);
$stmt->execute();
$result = $stmt->get_result();
$i=0;
if ($result->num_rows === 0) {
    echo '<p class="text-center">No saved questions found.</p>';
} else {
    $i=0;
    // Start displaying the saved questions in cards
    while ($row = $result->fetch_assoc()) {
        ?>
        <div class="card m-3">
            <div class="card-body">
                <h5 class="card-title"><?=++$i .". ". $row['question'] ?></h5>
                <p class="card-text">Difficulty: <?= $row['difficulty'] ?></p>
                <ul class="list-group">
                    <li class="list-group-item <?= $row['correct_ans'] == '1' ? 'bg-success-light' : '' ?>">
                        <?= $row['option1'] ?>
                    </li>
                    <li class="list-group-item <?= $row['correct_ans'] == '2' ? 'bg-success-light' : '' ?>">
                        <?= $row['option2'] ?>
                    </li>
                    <li class="list-group-item <?= $row['correct_ans'] == '3' ? 'bg-success-light' : '' ?>">
                        <?= $row['option3'] ?>
                    </li>
                    <li class="list-group-item <?= $row['correct_ans'] == '4' ? 'bg-success-light' : '' ?>">
                        <?= $row['option4'] ?>
                    </li>
                </ul>
                <!-- Add more details as needed -->
            </div>
        </div> 
        <?php
    }
}

// Close the database connection
$stmt->close();
$conn->close();
?>
        </div>
    </div>
    <?php require "../footer.php"; ?>
</body>
</html>
