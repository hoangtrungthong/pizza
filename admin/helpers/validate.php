<?php

function validateFile($file, $maxSize, $method = null)
{
    $errors = [];
    $fileName = $file['name'];
    $imgName = basename($fileName);
    $type = pathinfo($imgName, PATHINFO_EXTENSION);
    $ext = ["jpg", "png", "jpeg", "JPG", "PNG", "JPEG"];
    
    if ($method !== "POST" && !$fileName) {
        $errors['image'] = "Vui lòng upload file!";
    } else if (!in_array($type, $ext)) {
        $errors['image'] = "Không đúng định dạng.";
    } else if ($file['size'] > $maxSize) {
        $errors['image'] = "File không được quá 5MB";
    }

    return $errors;
}
