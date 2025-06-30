<?php

session_start();

// dumps the already existing session data
var_dump($_SESSION);

// makes a session variable for the username

$username = trim($_POST['username']);
$password = $_POST['password'];

// dumps the post data
var_dump($_POST);

// sql connect

$sql = new mysqli('localhost','root','','imagehub'); // connects to the database "imagehub" that has my users table over localhost with the root user (no password)
if ($sql->connect_error) { // asks if the connection was successful
    die("Connection failed: " . $sql->connect_error); // kills the php section if failed
}

$attemptlogin = $sql->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
$attemptlogin->bind_param("ss", $username, $password);
$attemptlogin->execute();
$result = $attemptlogin->get_result();

if ($result->num_rows === 1) {
    $session = $result->fetch_assoc();
    $_SESSION['username'] = $session['username'];
    $_SESSION['email'] = $session['email'];
    $_SESSION['password'] = $session['password'];
    $_SESSION['first_name'] = $session['first_name'];
    $_SESSION['last_name'] = $session['last_name'];
    $_SESSION['age'] = $session['age'];
    $_SESSION['email'] = $session['email'];
    $_SESSION['id'] = $session['id'];
    header('Location: index.php');
    exit();
} else {
    // login fail
    $_SESSION['error1'] = 'Invalid username or password';
    header('Location: login.php');
    exit;
}