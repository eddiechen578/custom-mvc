<?php

namespace App\Models;

use Core\Model;

class Post extends Model
{
    protected $database = 'posts';

    function __construct()
    {
        parent::__construct_child();
    }

    public function get(){
        $this->select('content')
             ->max('text', 't')
             ->leftOuterJoin('table', 'id1', '=', 'id2');
        return $this->getselect();
    }
//    public static function getAll()
//    {
//
//       try{
//            $db = static::getDB();
//           $stmt = $db->query('SELECT id, title, content FROM posts');
//           $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
//            return $result;
//        }catch (PDOException $e) {
//       echo $e->getMessage();
//      }
//    }
}