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

      
        $alumno = DB::table('alumno')->select('id','Nombre', 'DNI')->get();
        return view('alumno.alumno')->with('alumno', $alumno);
    }
    public function edit(Request $request, $id)
    {

        $perfilalumno = Alumno::where('id', $id)->get(["id",'Nombre', "DNI", "NASS", "Email", "Telefono"]);
        $acuerdoalumno = Acuerdo::where('alumno_id', $id)->get(['id', 'Fecha_alta', 'Acabada', 'Fin']);
        if($request->ajax())
        {
            Alumno::findOrFail($id)
            ->update([
                'Nombre' => $request->input('Nombre'),
                'DNI' => $request->input('DNI'),
                'Num_CAP' => $request->input('NASS'),
                'Email' => $request->input('Email'),
                'Telefono' => $request->input('Telefono'),
            ]);
            return response()->json(array('perfilalumno' => $perfilalumno));
        }
        //return view('alumno.perfil')->with('perfilalumno', $perfilalumno);
        return view('alumno.perfil', ['perfilalumno'=>$perfilalumno, 'acuerdoalumno'=>$acuerdoalumno]);
    }
    public function store(Request $request)
    {

        if($request->ajax())
        {
            $alumno = new Alumno;
            $alumno->Nombre = $request->input('nombre');
            $alumno->DNI = $request->input('dni');
            $alumno->NASS = $request->input('nass');
            $alumno->Email = $request->input('email');
            $alumno->Telefono = $request->input('telefono');
            $alumno->save();
            return response()->json($alumno);
        }
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
