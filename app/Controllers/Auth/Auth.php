<?php

namespace App\Controllers\Auth;

use Framework\Controller;
use Framework\Response;

class Auth extends Controller
{
    public function showLogin(): Response
    {
        return $this->view("auth/login.php");
    }

    public function showRegister(): Response
    {
        return $this->view("auth/register.php");
    }

    public function showPassword(): Response
    {
        return $this->view("auth/password.php");
    }
}