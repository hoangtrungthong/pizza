<?php
abstract class Database
{
    abstract function get($table);
    abstract function insert($column, $data);
    abstract function update($column, $data);
    abstract function delete($column, $id);
}
