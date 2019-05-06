<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
class EmpresaController extends Controller
{
    public function index(Request $request)
    {
        $request->user()->authorizeRoles("Administrador");
        $empresa = Empresa::get();
        return view("empresa.empresa")->with('empresa', $empresa);
    }
}
