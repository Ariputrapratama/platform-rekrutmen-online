<?php
include 'db.php';
session_start();

if ($_SESSION['role'] != 'admin') {
    header('Location: login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $company = $_POST['company'];
    $location = $_POST['location'];

    $sql = "INSERT INTO jobs (title, description, company, location) VALUES ('$title', '$description', '$company', '$location')";
    if ($conn->query($sql) === TRUE) {
        echo "Job posted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Post Job</title>
</head>
<body>
    <form method="POST" action="">
        <label>Title:</label><br>
        <input type="text" name="title" required><br>
        <label>Description:</label><br>
        <textarea name="description" required></textarea><br>
        <label>Company:</label><br>
        <input type="text" name="company" required><br>
        <label>Location:</label><br>
        <input type="text" name="location" required><br>
        <button type="submit">Post Job</button>
    </form>
</body>
</html>
