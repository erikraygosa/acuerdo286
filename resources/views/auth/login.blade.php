@extends('base')

@section('content')
<div style="min-height: 80vh; display: flex; align-items: center; justify-content: center;">
    <div class="panel panel-default" style="width: 100%; max-width: 450px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
        <div class="panel-heading text-center" style="background-color: #5b0030; color: white; padding: 15px;">
            <h4 style="margin: 0;">Iniciar Sesión</h4>
        </div>

        <div class="panel-body" style="padding: 25px;">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    <input id="email" type="email" class="form-control" name="email"
                        value="{{ old('email') }}" required autofocus autocomplete="username">
                </div>

                <div class="form-group mt-3">
                    <label for="password">Contraseña</label>
                    <input id="password" type="password" class="form-control" name="password"
                        required autocomplete="current-password">
                </div>

                <div class="checkbox mt-3">
                    <label>
                        <input type="checkbox" name="remember"> Recordarme
                    </label>
                </div>

                <div class="form-group mt-4 text-right">
                    <button type="submit" class="btn" style="background-color: #5b0030; color: white;">
                        Iniciar sesión
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
