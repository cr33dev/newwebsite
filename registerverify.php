<?php

session_start();

var_dump($_SESSION);
$POST['age'] = trim($_POST['age']); // strips any spaces (no spaces)
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

$username = $_POST['username'];
$username = trim($username); // strips any spaces (no spaces)
$password = $_POST['password'];
$first_name = $_POST['first_name'];
$first_name = trim($first_name); // strips any spaces (no spaces)
$last_name = $_POST['last_name'];
$last_name = trim($last_name); // strips any spaces (no spaces)
$age = (int)$_POST['age'];
$email = $_POST['email'];

// sanitizes all fields

$username = htmlspecialchars($username); // sanitizes the username
$password = htmlspecialchars($password); // sanitizes the password
$first_name = htmlspecialchars($first_name); // sanitizes the first name
$last_name = htmlspecialchars($last_name); // sanitizes the last name
$age = htmlspecialchars($age); // sanitizes the age
$email = htmlspecialchars($email); // sanitizes the email

// encrypts password

$password = password_hash($password, PASSWORD_DEFAULT);

// encrypt all other fields


// sql connect

$sql = new mysqli('localhost','root','','imagehub'); // connects to the database "imagehub" that has my users table over localhost with the root user (no password)
if ($sql->connect_error) { // asks if the connection was successful
    die("Connection failed: " . $sql->connect_error); // kills the php section if failed
}

// check if username already exists

$username_check = $sql->prepare("SELECT username FROM users WHERE username = ?"); // prepares the sql statement
// " = ?" " -   this allows the variable to be inserted (username in this case)
$username_check->bind_param("s", $username); // adds the username to the sql statement
$username_check->execute(); // executes the sql statement to the users table
$result = $username_check->get_result(); // gets the result of the sql statement

if ($result->num_rows > 0) { // if any rows are returned then the username has been taken
    $_SESSION['error4'] = 'username already exists'; // session error to echo on the login screen
    header('Location: login.php'); // redirects to the login page
    exit; // stops php from continuing
}

// make a new user

$insert_user = $sql->prepare("INSERT INTO users (username, password, first_name, last_name, age, email) VALUES (?, ?, ?, ?, ?, ?)"); // prepares the sql query
$insert_user->bind_param("ssssis", $username, $password, $first_name, $last_name, $age, $email); // inserts the values of the username, password, first_name, last_name, age, email to the sql query
$insert_user->execute(); // runs the sql query
$_SESSION['success'] = 'Registration successful - please log in';
header('Location: login.php');
exit;