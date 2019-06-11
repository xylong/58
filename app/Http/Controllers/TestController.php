<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function apple()
    {
        return 'api';
    }

    public function banana()
    {
        return 'admin';
    }
}
