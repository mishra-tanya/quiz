<?php
session_start();
require("../config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(array('success' => false, 'message' => 'User not logged in'));
        exit();
    }

    // Get the question ID and student ID from the POST data
    $questionId = $_POST['questionId'];
    $studentId = $_POST['studentId'];

    // Perform any necessary validation and sanitization

    // Insert the question ID and student ID into the database
    $sql = "INSERT INTO saved_questions (question_id, student_id) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $questionId, $studentId);
    if ($stmt->execute()) {
        echo json_encode(array('success' => true, 'message' => 'Question saved successfully'));
    } else {
        echo json_encode(array('success' => false, 'message' => 'Error: ' . $conn->error));
    }
} else {
    echo json_encode(array('success' => false, 'message' => 'Invalid request method'));
}
?>
