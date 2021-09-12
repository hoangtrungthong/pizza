<?php
require "../../drivers/ConfigDB.php";
require "../../Contact.php";

$contact = new MysqlDB($conn);
$contacts = $contact->delete('contact',$_GET['id']);
header("location: index.php");
