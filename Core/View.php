<?php


namespace Core;

use Symfony\Component\Asset\Package;
use Symfony\Component\Asset\VersionStrategy\EmptyVersionStrategy;

class View
{
    public static function render($view, $args = [])
    {
        extract($args, EXTR_SKIP);

        $file = "../resource/Views/$view";

        if(is_readable($file)){
            require $file;
        }else{
            echo "$file not found";
        }
    }

    public static function renderTemplate($template, $args = [])
    {

        static $twig = null;
        if($twig === null) {
            $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__) . '/resource/Views');
            $twig = new \Twig\Environment($loader);
            $twig->addGlobal('session', $_SESSION);
        }
        echo $twig->render($template, $args);
    }
}