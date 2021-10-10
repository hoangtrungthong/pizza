<?php
require "../drivers/ConfigDB.php";
require "../drivers/MysqlDB.php";
require "../validate/validateUser.php";

class User extends MysqlDB
{
    public function getAllUser($table)
    {
        $this->get($table);
    }

    public function getUsers($email, $phone)
    {
        $sql = "SELECT * FROM users WHERE email = '$email' OR phone = '$phone' LIMIT 1";
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
                    $getUser = $this->getUsers($email, $phone);
                    if (!isset($getUser)) {
                        $this->insert('users', $data);
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

            $result = $this->getUsers($email, $phone);
            if ($email === 'admin@pizza.com' && $password === md5(123123) && $phone === "0123456789") {
                $_SESSION['admin'] = $email;
                $_SESSION['username'] = $result['name'];
                echo '<script>alert("Chào mừng bạn đến với trang quản trị.")</script>'; 
                echo '<script>window.location.href="../admin/home/"</script>';
            } else if ('0'.$result['phone'] === $phone && $result['email'] === $email && $result['password'] === $password) {
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
