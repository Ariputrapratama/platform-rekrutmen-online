<?php
include 'db.php';
session_start();

if ($_SESSION['role'] != 'user') {
    header('Location: login.php');
}

if (isset($_GET['job_id'])) {
    $job_id = $_GET['job_id'];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO applications (job_id, user_id) VALUES ('$job_id', '$user_id')";
    if ($conn->query($sql) === TRUE) {
        echo "Application submitted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
