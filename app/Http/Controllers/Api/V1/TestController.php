<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function apple()
    {
        return 'apple';
    }

    public function banana()
    {
        return 'banana';
    }
}
