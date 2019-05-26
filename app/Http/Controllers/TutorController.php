<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Alumno;
use App\Acuerdo;
use App\Tutor;
use App\AcuerdoTutor;
use App\User;
use App\Role;
use Auth;
use Response;
use DB;
class TutorController extends Controller
{
    public function index(Request $request)
    {
        //$request->user()->authorizeRoles("Administrador");
        $tutor = DB::table('tutor')->select('id','Nombre', 'Email')->get();
        return view('tutor.tutor')->with('tutor', $tutor);
    }
    public function edit(Request $request, $id)
    {
        $perfiltutor = Tutor::where('id', $id)->get(["id",'Nombre', 'DNI',"Email", "Telefono"]);
        $acuerdotutor = DB::select('SELECT DISTINCT acu.id, acu.Fecha_alta, acu.Acabada, acu.Fin FROM acuerdo acu, acuerdo_tutor aq WHERE acu.alumno_id = aq.alumno_id AND aq.tutor_id = ?',[$id]);
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
        return view('tutor.perfil', ['perfiltutor'=>$perfiltutor, 'acuerdotutor'=>$acuerdotutor]);
        
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
    public function store(Request $request)
    {
        if($request->ajax())
        {
            $tutor = new Tutor;
            $tutor->Nombre = $request->input('nombre');
            $tutor->DNI = $request->input('dni');
            $tutor->Email = $request->input('email');
            $tutor->Telefono = $request->input('telefono');
            $tutor->save();

            $role_user = Role::where('name', 'Tutor')->first();

            $user = new User();
            $user->name = $request->input('nombre');
            $user->Nombre = 'Tutor';
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('dni'));
            $user->save();
            $user->roles()->attach($role_user);
            return response()->json($tutor);
        }
    }
    public function show()
    {
        $usuario = Auth::user();
        $nombre = $usuario->name;
        $id = Tutor::where('Nombre', $nombre)->get(['id']);
        $infoTutor = Tutor::where('id', $id[0]["id"])->get(["id",'Nombre', 'DNI',"Email", "Telefono"]);
        $acuerdotutor = DB::select('SELECT DISTINCT acu.id, acu.Fecha_alta, acu.Acabada, acu.Fin FROM acuerdo acu, acuerdo_tutor aq WHERE acu.alumno_id = aq.alumno_id AND aq.tutor_id = ?',[$id[0]["id"]]);
        return view('tutor.misacuerdos', ['acuerdotutor'=>$acuerdotutor, 'infoTutor'=>$infoTutor]);
    }
}
