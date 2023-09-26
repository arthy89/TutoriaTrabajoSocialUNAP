<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function tutores()
    {
        return view('Admin.tutores');
    }

    public function estudiantes()
    {
        return view('Admin.estudiantes');
    }
}
