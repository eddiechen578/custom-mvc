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
            $data = [
                  'title' => 'update *1',
                  'content' => 'again again'
            ];

            $this->post->updateData(2, $data);

            $datas = $this->post->fetchAllData();

            View::renderTemplate('Home/index.html',[
                   "name" => 'Deve',
                   "posts" => $datas
            ]);
        }

    }