<?php

namespace App\Controllers\Site;

use Framework\Controller;
use Framework\Response;

class HomeController extends Controller
{
    public function __construct()
    {
    }

    public function show(): Response
    {
        return $this->view("home.php");
    }
}