<?php

namespace App\Models;

use Core\Model;

class Post extends Model
{
    protected $db;
    function __construct(Model $model)
    {
        $this->db = $model;
        $this->db->from = 'posts';
    }
    public function fetchAllData()
    {
        $data = $this->db->select('title, content')
                     ->orderBy('id', 'desc')
                     ->getAll();
        return $data;
    }
}