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
        $query = mysqli_query($this->conn, $sql);
        $results = mysqli_fetch_all($query, MYSQLI_ASSOC);

        return $results;
    }

    public function getOne($table, $key, $value)
    {
        $sql = "SELECT * FROM $table WHERE $key = $value";
        $query = mysqli_query($this->conn, $sql);
        $results = mysqli_fetch_assoc($query);

        return $results;
    }

    public function insert($table, $data)
    {
        $sql = "INSERT INTO $table ";
        $sql .= '(' . implode(',', array_keys($data)) . ')';
        $sql .= " VALUES ";
        $sql .= "('" . implode("','", array_values($data)) . "')";

        mysqli_query($this->conn, $sql);
    }

    public function update($table, $data = [], $id, $value)
    {
        $sql = "";
        foreach ($data as $key => $val) {
            $sql .= "$key = '$val',";
        }
        
        $sql = 'UPDATE ' . $table . ' SET ' . trim($sql, ',') . ' WHERE ' . $id . '=' . $value;

        mysqli_query($this->conn, $sql);
    }

    public function delete($table, $value)
    {
        $sql = "DELETE FROM $table WHERE id = $value";
        mysqli_query($this->conn, $sql);
    }

    public function error($message)
    {
        echo '<script>alert(" ' . $message . ' ")</script>';
    }
}
