<?php
require "../../drivers/ConfigDB.php";
require "../../drivers/MysqlDB.php";
require "../app/ClassFile/Contact.php";

$contact = new Contact($conn);
$contact->updateStatus();
?>
