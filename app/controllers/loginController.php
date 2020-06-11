<?php

class loginController extends Controller
{
    function index()
    {
        $data = ['tittle' => 'Login', 'bg' => 'dark'];
        View::render('login', $data);
    }

    function login()
    {
        $mensaje = '';
        if ($_REQUEST['csrf_token'] != $_SESSION['csrf_token']['token']) {
            die('Acceso no permitido');
        }
        if (isset($_POST['email']) && isset($_POST['pass'])) {
            $user = User::get_by_email($_POST['email']);
            if ($user && $user->pass == $_POST['pass']) {
                UserSession::set_current_user($user->id, $user->name);
                go_to('admin');
            } else $mensaje = 'Identificacion incorrecta';
        } else $mensaje = 'Falta completar datos';
        Alert::set_msg($mensaje, 'danger');
        go_to('login');
    }

    function logout()
    {
        session_unset();
        session_destroy();
        session_write_close();
        setcookie(session_name(),'',0,'/');
        go_to('login');
    }
}
