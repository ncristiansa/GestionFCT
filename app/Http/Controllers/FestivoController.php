<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Festivo;
use DB;

class FestivoController extends Controller
{
    public function index()
    {
    	$festivo = Festivo::get(['Fecha', 'Descripcion', 'Tipo']);
    	return view('festivo.calcula')->with('festivo', $festivo);
    }
}
