<?php

function to_object($array)
{
    return json_decode(json_encode($array));
}

function get_sitename()
{
    return 'Estudio';
}

function get_fields($table)
{
    try {
        $fields = [];
        $conn = Db::connect();
        $query = $conn->prepare("DESCRIBE $table");
        $query->execute();
        $result = $query->rowCount() > 0 ? $query->fetchAll(PDO::FETCH_ASSOC) : false;
        foreach ($result as $res) {
            $fields[] = $res['Field'];
        }
        return $fields;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

function validate_array($fields, $data)
{
    if (!isset($fields) || $fields == [] || $data == []) return false;
    foreach ($data as $key => $value) {
        $validated = false;
        foreach ($fields as $field_name) {
            if ($field_name == $key) $validated = true;
        }
        if (!$validated) return false;
    }
    return true;
}

function get_var_name($v)
{
    $trace = debug_backtrace();
    $v_line = file(__FILE__);
    $f_line = $v_line[$trace[0]['line'] - 1];
    preg_match("#\\$(\w+)#", $f_line, $match);
    return $match[1];
}

function go_to($location)
{
    if (headers_sent()) {
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.URL.$location.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.URL.$location.'" />';
        echo '</noscript>';
        exit();
    }
    if (strpos($location, 'http') !== false) { // Para cuando se pasa la url de una web externa
        header('Location: '.$location);
        exit();
    }
    header('Location: '.URL.$location); // Pasar nombre del controlador y del metodo
    exit();
}
