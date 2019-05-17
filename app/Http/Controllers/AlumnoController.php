<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Alumno;
use App\Acuerdo;
use Response;
use DB;
class AlumnoController extends Controller
{
    public function index(Request $request)
    {
        $request->user()->authorizeRoles("Administrador");
        $alumno = DB::table('alumno')->select('id','Nom', 'DNI')->get();
        return view('alumno.alumno')->with('alumno', $alumno);
    }
    public function edit(Request $request, $id)
    {
        $perfilalumno = Alumno::where('id', $id)->get(["id",'Nom', "DNI", "Num_CAP", "Email", "Telefono"]);
        if($request->ajax())
        {
            Alumno::findOrFail($id)
            ->update([
                'Nom' => $request->input('Nom'),
                'DNI' => $request->input('DNI'),
                'Num_CAP' => $request->input('Num_CAP'),
                'Email' => $request->input('Email'),
                'Telefono' => $request->input('Telefono'),
            ]);
            return response()->json(array('perfilalumno' => $perfilalumno));
        }
        return view('alumno.perfil')->with('perfilalumno', $perfilalumno);
        
    }
    public function destroy(Request $request, $id)
    {
        if($request->ajax())
        {
            $alumno = Alumno::findOrFail($id);
            if(!is_null($alumno))
            {
                $alumno->delete();
                return response()->json(['response' => true, 'id'=>$alumno->id]);
            }
            return response()->json(['response' => false]);
        }
    }
}
