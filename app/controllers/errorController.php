<?php
class errorController extends Controller
{
    function __construct()
    {
    }

    function index()
    {
        $data = ['tittle' => 'Página no encontrada', 'bg' => 'dark'];
        View::render('404', $data);
    }
}
