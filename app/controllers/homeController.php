<?php

class homeController
{
    public function index()
    {
        if (!isset($_SESSION['user'])) go_to('login');
        $data = ['title' => 'Home', 'bg' => 'dark'];
        View::render('home', $data);
    }
}
