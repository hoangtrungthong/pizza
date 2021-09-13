<?php

class Contact extends MysqlDB
{
    public function getAll()
    {
        return $this->get('contact');
    }

    public function updateStatus()
    {
        if (isset($_GET['id']))
        {
            $data = ['checked' => 1];

            $this->update('contact', $data, 'id', $_GET['id']);
            header("location: index.php");
        }
    }
}
