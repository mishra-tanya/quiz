<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Result</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- JavaScript (optional, for Bootstrap's JavaScript plugins) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
            font-size: 36px;
            animation: tada 1s infinite;
        }

        p {
            color: #666;
            font-size: 18px;
            margin-bottom: 10px;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Quiz Result</h1><hr>
            <h1 class="text-center m-4  ">Marks: <?php echo isset($_GET['marks']) ? $_GET['marks'] : 'N/A'; ?></h1>
            <p>Total Questions: <?php echo isset($_GET['totalQuestions']) ? $_GET['totalQuestions'] : 'N/A'; ?></p>
            <p>Answered Questions: <?php echo isset($_GET['answeredQuestions']) ? $_GET['answeredQuestions'] : 'N/A'; ?></p>
            <p>Unanswered Questions: <?php echo isset($_GET['unansweredQuestions']) ? $_GET['unansweredQuestions'] : 'N/A'; ?></p>
        </div>
    </div>
</body>
</html>
