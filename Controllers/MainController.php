<?php

namespace RBGoldenBook\Controllers;

class MainController extends Controller
{
    public function index()
    {
        header('location: /goldenbook/index');
        exit;
    }


    public function error404()
    {
        $_SESSION['error'] = 'Erreur 404. Cette page n\'existe pas !';
        $this->redirection();
    }

}