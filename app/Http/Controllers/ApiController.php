<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller 
{
    protected function requestedToAdminRoute(Request $request)
    {
        return $request->segment(2);
    }
}