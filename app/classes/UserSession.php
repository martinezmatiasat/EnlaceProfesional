<?php

class UserSession
{
    public static function set_current_user($user_id, $user_name)
    {
        if (is_null($user_id)) return;
        $_SESSION['user']['id'] = $user_id;
        $_SESSION['user']['name'] = $user_name;
        return;
    }

    public static function unset()
    {
        if (isset($_SESSION['user'])) unset($_SESSION['user']);
        if (isset($_SESSION['csrf_token'])) unset( $_SESSION['csrf_token']);
        return;
    }
}
