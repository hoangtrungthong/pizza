<?php
function validateTopping($name, $price)
{
    $errors = [];
    if (!$name) {
        $errors['name'] = "Hãy điền tên!";
    } 
    if (!$price && !is_numeric($price) && !is_int($price)) {
        $errors['price'] = "Hãy nhập giá!";
    }

    return $errors;
}
