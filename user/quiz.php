<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
require("../config.php");

$questions = [];
$easyQuestions = fetchRandomQuestions($conn, 'Easy', 10);
$mediumQuestions = fetchRandomQuestions($conn, 'Medium', 5);
$hardQuestions = fetchRandomQuestions($conn, 'Hard', 5);
$questions = array_merge($easyQuestions, $mediumQuestions, $hardQuestions);

function fetchRandomQuestions($conn, $difficulty, $count)
{
    $sql = "SELECT * FROM mcqs WHERE difficulty = ? ORDER BY RAND() LIMIT ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $difficulty, $count);
    $stmt->execute();
    $result = $stmt->get_result();
    $questions = [];
    while ($row = $result->fetch_assoc()) {
        $questions[] = $row;
    }
    return $questions;
}

// Close database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Quiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<style>
    body{
        background-image: url('../img.png');
    background-repeat: no-repeat;
    }
        /* Custom CSS for the question card */
        .card {
            margin: 20px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
            background-color: #f8f9fa; /* Light gray background color */
        }

        .card-body {
            padding: 20px;
        }

        .card-content {
            margin-bottom: 20px;
        }

        .card-content h2 {
            font-size: 20px;
            color: #333; /* Dark text color */
        }

        .card-content span {
            color: #666; /* Medium gray text color */
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        label {
            margin-right: 15px;
        }

        button {
            margin-top: 10px;
            padding: 8px 16px;
            background-color: #007bff; /* Blue button color */
            border: none;
            border-radius: 5px;
            color: #fff; /* White button text color */
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
    </style>
<body>
    <?php require "nav.php";?>
    <div class="container">
        
        <div class="m-2">
            <h1 class="text-center">Online Quiz</h1>
            <div class=""style="font-size: 24px; text-align:right;margin-right:20px;">
    <span class="text-lg"><b>Timer :</b></span>
    <span id="timer"></span>
</div>
            <!-- Display fetched questions dynamically -->
            <?php foreach ($questions as $index => $question): ?>
                <div class="card <?= $index == 0 ? '' : 'd-none' ?>" id="question<?= $index + 1 ?>">
                    <div class="card-body">
                        <div class="card-content">
                            <h2>Question <?= $index + 1 ?>:</h2>
                            <span><?= $question['question'] ?></span>
                            <span><?= $question['difficulty'] ?></span>
                        </div>
                        <hr>
                        <?php for ($i = 1; $i <= 4; $i++): ?>
                            <input type="radio" name="question<?= $index + 1 ?>" id="q<?= $index + 1 ?>_option<?= $i ?>"
                             value="<?php echo ($question['correct_ans'] == $i) ? $question['marks'] : 0; ?>">
                            <label for="q<?= $index + 1 ?>_option<?= $i ?>"><?= $question['option'.$i] ?></label><br>
                            <hr>
                        <?php endfor; ?>
                        <div style="text-align:right;">
                            <?php if ($index > 0): ?>
                                <button class="btn btn-outline-dark" onclick="showQuestion('question<?= $index ?>')">Previous</button>
                            <?php endif; ?>
                            <?php if ($index < count($questions) - 1): ?>
                                <button class="btn btn-outline-dark" onclick="showQuestion('question<?= $index + 2 ?>')">Next</button>
                            <?php else: ?>
                                <button class="btn btn-outline-dark" onclick="showSubmit()">Submit</button>
                            <?php endif; ?>
                            <button class="btn btn-outline-success" onclick="saveQuestion(<?= $question['id'] ?>)">Save</button>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php
    require "../footer.php";
?>


<script>
    function saveQuestion(questionId) {
        var studentId = <?= $_SESSION['user_id'] ?>;
        // Send an AJAX request to save the question ID and student ID
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'save_question.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText); // Log the response for debugging
                var response = JSON.parse(xhr.responseText);
                console.log(response); // Log the parsed JSON response for debugging
                if (response.success) {
                    alert(response.message); // Show success message
                } else {
                    alert('Error: ' + response.message); // Show error message
                }
            }
        };
        xhr.send('questionId=' + questionId + '&studentId=' + studentId);
    }
</script>


    <script>
        var questions = document.querySelectorAll('.card');
        var currentQuestionIndex = 0;
        var timer = null;
        var timerDisplay = document.getElementById('timer');

        function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    var interval = setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            clearInterval(interval); // Stop the timer
            timer = duration; // Reset timer
            alert("Time's up! Quiz will be submitted automatically.");
            showSubmit(); // Submit the quiz
        }
    }, 1000);
}


        function initializeTimer() {
            var minutes = 15;
            startTimer(minutes * 60, timerDisplay);
        }

        initializeTimer();

        function showQuestion(questionId) {
            questions[currentQuestionIndex].classList.add('d-none');
            currentQuestionIndex = parseInt(questionId.replace('question', '')) - 1;
            questions[currentQuestionIndex].classList.remove('d-none');
        }

        function showSubmit() {
            alert('Quiz submitted!');
            var marks = calculateMarks();
            var totalQuestions = <?= count($questions) ?>;
            var answeredQuestions = countAnsweredQuestions();
            var unansweredQuestions = totalQuestions - answeredQuestions;
            var attemptedQuestions = countAttemptedQuestions();

            window.location.href = "result.php?marks=" + marks + "&totalQuestions=" + totalQuestions + "&answeredQuestions=" + answeredQuestions + "&unansweredQuestions=" + unansweredQuestions;
        }

        function calculateMarks() {
            var marks = 0;
            var numQuestions = <?= count($questions) ?>;
            for (var i = 1; i <= numQuestions; i++) {
                var radio = document.querySelector('input[name="question' + i + '"]:checked');
                if (radio) {
                    var value = parseInt(radio.value);
                    marks += value;
                }
            }
            return marks;
        }

        function countAnsweredQuestions() {
            var answeredQuestions = document.querySelectorAll('input[type="radio"]:checked').length;
            return answeredQuestions;
        }

        function countAttemptedQuestions() {
            var attemptedQuestions = document.querySelectorAll('input[type="radio"]:checked, input[type="radio"][data-review="true"]').length;
            return attemptedQuestions;
        }
    </script>
</body>
</html>
