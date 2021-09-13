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
