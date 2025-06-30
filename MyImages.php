<?php
session_start();

if ($_SESSION == null) {
    header('Location: login.php');
    exit;
}
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();}

$session_name = $_SESSION['username'];
$session_id = $_SESSION['id'];
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
<header>
    <h1> ImageHub </h1>
    <div class="directory-flexbox"><a href="index.php"> <p> Home </p></a> <a href="MyImages.php"> <p> My Images </p></a> <a href="logout.php"><p> Logout </p></a></div>
</header>
<div class="sub-heading">
<h1> My images - <?php echo $session_name ; ?> </h1><br>
    <?php
    $directory = __DIR__ . "/user_images/" . $session_id . "/";
    $webpath ="/user_images/" . $session_id . "/";
    echo '<div class="images-grid">';
    if (is_dir($directory) && is_readable($directory)) {
        $files = scandir($directory);
        if ($files !== false) {
            $files = array_diff($files, array('.', '..'));
            foreach($files as $file) {
                if(is_file($directory . $file)) {
                    echo "<div class='image-container'>";
                    echo "<img src='serve_image.php?file=" . htmlspecialchars($file) . "' alt='" . htmlspecialchars($file) . "'>";
                    echo "<p>" . htmlspecialchars($file) . "</p>";
                    echo "</div>";
                }
            }
        }
    } else {
        echo "<div class='image-container'><p> you have no images </p></div>";
    }
    ?>
</div>
</body>
</html>