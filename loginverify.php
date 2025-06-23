<?php

session_start();

var_dump($_SESSION);

if ((int)$_POST['age'] == 0) {
    $_SESSION['error1'] = 'Age cannot be 0';
    header('Location: login.php');
    exit;
}

if ((int)$_POST['age'] < 16) {
    $_SESSION['error2'] = 'You must be at least 16 years old';
    header('Location: login.php');
    exit;
}

if ((int)$_POST['age'] > 120) {
    $_SESSION['error3'] = 'You must be less than 120 years old';
    header('Location: login.php');
    exit;
}

$_SESSION['last_name'] = $_POST['last_name'];
$_SESSION['password'] =$_POST['password'];
$_SESSION['first_name'] = $_POST['first_name'];
$_SESSION['username'] =$_POST['username'];
$_SESSION['age'] = $_POST['age'];
var_dump($_POST);

header('Location: index.php');

exit;