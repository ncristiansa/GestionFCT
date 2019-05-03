<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index(Request $request)
    {
        $request->user()->authorizeRoles("tutor");
        return view("alumno.alumno");
    }
}
