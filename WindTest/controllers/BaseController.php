<?php

function _d($str)
{
    echo '<pre>';
    print_r($str);
    echo '<pre>';
    die();
}

class BaseController 
{
    function redirect($controller, $action = '') 
    {
        $url = "?c=$controller";
        if($action){
            $url .= "&a=$action";
        }

        header("Location: $url");
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