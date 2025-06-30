<?php
session_start();

if ($_SESSION == null) {
    header('Location: login.php');
    exit;
}

$session_name = $_SESSION['username'];
$session_id = $_SESSION['id'];
$session_age = $_SESSION['age'];
$session_first_name = $_SESSION['first_name'];
$session_last_name = $_SESSION['last_name'];
$session_email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="master_styles.css">
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
<header>
    <h1> ImageHub</h1>
    <div class="directory-flexbox"><a href="index.php"> <p> Home </p></a> <a href="MyImages.php"> <p> My Images </p></a> <a href="logout.php"><p> Logout </p></a></div>
</header>
<div class="left">
    <h1>Welcome, <span class="highlight-var"><?php echo htmlspecialchars($session_first_name . ' ' . $session_last_name); ?></span></h1>
    <h1>ID Number, <span class="highlight-var"><?php echo htmlspecialchars($session_id); ?></span></h1>
    <h1>Username, <span class="highlight-var"><?php echo htmlspecialchars($session_name); ?></span></h1>
    <h1>Email, <span class="highlight-var"><?php echo htmlspecialchars($session_email); ?></span></h1>
</div>
</body>
</html>


