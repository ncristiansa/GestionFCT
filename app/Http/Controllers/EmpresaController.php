<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Empresa;
class EmpresaController extends Controller
{
    public function index(Request $request)
    {
        $request->user()->authorizeRoles("Administrador");
        $empresa = DB::table('empresa')->select('id','Empresa', 'NIF', 'Topologia', 'Perfil', 'Idiomas', 'Horario', 'Seguimiento')->get();
        return view("empresa.empresa")->with('empresa', $empresa);
    }
    public function show($empresa)
    {
        //$request->user()->authorizeRoles("Administrador");

        $perfilempresa = DB::table('empresa')->where('Empresa', $empresa)->get();
        return view("empresa.perfil")->with('perfilempresa', $perfilempresa);
    }
}
