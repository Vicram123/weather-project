<?php
include("connection.php");
include("functions.php");
$user = check_login($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <h2>Welcome, <?php echo htmlspecialchars($user['name']); ?>!</h2>
    <p>Your role: <?php echo htmlspecialchars($user['role']); ?></p>
    <a href="logout.php">Logout</a>
</body>

</html>