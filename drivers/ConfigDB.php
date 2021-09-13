<?php

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'piza';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_errno) {
    die("<script>alert('không thể kểt nối với dữ liệu')</script>");
}
