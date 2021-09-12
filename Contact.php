<?php
require "drivers/ConfigDB.php";
require "drivers/MysqlDB.php";

class Contact extends MysqlDB
{
    public function getAllContact($table)
    {
        $this->get($table);
    }

    public function getContact($phone)
    {
        $sql = "SELECT * FROM contact WHERE phone = '$phone'";
        $query = mysqli_query($this->conn, $sql);
        $results = mysqli_fetch_assoc($query);
        
        return $results;
    }

    public function send($request)
    {
        if (isset($request['send'])) {
            $name = $request['name'];
            $phone = $request['phone'];
            $email = $request['email'];
            $address = $request['address'];
            $note = $request['note'];
            $where = ['phone' => "$phone"];
            $data = [
                'name' => "$name",
                'phone' => "$phone",
                'email' => "$email",
                'address' => "$address",
                'note' => "$note"
            ];

            $getContact = $this->getContact($phone);
            if (!isset($getContact)) {
                $this->insert('contact', $data);
                echo '<script>alert("Thành công !!")</script>';
            } else if (isset($getContact)) {
                $this->update('contact', $data, $where);
                echo '<script>alert("Cảm ơn bạn đã luôn theo dỗi chúng tôi!")</script>';
            } else {
                echo '<script>alert("Lỗi !! Vui lòng thử lại.")</script>';
            }
        }
    }
}
