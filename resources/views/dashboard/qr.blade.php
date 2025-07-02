<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Generador de QR') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                <form method="POST" action="{{ route('qr.generate') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="url" class="block text-sm font-medium text-gray-700">Liga (URL)</label>
                        <input type="text" name="url" id="url" class="form-input mt-1 block w-full" required>
                    </div>

                    <button type="submit" class="px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700">
                        Generar QR
                    </button>
                </form>

                @isset($qr_path)
                    <div class="mt-6 text-center">
                        <p class="font-semibold">QR generado:</p>
                        <img src="{{ $qr_path }}" alt="QR generado" class="mx-auto mt-2 w-64 h-64">
                        <div class="mt-4">
                            <a href="{{ $qr_path }}" download="{{ $file_name }}"
                                class="inline-flex items-center text-blue-600 hover:underline">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                                Descargar QR
                            </a>
                        </div>
                    </div>
                @endisset

            </div>
        </div>
    </div>
</x-app-layout>
