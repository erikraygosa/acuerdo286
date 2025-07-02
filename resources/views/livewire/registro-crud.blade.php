<div class="p-6">
    <h2 class="text-lg font-bold mb-4">📋 CRUD de Registros</h2>

    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded shadow">
            {{ session('message') }}
        </div>
    @endif

    <!-- Formulario -->
    <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}">
        <div class="mb-4">
            <label class="block font-medium text-sm text-gray-700">Nombre:</label>
            <input type="text" wire:model.defer="nombre" class="w-full border-gray-300 rounded-md shadow-sm" />
            @error('nombre') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium text-sm text-gray-700">CURP:</label>
            <input type="text" wire:model.defer="curp" class="w-full border-gray-300 rounded-md shadow-sm" />
            @error('curp') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium text-sm text-gray-700">Folio:</label>
            <input type="text" wire:model.defer="folio" class="w-full border-gray-300 rounded-md shadow-sm" />
            @error('folio') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-medium text-sm text-gray-700">Escuela:</label>
            <input type="text" wire:model.defer="escuela" class="w-full border-gray-300 rounded-md shadow-sm" />
            @error('escuela') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center gap-3">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                {{ $isEdit ? 'Actualizar' : 'Guardar' }}
            </button>

            @if($isEdit)
                <button type="button" wire:click="cancelarEdicion" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                    Cancelar
                </button>
            @endif
        </div>
    </form>

    <!-- Tabla de registros -->
    <h3 class="text-md font-semibold mt-8 mb-2">📄 Registros:</h3>
    <table class="w-full table-auto border">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-2 py-1 border">Nombre</th>
                <th class="px-2 py-1 border">CURP</th>
                <th class="px-2 py-1 border">Folio</th>
                <th class="px-2 py-1 border">Escuela</th>
                <th class="px-2 py-1 border">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($registros as $registro)
                <tr class="text-center">
                    <td class="border px-2 py-1">{{ $registro->nombre }}</td>
                    <td class="border px-2 py-1">{{ $registro->curp }}</td>
                    <td class="border px-2 py-1">{{ $registro->folio }}</td>
                    <td class="border px-2 py-1">{{ $registro->escuela }}</td>
                    <td class="border px-2 py-1 space-x-2">
                        <button wire:click="edit({{ $registro->id }})" class="text-blue-600 hover:underline">✏️ Editar</button>
                        <button wire:click="delete({{ $registro->id }})" class="text-red-600 hover:underline">🗑️ Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
