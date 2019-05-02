<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prueba;
use DB;
use Response;
class PruebaController extends Controller
{
    public function index()
    {
        $empresa = Prueba::get();
        return view('pruebas')->with('empresa', $empresa);
    }
}
