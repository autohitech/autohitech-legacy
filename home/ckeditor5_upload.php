<?php
include_once("./_common.php");

/**
 * CKEditor 5 Image Upload Handler for Gnuboard 4
 * 
 * SECURITY:
 * 1. Authentication check (Member or Admin).
 * 2. Extension validation (Whitelisted images only).
 * 3. MIME type verification using getimagesize.
 * 4. Filename randomization to prevent execution or overwriting.
 */

// [LEGACY:PHP5.6] Compatibility: Manual error reporting if needed
error_reporting(0);

// 1. Authorization Check
if (!$is_member && !$is_admin) {
    echo json_encode(array("error" => array("message" => "Authentication required.")));
    exit;
}

// 2. Directory Setup
$upload_dir = $g4['path'] . "/data/editor";
$upload_url = $g4['url'] . "/data/editor";

$ym = date("ym", $g4['server_time']);
$target_dir = $upload_dir . "/" . $ym;
$target_url = $upload_url . "/" . $ym;

if (!is_dir($target_dir)) {
    @mkdir($target_dir, 0707);
    @chmod($target_dir, 0707);
}

// 3. Handle Upload
if (isset($_FILES['upload'])) {
    $file = $_FILES['upload'];
    $filename = $file['name'];
    $tmp_name = $file['tmp_name'];
    
    // Validate extension
    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $allowed_ext = array("jpg", "jpeg", "png", "gif", "webp");
    
    if (!in_array($ext, $allowed_ext)) {
        echo json_encode(array("error" => array("message" => "Invalid file extension (Allowed: jpg, png, gif, webp).")));
        exit;
    }
    
    // Verify it's an actual image
    $size = @getimagesize($tmp_name);
    if ($size === false) {
        echo json_encode(array("error" => array("message" => "The uploaded file is not a valid image.")));
        exit;
    }
    
    // Create random filename
    $new_filename = md5(uniqid((string)$g4['server_time'], true)) . "." . $ext;
    $dest_path = $target_dir . "/" . $new_filename;
    
    if (move_uploaded_file($tmp_name, $dest_path)) {
        @chmod($dest_path, 0606);
        
        // CKEditor 5 Success Response
        echo json_encode(array(
            "url" => $target_url . "/" . $new_filename
        ));
    } else {
        echo json_encode(array("error" => array("message" => "Failed to move uploaded file.")));
    }
} else {
    echo json_encode(array("error" => array("message" => "No file uploaded.")));
}
?>
