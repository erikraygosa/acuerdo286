<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Registro;

class RegistroCrud extends Component
{
    public $registros;
    public $nombre, $curp, $folio, $escuela;
    public $registro_id;
    public $isEdit = false;

    public function mount()
    {
        $this->cargarRegistros();
    }

    public function render()
    {
        return view('livewire.registro-crud', [
            'isEdit' => $this->isEdit
        ]);
    }

    public function cargarRegistros()
    {
        $this->registros = Registro::latest()->get();
    }

    public function store()
    {
        $this->validate([
            'nombre' => 'required|string|max:255',
            'curp' => 'required|string|max:18|unique:registros,curp',
            'folio' => 'required|string|max:50',
            'escuela' => 'required|string|max:255',
        ]);

        Registro::create([
            'nombre' => $this->nombre,
            'curp' => $this->curp,
            'folio' => $this->folio,
            'escuela' => $this->escuela,
        ]);

        $this->resetForm();
        $this->cargarRegistros();
        session()->flash('message', '✅ Registro creado exitosamente.');
    }

    public function edit($id)
    {
        $registro = Registro::findOrFail($id);
        $this->registro_id = $registro->id;
        $this->nombre = $registro->nombre;
        $this->curp = $registro->curp;
        $this->folio = $registro->folio;
        $this->escuela = $registro->escuela;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate([
            'nombre' => 'required|string|max:255',
            'curp' => 'required|string|max:18|unique:registros,curp,' . $this->registro_id,
            'folio' => 'required|string|max:50',
            'escuela' => 'required|string|max:255',
        ]);

        $registro = Registro::findOrFail($this->registro_id);
        $registro->update([
            'nombre' => $this->nombre,
            'curp' => $this->curp,
            'folio' => $this->folio,
            'escuela' => $this->escuela,
        ]);

        $this->resetForm();
        $this->cargarRegistros();
        session()->flash('message', '✏️ Registro actualizado correctamente.');
    }

    public function delete($id)
    {
        Registro::findOrFail($id)->delete();
        $this->cargarRegistros();
        session()->flash('message', '🗑️ Registro eliminado.');
    }

    public function cancelarEdicion()
    {
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->nombre = '';
        $this->curp = '';
        $this->folio = '';
        $this->escuela = '';
        $this->registro_id = null;
        $this->isEdit = false;
    }
}
