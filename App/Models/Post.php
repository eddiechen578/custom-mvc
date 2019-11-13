<?php

namespace App\Models;

use App\DB;
use Core\Model;

class Post extends Model
{
    function __construct()
    {
        parent::__construct(DB::DB_NAME, DB::DB_USER, DB::DB_PASSWORD, DB::DB_HOST);
        $this->from = 'posts';

    }
    public function fetchAllData()
    {
        $data = $this->select('title, content')
                     ->orderBy('id', 'desc')
                     ->getAll();
        return $data;
    }

    public function updateData($id, array $data)
    {
        $this->where('id', $id)
             ->update($data);
    }
}