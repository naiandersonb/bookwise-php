<?php

class DB
{
    public function books()
    {
        $db = new PDO('sqlite:database.sqlite');
        $query = $db->query("select * from books");
        return $query->fetchAll();
    }
}