<?php
require "../../drivers/MysqlDB.php";
require "../../drivers/ConfigDB.php";
require "../app/ClassFile/Topping.php";

$topping = new Topping($conn);
$topping = $topping->delete('toppings',$_GET['id']);
header("location: index.php");
