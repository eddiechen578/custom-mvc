<?php

namespace App\Controllers;

use Core\View;
class Home
{
    public function indexAction()
    {
        View::renderTemplate('home/index.html');
    }
}