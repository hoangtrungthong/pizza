<?php
// require "../drivers/ConfigDB.php";

// session_start();

// $id = isset($_GET['items']) ? intval($_GET['items']) : '';

// $products = new Product($conn);
// $products = $products->getDetailProduct($_GET['items']);

// if ($products) {
//     if (isset($_SESSION['cart'])) { 
//         if (isset($_SESSION['cart'][$id])) {
//             $_SESSION['cart'][$id]['quantity']++;
//         } else {
//             $_SESSION['cart'][$id] = [
//                 'product_id' => $products['id'],
//                 'pizza' => $products['name'],
//                 'product_image' => $products['image'],
//                 'size' => $products['size'],
//                 "quantity" => 1, 
//                 "price" => $products['price'] 
//             ];
//         }
//         $_SESSION['notification'] = "<script>alert('Sản phẩm đã được cập nhật trong giỏ hàng!')</script>";
//         header("location: ../index.php");
//     } else {
//         $_SESSION['cart'][$id] = [
//             'product_id' => $products['id'],
//             'pizza' => $products['name'],
//             'product_image' => $products['image'],
//             'size' => $products['size'],
//             "quantity" => 1, 
//             "price" => $products['price'] 
//         ];
//         $_SESSION['notification'] = "<script>alert('Sản phẩm đã được thêm vào giỏ hàng!')</script>";
//         header("location: ../cart.php");
//     }
// } else {
//     $_SESSION['notification'] = "<script>alert('Sản phẩm không tồn tại!')</script>";
// }
