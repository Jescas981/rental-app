<?php

namespace Controllers;

use Core\Controller;

class AuthController extends Controller
{
    public function index()
    {
        return $this->render('index', ['hello' => 'hello']);
    }
};
