<?php

class adminController
{
    public function index()
    {
        if (!isset($_SESSION['user'])) go_to('login');
        $data = ['title' => 'Admin'];
        View::render('admin', $data);
    }

    public function new_notice()
    {
        if (!isset($_SESSION['user'])) go_to('login');
        $data = ['title' => 'Nueva Noticia'];
        View::render('newNotice', $data);
    }
}