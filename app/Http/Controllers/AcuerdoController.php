<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Alumno;
use App\Acuerdo;
use App\Empresa;
use Response;
use DB;
class AcuerdoController extends Controller
{
    public function destroy(Request $request, $od)
    {

        if($request->ajax())
        {
            $acuerdo = Acuerdo::findOrFail($od);
            if(!is_null($acuerdo))
            {
                $acuerdo->delete();
                return response()->json(['response' => true, 'id'=>$acuerdo->od]);
            }
            return response()->json(['response' => false]);
        }
    }
    public function edit(Request $request, $od)
    {
        $perfilacuerdo = Acuerdo::where('id', $od)->get(['id', 'Fecha_alta', 'Acabada', 'Fin']);
        $perfilempresa = Empresa::where('id', $od)->get(["id",'Empresa', "NIF", "Topologia", "Perfil", "Idiomas", 'Horario', "Seguimiento"]);
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
        return view('acuerdo.perfil', ['perfilempresa'=>$perfilempresa, 'perfilacuerdo'=>$perfilacuerdo]);
    }
    
}
