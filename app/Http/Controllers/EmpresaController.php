<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index(Request $request)
    {
        $request->user()->authorizeRoles("Administrador");
        return view("empresa.empresa");
    }
}
