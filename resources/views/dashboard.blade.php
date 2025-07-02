<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Generador de QR
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6">
                <form method="POST" action="{{ route('qr.generate') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="url">Liga (URL)</label>
                        <input type="url" name="url" id="url" required class="form-input w-full mt-1" value="{{ old('url') }}">
                    </div>
                    <button class="bg-indigo-600 text-white px-4 py-2 rounded">Generar QR</button>
                </form>

                @isset($qr)
                    <div class="mt-6 text-center">
                        <h3 class="text-lg font-semibold mb-2">QR generado:</h3>
                        <img src="{{ $qr }}" alt="QR Code" style="width: 5cm; height: 5cm;">
                        <div class="mt-3">
                            <a href="{{ $qr }}" download="qr.png" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded">
                                Descargar imagen
                            </a>
                            <a href="{{ $file }}" target="_blank" class="ml-3 text-indigo-700 underline">Ver archivo guardado</a>
                        </div>
                    </div>
                @endisset
            </div>
        </div>
    </div>
</x-app-layout>
