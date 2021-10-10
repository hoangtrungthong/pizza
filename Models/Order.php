<?php
require "../drivers/ConfigDB.php";
require "../admin/app/ClassFile/Topping.php";
require "../admin/app/ClassFile/Product.php";

class Order extends MysqlDB
{
    public function addOrder($request, $conn)
    {
        $id = isset($request) ? intval($request) : '';

        $products = new Product($conn);
        $products = $products->getDetailProduct($request);

        if ($products) {
            if (isset($_SESSION['cart'])) {
                if (isset($_SESSION['cart'][$id])) {
                    $_SESSION['cart'][$id]['quantity']++;
                } else {
                    $_SESSION['cart'][$id] = [
                        'pizza' => $products['name'],
                        'product_image' => $products['image'],
                        'size' => $products['size'],
                        "quantity" => 1,
                        "price" => $products['price']
                    ];
                }
                $_SESSION['notification'] = "<script>alert('Sản phẩm đã được cập nhật trong giỏ hàng!')</script>";
                header("location: ../cart.php");
            } else {
                $_SESSION['cart'][$id] = [
                    'pizza' => $products['name'],
                    'product_image' => $products['image'],
                    'size' => $products['size'],
                    "quantity" => 1,
                    "price" => $products['price']
                ];
                $_SESSION['notification'] = "<script>alert('Sản phẩm đã được thêm vào giỏ hàng!')</script>";
                header("location: ../cart.php");
            }
        } else {
            $_SESSION['notification'] = "<script>alert('Sản phẩm không tồn tại!')</script>";
        }
    }
}
