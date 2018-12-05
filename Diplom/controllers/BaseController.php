<?php

class BaseController 
{
  function redirect($controller, $action) 
    {
        header("Location: index.php?c=$controller&a=$action");
    }

  public function render($template, $params = [])
    {
        $fileTemplate = 'templates/'.$template.".php";
        if (is_file($fileTemplate)) {
            ob_start();
            if (count($params) > 0) {
                extract($params);
            }
            include $fileTemplate;
            echo ob_get_clean();
        }
    }
}