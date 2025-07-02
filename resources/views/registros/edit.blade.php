<x-app-layout>
    <x-slot name="header">Nuevo Registro</x-slot>

    <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="mb-4 text-green-600 font-semibold">{{ session('success') }}</div>
        @endif

        <form method="PUT" action="{{ route('registros.store') }}">
            @csrf

            <x-input-label for="nombres" value="Nombres" />
            <x-text-input id="nombres" name="nombres" class="mt-1 block w-full" required />

            <x-input-label for="apellidos" value="Apellidos" class="mt-4" />
            <x-text-input id="apellidos" name="apellidos" class="mt-1 block w-full" required />

            <x-input-label for="curp" value="CURP" class="mt-4" />
            <x-text-input id="curp" name="curp" maxlength="18" class="mt-1 block w-full" required />

            <!-- Agrega los demás campos de la misma forma -->

            <x-primary-button class="mt-4">Guardar</x-primary-button>
        </form>
    </div>
</x-app-layout>
