<?php
include 'db.php';
include 'index.php';

session_start();

if ($_SESSION['role'] != 'user') {
    header('Location: login.php');
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT jobs.title AS job_title, applications.status AS application_status 
        FROM applications 
        JOIN jobs ON applications.job_id = jobs.id 
        WHERE applications.user_id = '$user_id'";
$result = $conn->query($sql);
?>

<h2>Track Your Applications</h2>
<table>
    <thead>
        <tr>
            <th>Job Title</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['job_title']; ?></td>
                <td><?php echo $row['application_status']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php include 'footer.php'; ?>
