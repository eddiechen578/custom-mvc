<?php

namespace App\Controllers;

use App\Controllers\Admin\Users;
use Core\View;
use Core\Controller;
use App\Models\Post;

class Posts extends Controller {
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }
    public function indexAction()
        {
            $data = $this->post->get();
            echo '<pre>', print_r($data, true), '</pre>';exit;
//           View::renderTemplate('Home/index.html
//          ',[
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