<!DOCTYPE html>

<?php
session_start();
if (isset($_SESSION['error1'])) {
    $error = $_SESSION['error1'];
    unset($_SESSION['error1']);
} else if (isset($_SESSION['error2'])) {
    $error = $_SESSION['error2'];
    unset($_SESSION['error2']);
} else if (isset($_SESSION['error3'])) {
    $error = $_SESSION['error3'];
    unset($_SESSION['error3']);
} else if (isset($_SESSION['error4'])) {
    $error = $_SESSION['error4'];
    unset($_SESSION['error4']);
} else {
    $error = null;
}
if ($error !== null) {
    echo "<p class='error'>{$error}. please try again</p>"; //can use curly braces to display the error
}



?>

<html lang="en">

<head>
    <link rel="stylesheet" href="master_styles.css">

    <meta charset="UTF-8">

    <title>Login</title>

</head>

<header> <h1> ImageHub </h1> </header>

<body>

<div class="form-wrap">
    <form action="loginverify.php" method="post">
        <div class="form-columns-wrapper">
            <div class="form-column">
                <label> Username <input type="text" name="username" required> </label><br>
                <label> Password <input type="password" name="password" required> </label><br>
            </div>
            <br>
            <div class="form-submit">
                <label><input type="submit" value="log in"></label>
            </div>
        </div>
    </form>
</div>

<div class="form-wrap">
    <form action="registerverify.php" method="post">
        <div class="form-columns-wrapper">
            <div class="form-column">
                <label> Username <input type="text" name="username" required> </label><br>
                <label> Age <input type="number" name="age" required> </label><br>
                <label> First name <input type="text" name="first_name" required></label><br>
            </div>
            <div class="form-column">
                <label> Password <input type="password" name="password" required> </label><br>
                <label> Email <input type="email" name="email" required></label><br>
                <label> Last name <input type="text" name="last_name" required></label><br>
            </div>
        </div>
        <br>
        <div class="form-submit">
            <label><input type="submit" value="create account"></label>
        </div>
    </form>
</div>




<footer>
    <p> &copy; 2023 ImageHub,   Cr33.dev </p>
</footer>
</body>

</html>
