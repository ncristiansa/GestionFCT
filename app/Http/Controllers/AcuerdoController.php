<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Alumno;
use App\Acuerdo;
use App\Empresa;
use App\Tutor;
use Response;
use DB;
class AcuerdoController extends Controller
{
    public function store(Request $request)
    {
        if($request->ajax())
        {
            $acuerdo = new Acuerdo;
            $acuerdo->Fecha_alta = $request->input('fecha-alta');
            $acuerdo->Acabada = $request->input('acabada');
            $acuerdo->Fin = $request->input('fin');
            
            $acuerdo->save();
            return response()->json($acuerdo);
        }
    }
    public function destroy(Request $request, $od)
    {
        $idacuerdo = $request->input('id-acuerdo');
        if($request->ajax())
        {
            
            $acuerdo = Acuerdo::findOrFail($idacuerdo);
            if(!is_null($acuerdo))
            {
                $acuerdo->delete();
                return response()->json(['response' => true, 'id'=>$acuerdo->id]);
            }
            return response()->json(['response' => false]);
        }
    }
    public function edit(Request $request, $od)
    {
        $perfilacuerdo = Acuerdo::where('id', $od)->get(['id', 'Fecha_alta', 'Acabada', 'Fin']);
        $perfilempresa = Empresa::where('id', $od)->get(["id",'Empresa', "NIF", "Topologia", "Perfil", "Idiomas", 'Horario', "Seguimiento"]);
        $perfilalumno = Alumno::where('id', $od)->get(["id",'Nom', "DNI", "Num_CAP", "Email", "Telefono"]);
        $perfiltutor = Tutor::where('id', $od)->get(["id",'Nombre', "Email", "Telefono"]);
        if($request->ajax())
        {
            Acuerdo::findOrFail($od)
            ->update([
                'Fecha_alta' => $request->input('Fecha_alta'),
                'Acabada' => $request->input('Acabada'),
                'Fin' => $request->input('Fin'),
            ]);
            return response()->json(array('perfilacuerdo' => $perfilacuerdo));
        }
        //return view('empresa.perfil')->with('perfilempresa', $perfilempresa);
        return view('acuerdo.perfil', ['perfilempresa'=>$perfilempresa, 'perfilacuerdo'=>$perfilacuerdo, 'perfilalumno'=>$perfilalumno, 'perfiltutor'=>$perfiltutor]);
    }
    
}
