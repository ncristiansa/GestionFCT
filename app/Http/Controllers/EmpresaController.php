<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Empresa;
use Illuminate\Routing\Route;
use Response;
use App\Acuerdo;
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
        
        $empresa = DB::table('empresa')->select('id','Empresa', 'NIF')->get();
        

        return view('empresa.empresa')->with('empresa', $empresa);
    }
    public function edit(Request $request, $id)
    {
        $perfilempresa = Empresa::where('id', $id)->get(["id",'Empresa', "NIF", "Topologia", "Perfil", "Idiomas", 'Horario', "Seguimiento"]);
        $acuerdoempresa = Acuerdo::where('id', $id)->get(['id', 'Fecha_alta', 'Acabada', 'Fin']);

        if($request->ajax())
        {
            Empresa::findOrFail($id)
            ->update([
                'Empresa' => $request->input('Empresa'),
                'NIF' => $request->input('NIF'),
                'Topologia' => $request->input('Topologia'),
                'Perfil' => $request->input('Perfil'),
                'Idiomas' => $request->input('Idiomas'),
                'Horario' => $request->input('Horario'),
                'Seguimiento' => $request->input('Seguimiento'),
            ]);
            return response()->json(array('perfilempresa' => $perfilempresa));
        }
        //return view('empresa.perfil')->with('perfilempresa', $perfilempresa);
        return view('empresa.perfil', ['perfilempresa'=>$perfilempresa, 'acuerdoempresa'=>$acuerdoempresa]);
    }
    public function update($id)
    {
        //
    }
    public function show($id)
    {
        //$request->user()->authorizeRoles("Administrador");

        //
    }
    public function store(Request $request)
    {
        if($request->ajax())
        {
            $empresa = new Empresa;
            $empresa->Empresa = $request->input('empresa');
            $empresa->NIF = $request->input('nif');
            $empresa->Topologia = $request->input('topologia');
            $empresa->Perfil = $request->input('perfil');
            $empresa->Idiomas = $request->input('idiomas');
            $empresa->Horario = $request->input('horario');
            $empresa->Seguimiento = $request->input('seguimiento');
            $empresa->save();
            return response()->json($empresa);
        }
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
