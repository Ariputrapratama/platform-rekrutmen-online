<!DOCTYPE html>
<html>
<head>
    <title>Rekrutmen Online</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <header>
        <nav>
            <a href="index.php" class="logo">Rekrutmen Online</a>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <?php if(isset($_SESSION['username'])): ?>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <main>
        <!-- Your main content goes here -->
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Rekrutmen Online. All rights reserved.</p>
    </footer>
</body>
</html>
