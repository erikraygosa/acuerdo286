<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Registros') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-end mb-4">
            <a href="{{ route('registros.create') }}" class="bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700">➕ Nuevo Registro</a>
        </div>

        <div class="bg-white shadow-md rounded p-4 overflow-x-auto">
            <table class="min-w-full table-auto border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-4 py-2">ID</th>
                        <th class="border px-4 py-2">Nombre</th>
                        <th class="border px-4 py-2">CURP</th>
                        <th class="border px-4 py-2">Folio</th>
                        <th class="border px-4 py-2">Escuela</th>
                        <th class="border px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registros as $registro)
                        <tr>
                            <td class="border px-4 py-2">{{ $registro->id }}</td>
                            <td class="border px-4 py-2">{{ $registro->nombre }}</td>
                            <td class="border px-4 py-2">{{ $registro->curp }}</td>
                            <td class="border px-4 py-2">{{ $registro->folio }}</td>
                            <td class="border px-4 py-2">{{ $registro->escuela }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('registros.edit', $registro) }}" class="text-blue-600 hover:underline">✏️ Editar</a>
                                <form action="{{ route('registros.destroy', $registro) }}" method="POST" class="inline-block ml-2"
                                    onsubmit="return confirm('¿Estás seguro de eliminar este registro?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">🗑️ Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if ($registros->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center text-gray-500 py-4">No hay registros disponibles.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
