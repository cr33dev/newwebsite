<?php
session_start();

if ($_SESSION == null) {
    header('Location: login.php');
    exit;
}

$session_name = $_SESSION['username'];
$session_age = $_SESSION['age'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="master_styles.css">
    <meta charset="UTF-8">
    <title>Loading</title>
</head>
<body>
<h1> Hi <?php echo $session_name ; ?> </h1><br>
<h2> you are <?php echo $session_age ?> years old</h2>
</body>
</html>


