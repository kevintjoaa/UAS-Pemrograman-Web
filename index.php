<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Inventaris</title>
    <link rel="stylesheet" href="./assets/css/index.css">
    <script src="./assets/js/script.js" defer></script>
</head>
<body>
    <header>
        <nav>
            <h1>Inventory Management System</h1>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="inventori.php">Inventory List</a></li>
                <a href="logout.php" class="logout">Logout</a>
            </ul>
        </nav>
    </header>

    <section id="home">
        <div class="overlay">
        <h2>Welcome to Inventory Manager</h2>
        <p>Track and manage your stock efficiently with our system.</p>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Inventory Management System. All rights reserved.</p>
    </footer>

</body>
</html>
