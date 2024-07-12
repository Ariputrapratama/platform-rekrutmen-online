<?php
include '../includes/db.php';
session_start();

if ($_SESSION['role'] != 'admin') {
    header('Location: ../login.php');
}

$sql = "SELECT * FROM jobs";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Jobs</title>
</head>
<body>
    <h1>Manage Jobs</h1>
    <ul>
        <?php while($row = $result->fetch_assoc()) { ?>
            <li>
                <h2><?php echo $row['title']; ?></h2>
                <p><?php echo $row['description']; ?></p>
                <p><?php echo $row['company']; ?> - <?php echo $row['location']; ?></p>
                <a href="delete_job.php?job_id=<?php echo $row['id']; ?>">Delete</a>
            </li>
        <?php } ?>
    </ul>
</body>
</html>
