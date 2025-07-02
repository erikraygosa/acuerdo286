<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;

class RegistroController extends Controller
{
    public function index()
    {
          $registros = Registro::all(); // o paginate(n) si quieres paginación
    return view('registros.index', compact('registros'));
    }

    public function buscar(Request $request)
    {
        // Validación del formato de la CURP
        $request->validate([
            'curp' => 'required|alpha_num|size:18',
        ]);

        // CURP en mayúsculas por consistencia
        $curp = strtoupper($request->input('curp'));

        // Búsqueda del registro
        $registro = Registro::where('curp', $curp)->first();

        if ($registro) {
            return view('inicio', compact('registro'));
        } else {
            return redirect()->back()->with('error', '❌ CURP no encontrada en el sistema.');
        }

        
    }
     public function create()
    {
        return view('registros.create');
    }

   public function store(Request $request)
{
    $data = $request->validate([
        'nombres' => 'required|string|max:100',
        'apellidos' => 'required|string|max:100',
        'curp' => 'required|string|max:18|unique:registros',
        'folio' => 'required|string|max:255',
        'escuela' => 'nullable|string|max:255',
        'cct' => 'nullable|string|max:50',
        'calificacion' => 'nullable|numeric',
        'clave' => 'nullable|string|max:255',
        'secretaria' => 'nullable|string|max:255',
        'fecha' => 'nullable|date',
        'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    if ($request->hasFile('imagen')) {
        $rutaImagen = $request->file('imagen')->store('imagenes', 'public');
        $data['imagen'] = $rutaImagen;
    }

    Registro::create($data);

    return redirect()->route('registros.create')->with('success', '✅ Registro creado correctamente.');
}


    public function edit(Registro $registro)
    {
        return view('registros.edit', compact('registro'));
    }

    public function update(Request $request, Registro $registro)
    {
        $data = $request->validate([
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'curp' => 'required|string|max:18|unique:registros,curp,' . $registro->id,
            'folio' => 'required|string|max:255',
            'escuela' => 'nullable|string|max:255',
            'cct' => 'nullable|string|max:50',
            'calificacion' => 'nullable|numeric',
            'clave' => 'nullable|string|max:255',
            'secretaria' => 'nullable|string|max:255',
            'fecha' => 'nullable|date',
            'imagen' => 'nullable|url'
        ]);

        $registro->update($data);

        return redirect()->route('registros.edit', $registro)->with('success', '✅ Registro actualizado.');
    }

    public function destroy(Registro $registro)
    {
        $registro->delete();
        return redirect()->route('dashboard')->with('success', '🗑️ Registro eliminado.');
    }
}
