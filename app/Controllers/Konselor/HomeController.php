<?php

namespace App\Controllers\Konselor;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        return view('/pages/konselor/home');
    }
}
