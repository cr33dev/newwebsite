<?php
session_start();
session_destroy(); // gets rid of login
session_start();
header("Location: login.php"); // redirect
exit();