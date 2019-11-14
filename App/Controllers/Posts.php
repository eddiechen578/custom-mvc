<?php

namespace App\Controllers;

use Core\View;
use Core\Controller;

class Posts extends Controller {
        protected $user;

        public function __construct()
        {

        }
        public function indexAction()
        {
            View::renderTemplate("Post/index.html");
        }

    }