<?php

namespace App\Controllers;

use Core\View;
use Core\Controller;
use App\Models\Post;

class Posts extends Controller {

    function __construct()
    {

    }

    public function indexAction()
        {
           $post = new Post();

            echo '<pre>', print_r($post->get(), true), '</pre>';exit;
//           View::renderTemplate('Home/index.html',[
//               "name" => 'Deve',
//               "posts" => $posts
//           ]);
        }

        public function editAction()
        {
            echo '<p> parameters: <pre>'.
                htmlspecialchars(print_r($this->route_params, true)). '</pre></p>';
        }
    }