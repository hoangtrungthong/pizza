<?php

?>
<div class="sidebar">
    <ul>
        <li class="<?php if (basename($_SERVER['SCRIPT_NAME']) == 'index.php') {
                        echo "active";
                    } else {
                        echo '';
                    } ?>">
            <a href="../home/">Trang Chủ</a>
        </li>
        <li class="<?php if (basename($_SERVER['SCRIPT_NAME']) == 'customer.php') {
                        echo "active";
                    } else {
                        echo '';
                    } ?>">
            <a href="../customer/customer.php">khách hàng</a>
            <ul class="dropdown">
                <li><a href="../products/index.php">Danh sách <i class="fas fa-bars"></i></a></li>
                <li><a href="../products/create.php">Thêm <i class="fas fa-plus"></i></a></li>
                <li><a href="../products/update.php">Sửa <i class="fas fa-pencil-alt"></i></a></li>
                <li><a href="../products/delete.php">Xóa <i class="fas fa-minus"></i></a></li>
            </ul>
        </li>
        <li class="<?php if (basename($_SERVER['SCRIPT_NAME']) == 'product.php' || basename($_SERVER['SCRIPT_NAME']) == 'createProduct.php' || basename($_SERVER['SCRIPT_NAME']) == 'updateProduct.php') {
                        echo 'active';
                    } else {
                        echo '';
                    } ?>">
            <a href="../products/product.php">sản phẩm</a>
            <ul class="dropdown">
                <li><a href="../products/product.php">Danh sách <i class="fas fa-bars"></i></a></li>
                <li><a href="../products/createProduct.php">Thêm <i class="fas fa-plus"></i></a></li>
            </ul>
        </li>
        <li class="<?php if (basename($_SERVER['SCRIPT_NAME']) == 'toppings.php' || basename($_SERVER['SCRIPT_NAME']) == 'createTopping.php' || basename($_SERVER['SCRIPT_NAME']) == 'updateTopping.php') {
                        echo 'active';
                    } else {
                        echo '';
                    } ?>">
            <a href="../toppings/toppings.php">Topping</a>
            <ul class="dropdown">
                <li><a href="../toppings/toppings.php">Danh sách <i class="fas fa-bars"></i></a></li>
                <li><a href="../toppings/createTopping.php">Thêm <i class="fas fa-plus"></i></a></li>
            </ul>
        </li>
        <li class="<?php if (basename($_SERVER['SCRIPT_NAME']) == 'order.php') {
                        echo "active";
                    } else {
                        echo '';
                    } ?>">
            <a href="../orders/order.php">đơn hàng</a>
            <ul class="dropdown">
                <li><a href="../products/index.php">Danh sách <i class="fas fa-bars"></i></a></li>
                <li><a href="../products/create.php">Thêm <i class="fas fa-plus"></i></a></li>
                <li><a href="../products/update.php">Sửa <i class="fas fa-pencil-alt"></i></a></li>
                <li><a href="../products/delete.php">Xóa <i class="fas fa-minus"></i></a></li>
            </ul>
        </li>
        <!-- <li class="btn_menu">
            <a href="../users.php">
                <img src="../images/man.png" alt="" srcset="">
                Users
            </a>
            <i class="far fa-hand-point-right"></i>
             <ul class="dropdown"> 
                <li><a href="../products/create.php">Danh sách <i class="fas fa-bars"></i></a></li>
                <li><a href="../products/create.php">Thêm <i class="fas fa-plus"></i></a></li>
                <li><a href="../products/create.php">Sửa <i class="fas fa-pencil-alt"></i></a></li>
                <li><a href="../products/create.php">Xóa <i class="fas fa-minus"></i></a></li>
            </ul>
        </li>
        <li class="btn_menu">
            <a href="../contact/index.php">
                <img src="../images/phone-call.png" alt="" srcset="">
                Liên hệ
            </a>
            <i class="far fa-hand-point-right"></i>
        </li> -->
    </ul>
</div>
