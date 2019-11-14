<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\User;

class Posts extends Controller {
        protected $user;

        public function __construct(User $user)
        {
            $this->user = $user;
        }
        public function indexAction()
        {
            echo 'success';
        }

    }