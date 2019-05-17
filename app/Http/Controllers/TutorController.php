<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Alumno;
use App\Acuerdo;
use App\Tutor;
use Response;
use DB;
class TutorController extends Controller
{
    public function index(Request $request)
    {
        $request->user()->authorizeRoles("Administrador");
        $tutor = DB::table('tutor')->select('id','Nombre', 'Email')->get();
        return view('tutor.tutor')->with('tutor', $tutor);
    }
    public function edit(Request $request, $id)
    {
        $perfiltutor = Tutor::where('id', $id)->get(["id",'Nombre', "Email", "Telefono"]);
        if($request->ajax())
        {
            Tutor::findOrFail($id)
            ->update([
                'Nombre' => $request->input('Nombre'),
                'Email' => $request->input('Email'),
                'Telefono' => $request->input('Telefono'),
            ]);
            return response()->json(array('perfiltutor' => $perfiltutor));
        }
        return view('tutor.perfil')->with('perfiltutor', $perfiltutor);
        
    }
    public function destroy(Request $request, $id)
    {
        if($request->ajax())
        {
            $tutor = Tutor::findOrFail($id);
            if(!is_null($tutor))
            {
                $tutor->delete();
                return response()->json(['response' => true, 'id'=>$tutor->id]);
            }
            return response()->json(['response' => false]);
        }
    }
}
