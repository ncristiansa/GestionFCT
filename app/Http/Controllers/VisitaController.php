<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Empresa;
use Illuminate\Routing\Route;
use Response;
use App\Acuerdo;
use App\Visita;

class VisitaController extends Controller
{
	public function index()
	{
		$idacuerdos = DB::table('acuerdo')->select('id')->get();
		return view('visitas.visita', ['idacuerdos'=>$idacuerdos]);
	}
    public function store(Request $request)
    {
    	if($request->ajax())
        {
            
            $visita = new Visita;
            $visita->Fecha = $request->input('fecha');
            $visita->Comentario = $request->input('comentario');
            $visita->Realizado = $request->input('realizado');
            $visita->Tipo = $request->get('selecttipo');
            $visita->acuerdo_id = $request->get('acuerdoid');
            $visita->save();
            return response()->json($visita);
        }
    }
    public function edit()
    {

    }
}
