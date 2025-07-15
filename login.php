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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="master_styles.css">

    <meta charset="UTF-8">

    <title>Login</title>
</head>
<body>
<?php
if (isset($_SESSION['success'])) {
$success = $_SESSION['success'];
unset($_SESSION['success']);
echo "<p class='success'> account created successfully, please log in </p>";
}
if ($error !== null) {
    echo "<p class='error'>" . htmlspecialchars($error) . ". Please try again</p>";
}
?>
<header> <h1> ImageHub </h1> </header>



<div class="form-wrap">
    <form action="loginverify.php" method="post">
        <div class="form-columns-wrapper">
            <div class="form-column">
                <label> Username <input type="text" name="username" required> </label><br>
                <label> Password <input type="password" name="password" required> </label><br>
            </div>
            <br>
            <div class="form-submit">
                <input type="submit" value="log in">
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
            <input type="submit" value="create account">
        </div>
    </form>
</div>




<footer>
    <p> &copy; 2023 ImageHub,   Cr33.dev </p>
</footer>
</body>

</html>
