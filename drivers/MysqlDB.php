<?php
// require "admin/app/Abstract/database.php";
class MysqlDB 
{
    public $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function get($table)
    {
        $sql = "SELECT * FROM $table ORDER BY id DESC";
        $query = mysqli_query($this->conn,$sql);
        $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
        
        return $results;
    }
    
    public function insert($table, $data)
    {
        $sql = "INSERT INTO $table ";
        $sql .= '('. implode(',',array_keys($data)).')';
        $sql .= " VALUES ";
        $sql .= "('". implode("','",array_values($data))."')";

        $query = mysqli_query($this->conn, $sql); 
        // var_dump($query);die();
    }

    public function update($table, $data, $where)
    {
        $sql = " ";
        foreach ($data as $key => $value) {
            $sql .= "$key = '$value',";
        }
        $dot = implode(array_keys($where));
        $dot .= "= '".implode(array_values($where))."'";
        $sql ='UPDATE '.$table. ' SET '.trim($sql, ',') . ' WHERE '.$dot;
        
        $query = mysqli_query($this->conn, $sql);
    }

    public function delete($table, $where)
    {
        $sql = "DELETE FROM $table WHERE id = '$where'";
        $query = mysqli_query($this->conn, $sql);
    }
    
    public function error($message) 
    {
        echo '<script>alert(" ' .$message. ' ")</script>';    
    } 
}
