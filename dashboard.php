<?php
include 'db.php';
include 'index.php';

session_start();

if (!isset($_SESSION['role'])) {
    header('Location: login.php');
}

$user_id = $_SESSION['user_id'];
$role = $_SESSION['role'];

$total_jobs_query = "SELECT COUNT(*) AS total_jobs FROM jobs";
$total_jobs_result = $conn->query($total_jobs_query);
$total_jobs = $total_jobs_result->fetch_assoc()['total_jobs'];

if ($role == 'admin') {
    $total_applications_query = "SELECT COUNT(*) AS total_applications FROM applications";
} else {
    $total_applications_query = "SELECT COUNT(*) AS total_applications FROM applications WHERE user_id='$user_id'";
}

$total_applications_result = $conn->query($total_applications_query);
$total_applications = $total_applications_result->fetch_assoc()['total_applications'];

if ($role == 'admin') {
    $total_users_query = "SELECT COUNT(*) AS total_users FROM users WHERE role='user'";
    $total_users_result = $conn->query($total_users_query);
    $total_users = $total_users_result->fetch_assoc()['total_users'];
}

?>

<h2>Dashboard</h2>

<div class="dashboard">
    <div class="dashboard-item">
        <h3>Total Jobs</h3>
        <p><?php echo $total_jobs; ?></p>
    </div>
    <div class="dashboard-item">
        <h3>Total Applications</h3>
        <p><?php echo $total_applications; ?></p>
    </div>
    <?php if ($role == 'admin') { ?>
        <div class="dashboard-item">
            <h3>Total Users</h3>
            <p><?php echo $total_users; ?></p>
        </div>
        <div class="dashboard-actions">
            <h3>Quick Actions</h3>
            <ul>
                <li><a href="post_job.php">Post a Job</a></li>
                <li><a href="admin/manage_jobs.php">Manage Jobs</a></li>
                <li><a href="manage_candidates.php">Manage Candidates</a></li>
            </ul>
        </div>
    <?php } else { ?>
        <div class="dashboard-actions">
            <h3>Quick Actions</h3>
            <ul>
                <li><a href="view_jobs.php">View Jobs</a></li>
                <li><a href="track_application.php">Track Applications</a></li>
                <li><a href="manage_candidates.php">Kandidat</a></li>
            </ul>
        </div>
    <?php } ?>
</div>

<?php include 'footer.php'; ?>
