<?php

class Model
{
    public static function exists($table, $params = [])
    {
        $sql = "SELECT * FROM $table";
        if ($params != []) {
            $sql .= ' WHERE ';
            $n = 0;
            foreach ($params as $key => $value) {
                $sql .= $n == 0 ? "$key = :$key" : " AND $key = :$key";
                $n++;
            }
        }
        $sql .= ' LIMIT 1';
        try {
            if (Db::query($sql, $params)) return true;
            return false;
        } catch (Exception $e) {
            return false;
        }
    }

    public static function get($class, $table, $params = [])
    {
        $sql = "SELECT * FROM $table";
        if ($params != []) {
            $sql .= ' WHERE ';
            $n = 0;
            foreach ($params as $key => $value) {
                $sql .= $n == 0 ? "$key = :$key" : " AND $key = :$key";
                $n++;
            }
        }
        $sql .= ' LIMIT 1';
        try {
            $result = Db::query($sql, $params);
            return new $class($result[0]);
        } catch (Exception $e) {
            return false;
        }
    }

    public static function get_list($class, $table, $params = [])
    {
        $sql = "SELECT * FROM $table";
        if ($params != []) {
            $sql .= ' WHERE ';
            $n = 0;
            foreach ($params as $key => $value) {
                $sql .= $n == 0 ? "$key = :$key" : " AND $key = :$key";
                $n++;
            }
        }
        try {
            $result = Db::query($sql, $params);
            foreach ($result as $res) {
                $list[] = new $class($res);
            }
            return $list;
        } catch (Exception $e) {
            return false;
        }
    }

    public static function insert_array($table, $data)
    {
        $fields = get_fields($table);
        if (!validate_array($fields, $data)) return false;
        unset($data[$fields[0]]);
        $sql = "INSERT INTO $table ";
        $n = 0;
        foreach ($data as $key => $value) {
            $sql .= $n == 0 ? "($key" : ", $key";
            $n++;
        }
        $n = 0;
        foreach ($data as $key => $value) {
            $sql .= $n == 0 ? ") VALUES (:$key" : ", :$key";
            $n++;
        }
        $sql .= ')';
        try {
            $result = Db::query($sql, $data);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public static function insert_object($table, $object)
    {
        foreach ($object as $key => $value) {
            $data[$key] = $value;
        }
        $result = self::insert_array($table, $data);
        return $result;
    }

    public static function update_array($table, $data, $conditions = null)
    {
        $fields = get_fields($table);
        if (!validate_array($fields, $data)) return false;
        unset($data[$fields[0]]);
        $sql = "UPDATE $table SET ";
        $n = 0;
        foreach ($data as $key => $value) {
            $sql .= $n == 0 ? "$key = :$key" : ", $key = :$key";
            $n++;
        }
        if (isset($conditions) && $conditions != '') {
            $sql .= " WHERE ";
            $sql .= implode(' AND ', $conditions);
        }
        try {
            $result = Db::query($sql, $data);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public static function update_object($table, $object, $conditions = null)
    {
        foreach ($object as $key => $value) {
            $data[$key] = $value;
        }
        $result = self::update_array($table, $data, $conditions);
        return $result;
    }

    public static function delete($table, $conditions)
    {
        $sql = "DELETE FROM $table";
        if (isset($conditions) && $conditions != '') {
            $sql .= " WHERE ";
            $sql .= implode(' AND ', $conditions);
        }
        try {
            $result = Db::query($sql);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
