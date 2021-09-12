<?php

function validateField($name, $description, $size, $price)
{
    $errors = [];
    if (!$name) {
        $errors['name_product'] = "Hãy điền tên!";
    } 
    if (!$description) {
        $errors['descriptions'] = "Mô tả không được để trống!";
    }
    if (!$size) {
        $errors['size'] = "Hãy nhập kích cỡ!";
    }
    if (!$price && !is_numeric($price) && !is_int($price)) {
        $errors['price'] = "Hãy nhập giá!";
    }

    return $errors;
}

function validateFile($file, $maxSize, $method)
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
