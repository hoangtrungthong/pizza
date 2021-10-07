<?php
require "drivers/ConfigDB.php";
require "drivers/MysqlDB.php";
require "validate/validateUser.php";

class Customer extends MysqlDB
{
    public function getAllCustomer($table)
    {
        $this->get($table);
    }

    public function getCustomers($email, $phone)
    {
        $sql = "SELECT * FROM customers WHERE email = '$email' OR phone = '$phone' LIMIT 1";
        $query = mysqli_query($this->conn, $sql);
        $results = mysqli_fetch_assoc($query);

        return $results;
    }

    public function register($request)
    {
        if (isset($request['submit'])) {
            $name = $_POST['fullname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $password = md5($_POST['password']);
            $rePassword = md5($_POST['rePassword']);

            $data = [
                'name' => "$name",
                'phone' => "$phone",
                'email' => "$email",
                'address' => "$address",
                'password' => "$password"
            ];

            $errors = validate($name, $phone, $email, $address, $password, $rePassword);

            if (empty($errors)) {
                if ($password === $rePassword) {
                    $getUser = $this->getCustomers($email, $phone);
                    if (!isset($getUser)) {
                        $this->insert('customers', $data);
                        echo '<script>alert("Đăng kí thành công!! Hãy đăng nhập!")</script>';
                        echo '<script>window.location.href="../login/index.php"</script>';
                    } else {
                        if ($getUser['email'] === $_POST['email']) {
                            $message = 'Địa chỉ email đã được sử dụng.';
                            $this->error($message);
                        }
                        if ($getUser['phone'] === $_POST['phone']) {
                            $message = 'Số điện thoại đã được sử dụng.';
                            $this->error($message);
                        }
                    }
                } else {
                    $message = "Mật khẩu xác nhận không chính xác.";
                    $this->error($message);
                }
            } else {
                return $errors;
            }
        }
    }

    public function login($request)
    {
        if (isset($request['submit'])) {
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = md5($_POST['password']);

            $result = $this->getCustomers($email, $phone);
            if ('0'.$result['phone'] === $phone && $result['email'] === $email && $result['password'] === $password) {
                $_SESSION['email'] = $email;
                $_SESSION['username'] = $result['name'];
                echo '<script>window.location.href="../index.php"</script>';
            } else {
                $message = 'Thông tin tài khoản hoặc mật khẩu không chính xác.';
                $this->error($message);
            }
        }
    }
}
