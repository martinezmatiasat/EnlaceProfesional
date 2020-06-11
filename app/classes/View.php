<?php
class View
{
    public static function render($view, $data = [])
    {
        $d = to_object($data);
        if (!is_file(VIEWS . $view . 'View.php')) {
            die(sprintf('No se encuentra la vista "%sView".', $view));
        }
        require_once VIEWS . $view . 'View.php';
        exit();
    }
}
