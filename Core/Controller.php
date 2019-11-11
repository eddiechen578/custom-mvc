<?php

namespace Core;

abstract class Controller
{
      protected  $route_params = [];

      public function __construct($route_params)
      {
          $this->route_params = $route_params;
      }

      public function __call($name, $args)
      {

          $method = $name.'Action';
          if(method_exists($this, $method)){
                  call_user_func_array([$this, $method], $args);
          }else{
              echo "method $method not found in controller". get_class($this);
          }
      }

      protected function before()
      {
            echo "(before)<br>";
      }

      protected function after()
      {
            echo "(after)";
      }
}