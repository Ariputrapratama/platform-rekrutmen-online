<?php
include 'db.php';

session_start();

if ($_SESSION['role'] != 'admin') {
    header('Location: ../login.php');
}

if (isset($_GET['job_id'])) {
    $job_id = $_GET['job_id'];

    $sql = "DELETE FROM jobs WHERE id='$job_id'";
    if ($conn->query($sql) === TRUE) {
        header('Location: manage_jobs.php');
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>
