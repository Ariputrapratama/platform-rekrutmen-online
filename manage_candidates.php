<?php
include 'db.php'; // Include database connection file
include 'index.php'; // Include header file for consistent navigation and styling

// Fetch candidates from the database
$candidates_query = "SELECT * FROM candidates";
$candidates_result = $conn->query($candidates_query);

if (!$candidates_result) {
    echo "Error fetching candidates: " . $conn->error;
    exit;
}
?>

<h2>Manage Candidates</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($candidate = $candidates_result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo htmlspecialchars($candidate['id']); ?></td>
                <td><?php echo htmlspecialchars($candidate['name']); ?></td>
                <td><?php echo htmlspecialchars($candidate['email']); ?></td>
                <td>
                    <a href="edit_candidate.php?id=<?php echo htmlspecialchars($candidate['id']); ?>">Edit</a>
                    <a href="delete_candidate.php?id=<?php echo htmlspecialchars($candidate['id']); ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php include 'footer.php'; // Include footer file for consistent navigation and styling ?>
