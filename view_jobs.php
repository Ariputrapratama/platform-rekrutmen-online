<?php
include 'db.php';
include 'index.php';

session_start();

// Initialize filters
$location = isset($_GET['location']) ? $_GET['location'] : '';
$company = isset($_GET['company']) ? $_GET['company'] : '';
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

// Construct SQL query with filters
$sql = "SELECT * FROM jobs WHERE 1=1";

if ($location != '') {
    $sql .= " AND location LIKE '%$location%'";
}

if ($company != '') {
    $sql .= " AND company LIKE '%$company%'";
}

if ($keyword != '') {
    $sql .= " AND (title LIKE '%$keyword%' OR description LIKE '%$keyword%')";
}

$result = $conn->query($sql);
?>

<h2>Available Jobs</h2>

<form method="GET" action="">
    <label>Location:</label>
    <input type="text" name="location" value="<?php echo htmlspecialchars($location); ?>">
    <label>Company:</label>
    <input type="text" name="company" value="<?php echo htmlspecialchars($company); ?>">
    <label>Keyword:</label>
    <input type="text" name="keyword" value="<?php echo htmlspecialchars($keyword); ?>">
    <button type="submit">Filter</button>
</form>

<ul>
    <?php while($row = $result->fetch_assoc()) { ?>
        <li>
            <h3><?php echo $row['title']; ?></h3>
            <p><?php echo $row['description']; ?></p>
            <p><?php echo $row['company']; ?> - <?php echo $row['location']; ?></p>
            <a href="apply_job.php?job_id=<?php echo $row['id']; ?>">Apply</a>
        </li>
    <?php } ?>
</ul>

<?php include 'footer.php'; ?>
