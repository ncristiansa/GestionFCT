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
class PrincipalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	$usuario = Auth::user();
        $nombre = $usuario->name;
        $idtutor = Tutor::where('Nombre', $nombre)->get(['id']);
        return view('home.home', ['idtutor'=>$idtutor]);
    }
}
