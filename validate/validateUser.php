<?php
function validate($name, $phone, $email, $address)
{
    $errors = [];
    
    if (!$name) {
        $errors['name'] = "Hãy điền tên!";
    } 
    if (!$phone && !is_numeric($phone) && !is_int($phone)) {
        $errors['phone'] = "Hãy điền số điện thoại!";
    }
    if (!$email) {
        $errors['email'] = "Hãy địa chỉ email!";
    }
    if (!$address) {
        $errors['address'] = "Hãy nhập địa chỉ!";
    }

    return $errors;
}
