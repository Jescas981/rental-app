<?php

namespace Controllers;

use Core\Controller;
use Core\Request;

class AuthController extends Controller
{
    public function index()
    {
        return $this->render('index');
    }

    public function authenticate(Request $req)
    {
    }
};
