<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("HTTP/1.0 403 Forbidden");
    exit;
}
$session_id = $_SESSION['id'];
$session_name = $_SESSION['username'];
// Validate and sanitize the filename parameter
$filename = isset($_GET['file']) ? basename($_GET['file']) : '';
$filepath = __DIR__ . "/user_images/" . $session_id . "/" . $filename;
// Verify the file exists and is within the allowed directory
if (!empty($filename) && file_exists($filepath) && is_file($filepath)) {
    // Get MIME type
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime_type = finfo_file($finfo, $filepath);
    finfo_close($finfo);

    // Only allow image MIME types
    if (strpos($mime_type, 'image/') === 0) {
        header('Content-Type: ' . $mime_type);
        header('Content-Length: ' . filesize($filepath));
        readfile($filepath);
        exit;
    }
}

header("HTTP/1.0 404 Not Found");
exit;