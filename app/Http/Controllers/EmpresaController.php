<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Empresa;
use Illuminate\Routing\Route;
class EmpresaController extends Controller
{
    /*
    public function __construct()
    {
        $this->beforeFilter('@find', ['only' => ['index', 'show', 'delete']]);
    }
    public function find(Route $route)
    {
        $this->empresa = Empresa::find($route->getParameter('empresa'));
    }
    */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles("Administrador");
        $empresa = DB::table('empresa')->select('id','Empresa', 'NIF', 'Topologia', 'Perfil', 'Idiomas', 'Horario', 'Seguimiento')->get();
        return view("empresa.empresa")->with('empresa', $empresa);
    }
    public function edit(Request $request, $id)
    {
        $empresa = Empresa::find($id);
        if($request->ajax())
        {
            $empresa = Empresa::findOrFail($id);
            if(!is_null($empresa))
            {
                $empresa->update([
                    'Empresa' => $request->input('empresa'),
                    'NIF' => $request->input('nif'),
                    'Topologia' => $request->input('topologia'),
                    'Perfil' => $request->input('perfil'),
                    'Horario' => $request->input('horario'),
                    'Seguimiento' => $request->input('seguimiento'),
                ]);
            }
        }

    }
    public function show($empresa)
    {
        //$request->user()->authorizeRoles("Administrador");

        $perfilempresa = DB::table('empresa')->where('Empresa', $empresa)->get();
        return view("empresa.perfil")->with('perfilempresa', $perfilempresa);
    }
    public function destroy(Request $request, $id)
    {
        if($request->ajax())
        {
            $empresa = Empresa::findOrFail($id);
            if(!is_null($empresa))
            {
                $empresa->delete();
                return response()->json(['response' => true, 'id'=>$empresa->id]);
            }
            return response()->json(['response' => false]);
        }
    }

}
