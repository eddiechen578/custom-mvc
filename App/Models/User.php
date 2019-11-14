<?php

namespace App\Models;

use App\DB;
use Core\Model;

class User extends Model
{
    public function __construct()
    {
        parent::__construct(DB::DB_NAME, DB::DB_USER, DB::DB_PASSWORD, DB::DB_HOST);

        $this->from = 'users';
    }

    public function ableLogin($user, $password)
    {
        $is_verify = true;

        $_password = $user->password;

        if(!password_verify($password, $_password)){
            $is_verify = false;
        }

        return $is_verify;
    }

    public function find($email)
    {
        $user = $this->where('email', '=', $email)
                     ->get();
        return $user;
    }

    public function verify($email)
    {
        $isExit = true;

        $user = $this->where('email', '=', $email)
                     ->getAll();

        if(empty($user)){
            $isExit = false;
        }
        return $isExit;
    }
}