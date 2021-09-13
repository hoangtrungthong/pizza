<?php 
require "../../drivers/ConfigDB.php";
require "../app/ClassFile/Product.php";
error_reporting(0);

$product = new Product($conn);
$product->delete($_GET['id']);
