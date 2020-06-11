<?php
class Db
{
    private $conn;
    private $engine;
    private $host;
    private $name;
    private $user;
    private $pass;
    private $charset;

    private function __construct()
    {
        $this->engine = IS_LOCAL ? LDB_ENGINE : DB_ENGINE;
        $this->host = IS_LOCAL ? LDB_HOST : DB_HOST;
        $this->name = IS_LOCAL ? LDB_NAME : DB_NAME;
        $this->user = IS_LOCAL ? LDB_USER : DB_USER;
        $this->pass = IS_LOCAL ? LDB_PASS : DB_PASS;
        $this->charset = IS_LOCAL ? LDB_CHARSET : DB_CHARSET;
    }

    public static function connect()
    {
        $db = new self();
        try {
            $db->connection = new PDO($db->engine . ':host=' . $db->host . ';dbname=' . $db->name . ';charset=' . $db->charset, $db->user, $db->pass);
            return $db->connection;
        } catch (PDOException $e) {
            die('Error al conectar con base de datos: ' . $e->getMessage());
        }
    }

    public static function query($sql, $params = [])
    {
        $conn = self::connect();
        $conn->beginTransaction(); // por cualquier error, se establece un checkpoint al lugar inicial descartando los cambios
        $query = $conn->prepare($sql);
        if (!$query->execute($params)) {
            $conn->rollBack();
            $error = $query->errorInfo();
            throw new Exception($error[2]);
        }
        if (strpos($sql, 'SELECT') !== false) {
            return $query->rowCount() > 0 ? $query->fetchAll(PDO::FETCH_ASSOC) : false;
        } elseif (strpos($sql, 'INSERT') !== false) {
            $id = $conn->lastInsertId();
            $conn->commit();
            return $id;
        } elseif (strpos($sql, 'UPDATE') !== false) {
            $conn->commit();
            return true;
        } elseif (strpos($sql, 'DELETE') !== false) {
            if ($query->rowCount() > 0) {
                $conn->commit();
                return true;
            }
            $conn->rollBack();
            return false;
        } else {
            $conn->commit();
            return true;
        }
    }
}
