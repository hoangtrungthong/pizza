<?php
session_start();

if (isset($_SESSION['cart'][$_GET['items']])) {
    unset($_SESSION['cart'][$_GET['items']]);
    $_SESSION['notification'] = "<script>alert('Đã xóa sản phẩm khỏi giỏ hàng!')</script>";
    header("location: ../cart.php");
}
