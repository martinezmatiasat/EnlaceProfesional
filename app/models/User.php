<?php
class User extends Model
{
    public $id = null;
    public $name = null;
    public $email = null;
    public $pass = null;

    function __construct($data = [])
    {
        if (isset($data['id'])) $this->id = $data['id'];
        if (isset($data['name'])) $this->name = $data['name'];
        if (isset($data['email'])) $this->email = $data['email'];
        if (isset($data['pass'])) $this->pass = $data['pass'];
    }

    public static function get_by_email($email)
    {
        $params = [
            'email' => $email
        ];
        $result = parent::get('User', 'user', $params);
        return $result;
    }
}
