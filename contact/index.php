<?php
require "../../drivers/ConfigDB.php";
require "../../drivers/MysqlDB.php";

class contact extends MysqlDB
{
    public function getRows()
    {
        $getContact = $this->get('contact');
        return $getContact['id'];
    }
    public function send($send)
    {
        if (isset($send['send'])) {
            $name = $send['name'];
            $phone = $send['phone'];
            $email = $send['email'];
            $address = $send['address'];
            $note = $send['note'];

            $getContact = $this->getRows();

            if (isset($getContact['id'])) {
                $sql = "INSERT INTO contact (name, phone, email, address, note)
                        VALUES ($name, $phone, $email, $address, $note)";
                $result = mysqli_query($this->conn, $sql);

                if ($result) {
                    
                }
            }
        }
    }
}
