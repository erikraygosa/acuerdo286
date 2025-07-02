<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;

class InicioController extends Controller
{
    public function index()
    {
        return view('inicio'); // esta debe ser tu vista principal pública
    }

    public function buscar(Request $request)
    {
        $curp = $request->input('curp');
        $registro = Registro::where('curp', $curp)->first();

        if ($registro) {
            return view('inicio', compact('registro'));
        } else {
            return redirect()->back()->with('error', '❌ CURP no encontrada en el sistema.');
        }
    }
}
