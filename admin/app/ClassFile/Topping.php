<?php

class Topping extends MysqlDB
{
    public function getAllToppings()
    {
        return $this->get('toppings');
    }

    public function create($request, $files)
    {
        if (isset($request['create'])) {
            $name = $request['name'];
            $price = $request['price'];

            $error = validateTopping($name, $price);
            $errorImg = validateFile($files['image'], 5242880);

            if (empty($error) || empty($errorImg)) {
                $topping = $this->getOne('toppings', 'name', $name);
                if (!$topping) {
                    $file = uploadFile($files['image'], TOPPING_UPLOAD);
                    $data = [
                        'name' => $name,
                        'image' => $file,
                        'price' => $price,
                    ];
                    $this->insert('toppings', $data);
                    echo '<script>alert("Thêm mới thành công.")</script>';
                    echo '<script>window.location.href= "index.php"</script>';
                } else {
                    echo '<script>alert("Đã có loại topping này.")</script>';
                }
            } else {
                return array_merge($error, $errorImg);
            }
        }
    }

    public function edit($request, $files)
    {
        if (isset($request['update'])) {
            $id = $_GET['id'];
            $name = $request['name'];
            $price = $request['price'];

            $error = validateTopping($name, $price);  
            $errorImg = validateFile($files['image'], 5242880);

            if (empty($error) && empty($errorImg)) {
                $file = uploadFile($files['image'], TOPPING_UPLOAD);
                    $data = [
                        'name' => $name,
                        'image' => $file,
                        'price' => $price,
                    ];

                $this->getOne('toppings', 'id', $id);
                $this->update('toppings', $data, 'id', $id);
                echo '<script>alert("Cập nhập thành công.")</script>';
                echo '<script>window.location.href= "index.php"</script>';
            } else {
                return array_merge($error, $errorImg);
            }
        }
    }
}
