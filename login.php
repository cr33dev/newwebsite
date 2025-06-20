<!DOCTYPE html>

<?php
session_start();
if (isset($_SESSION['error1'])) {
    $error = $_SESSION['error1'];
} else if (isset($_SESSION['error2'])) {
    $error = $_SESSION['error2'];
} else if (isset($_SESSION['error3'])) {
    $error = $_SESSION['error3'];
} else if (isset($_SESSION['error4'])) {
    $error = $_SESSION['error4'];
} else if (isset($_SESSION['error5'])) {
    $error = $_SESSION['error5'];
} else if (isset($_SESSION['error6'])) {
    $error = $_SESSION['error6'];
} else {
    $error = null;
} if ($error != null) {
    echo "<p class='error'> $error. please try again </p>";
}
?>

<html lang="en">

<head>
    <link rel="stylesheet" href="master_styles.css">

    <meta charset="UTF-8">

    <title>Login</title>

</head>

<body>

<form action="loginverify.php" method="post">

  Username <label> <input type="text" name="username" required> </label>

  Password <label> <input type="password" name="password" required> </label>

  age <label> <input type="number" name="age" required> </label>

  First name <label> <input type="text" name="first_name" required></label>

  Last name <label> <input type="text" name="last_name" required></label>

  Email <label> <input type="text" name="email" required></label>

  <label> <input type="submit"></label>

</form>

</body>

</html>
