<?php

class Product
{
    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getAllProduct()
    {
        $sql = "SELECT *, products.id as pID, product_attribute.id as paID 
            FROM products 
            INNER JOIN product_attribute 
            ON products.id = product_attribute.product_id 
            ORDER BY products.id DESC";

        $result = mysqli_query($this->conn, $sql);
        $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $products;
    }

    public function create($request, $files)
    {
        if (isset($request['create'])) {
            $nameProduct = $request['name_product'];
            $descriptions = $request['descriptions'];
            $size = $request['size'];
            $price = $request['price'];

            $error = validateField($nameProduct, $descriptions, $size, $price);
            $errorImg = validateFile($files['image'], 5242880, $method = null);

            if (empty($error) || empty($errorImg)) {
                $productExists = "SELECT * FROM products WHERE name='$nameProduct' LIMIT 1";
                $result = mysqli_query($this->conn, $productExists);
                $product = mysqli_fetch_assoc($result);

                if (!$product) {
                    $file = uploadFile($files['image'], PRODUCT_UPLOAD);

                    $sqlProduct = "INSERT INTO products (name, image, description)
                    VALUES ('$nameProduct', '$file', '$descriptions')";

                    mysqli_query($this->conn, $sqlProduct);
                    $last_id = mysqli_insert_id($this->conn);

                    $sqlProAttribute = "INSERT INTO product_attribute (product_id,size, price)
                            VALUES ('$last_id','$size', '$price')";

                    $products = mysqli_query($this->conn, $sqlProAttribute);
                    if ($products) {
                        echo '<script>alert("Thêm mới thành công.")</script>';
                        echo'<script>window.location.href= "index.php"</script>';
                    }
                } else {
                    $this->showError();
                }
            } else {
                return array_merge($error, $errorImg);
            }
        }
    }

    public function getDetailProduct($id)
    {
        $sql = "SELECT *, products.id as pID, product_attribute.id as paID 
            FROM products 
            INNER JOIN product_attribute 
            ON products.id = product_attribute.product_id 
            WHERE products.id='$id'";

        $result = mysqli_query($this->conn, $sql);
        $product = mysqli_fetch_assoc($result);

        return $product;
    }

    public function update($request, $files, $method)
    {
        if (isset($request['update'])) {
            $id = $_GET['id'];
            $nameProduct = $_POST['nameProducts'];
            $descriptions = $_POST['descriptions'];
            $size = $_POST['size'];
            $price = $_POST['price'];

            $error = validateField($nameProduct, $descriptions, $size, $price);
            $errorImg = validateFile($files['image'], 5242880, $method);

            if (empty($error) || empty($errorImg)) {
                $product = $this->getDetailProduct($id);
                if (!empty($files['image']['name'])) {
                    if(file_exists($product["image"])) {
                        if (unlink($product["image"])) {
                            $file = uploadFile($files['image'], PRODUCT_UPLOAD);
                        }
                    }
                } else {
                    $file = $product["image"];
                }
                $sql = "UPDATE 
                    products as p, 
                    product_attribute as pa 
                SET 
                    p.name='$nameProduct', 
                    p.image = '$file', 
                    p.description='$descriptions', 
                    pa.size='$size', 
                    pa.price='$price' 
                WHERE p.id = '$id' 
                AND pa.product_id = '$id'
                AND p.id = pa.product_id";

                $result = mysqli_query($this->conn, $sql);
                if ($result) {
                    echo '<script>alert("Cập nhật thành công.")</script>';
                    echo'<script>window.location.href= "index.php"</script>';
                }
            } else {
                return $errorImg;
            }
        }
    }

    public function delete($id)
    {
        if (isset($id) && $id) {
            $sql ="ALTER TABLE product_attribute 
                    DROP FOREIGN KEY product_attribute_product_id";
            $sql ="ALTER TABLE order_details 
                    DROP FOREIGN KEY order_details_product_id";

            $result = mysqli_query($this->conn, $sql);
            if ($result) {
                $sql = "DELETE products, product_attribute
                        FROM products
                        INNER JOIN product_attribute
                        ON products.id = product_attribute.product_id
                        WHERE products.id = '$id'";
                $delete = mysqli_query($this->conn, $sql);
                if ($delete) {
                    $sql = "ALTER TABLE product_attribute
                            ADD CONSTRAINT product_attribute_product_id 
                            FOREIGN KEY (product_id) 
                            REFERENCES products (id)
                            ON UPDATE CASCADE ";
                    $sql = "ALTER TABLE order_details
                            ADD CONSTRAINT order_details_product_id 
                            FOREIGN KEY (product_id) 
                            REFERENCES products (id)
                            ON UPDATE CASCADE";
                    mysqli_query($this->conn, $sql);

                    echo '<script>alert("Đã xóa sản phẩm.")</script>';
                    echo '<script>window.location.href="index.php"</script>';
                }   
            } else {
                echo '<script>alert("Lỗi rồi! Không tìm thấy sản phẩm.")</script>';
            }
        }
    }

    public function showError()
    {
        echo '<script>alert("Sản phẩm đã có trên hệ thống.")</script>';
    }
}
