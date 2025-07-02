<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Consulta Acuerdo 286</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

<header>
  <nav class="navbar-custom">
    <div class="navbar-container">
      <div class="navbar-left">
        <img src="{{ asset('images/logoheader.svg') }}" alt="Gobierno de México" class="logo">
      </div>
      <div class="navbar-right">
        <a href="https://www.gob.mx/tramites">Trámites</a>
        <a href="https://www.gob.mx/gobierno">Gobierno</a>
        <a href="https://www.gob.mx/busqueda"><i class="glyphicon glyphicon-search"></i></a>
      </div>
    </div>
  </nav>
    <style>
    .table-header {
      background-color: #b2862f;
      color: #ffffff;
      font-weight: bold;
    }
    .table-subheader {
      background-color: #eee;
      font-weight: bold;
    }
    .table-bordered {
      border: 1px solid #ddd;
    }
    .table-bordered td {
      vertical-align: middle;
    }
     .table-bold td {
    font-weight: bold;
  }
  </style>
</header>

<div class="container contenido mt-5">

  <h2>Consulta tu certificado semielectrónico por Acuerdo 286</h2>

  @if(!isset($registro))
  <div class="panel panel-default" style="padding:20px; margin-top:30px;">
    <h4>Búsqueda por folio</h4>
    <p>Ingresa el CURP y el número de folio que deseas buscar.</p>

    <form method="GET" action="{{ route('buscar.curp') }}">
      @csrf
      <div class="form-group">
        <label>CURP:</label>
        <input type="text" class="form-control" name="curp" placeholder="Ingrese su CURP" required>
      </div>
      
      
      <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
  </div>
@endif
  @if(session('error'))
    <div class="alert alert-danger text-center">
      {{ session('error') }}
    </div>
  @endif

   @if(isset($registro))
  <table class="table table-bordered">
    <tr class="table-header">
      <td colspan="2">Datos de la persona</td>
    </tr>
    <tr>
      <td>Nombre:</td>
    <td><strong>{{ $registro->nombres }} {{ $registro->apellidos }}</strong></td>
    </tr>

    <tr class="table-header">
      <td colspan="2">Datos del servicio educativo</td>
    </tr>
    <tr>
      <td>Institución educativa emisora:</td>
       <td><strong>{{ $registro->clave }}</strong></td>
    </tr>
    <tr>
      <td>Servicio educativo:</td>
       <td><strong>{{ $registro->escuela }}</strong></td>
    </tr>
    <tr>
      <td>Clave de Centro de Trabajo:</td>
       <td><strong>{{ $registro->cct }}</strong></td>
    </tr>

    <tr class="table-header">
      <td colspan="2">Trayectoria académica y datos del documento</td>
    </tr>
    <tr>
      <td>Estudios Acreditados:</td>
     <td><strong>Bachillerato o equivalentes</strong></td>
    </tr>
    <tr>
      <td>Resultado de la evaluación:</td>
      <td><strong>{{ $registro->calificacion }}</strong></td>
    </tr>
    <tr>
      <td>Fecha de evaluación:</td>
        <td><strong>{{ \Carbon\Carbon::parse($registro->fechaev)->locale('es')->translatedFormat('d \d\e F \d\e Y') }}</strong></td>
    </tr>

    <tr class="table-header">
      <td colspan="2">Tipo de documento</td>
    </tr>
    <tr>
      <td>Estatus:</td>
          <td><strong>Registrado</strong></td>
    </tr>
    <tr>
      <td>Folio:</td>
       <td><strong>{{ $registro->folio }}</strong></td>
    </tr>
    <tr>
      <td>Fecha y hora de timbrado:</td>
   <td><strong>{{ \Carbon\Carbon::parse($registro->fecha)->locale('es')->translatedFormat('d \d\e F \d\e Y') }}</strong></td>
    </tr>
  </table>
  @endif

    @if(isset($registro))
      <div class="text-center"> <!-- Contenedor centrado -->
          <a href="{{ route('inicio') }}" class="btn btn-primary">Regresar</a>
      </div>
     @endif
</div>

<footer class="footer-decorado">
  <div class="footer-contenido">
    <div>
      <h4>Enlaces</h4>
      <a href="https://participa.gob.mx">Participa</a>
      <a href="https://www.gob.mx/publicaciones">Publicaciones Oficiales</a>
      <a href="http://www.ordenjuridico.gob.mx">Marco Jurídico</a>
      <a href="https://consultapublicamx.inai.org.mx/vut-web/">Transparencia</a>
      <a href="https://alertadores.funcionpublica.gob.mx/">Alerta</a>
      <a href="https://sidec.funcionpublica.gob.mx">Denuncia</a>
    </div>
    <div>
      <h4>¿Qué es este sitio?</h4>
      <a href="https://datos.gob.mx">Portal de datos abiertos</a>
      <a href="https://www.gob.mx/accesibilidad">Accesibilidad</a>
      <a href="https://www.gob.mx/privacidadintegral">Privacidad integral</a>
      <a href="https://www.gob.mx/privacidadsimplificado">Privacidad simplificada</a>
      <a href="https://www.gob.mx/terminos">Términos y Condiciones</a>
      <a href="https://www.gob.mx/terminos#medidas-seguridad-informacion">Política de seguridad</a>
      <a href="https://www.gob.mx/sitemap">Mapa del sitio</a>
    </div>
    <div>
      <h4>Síguenos en</h4>
      <ul class="list-inline social-icons">
        <li>
          <a href="https://www.facebook.com/gobmexico" target="_blank" aria-label="Facebook de presidencia">
            <i class="fa fa-facebook"></i>
          </a>
        </li>
        <li>
          <a href="https://twitter.com/GobiernoMX" target="_blank" aria-label="Twitter de presidencia">
            <i class="fa fa-twitter"></i>
          </a>
        </li>
      </ul>
    </div>
  </div>
 
</footer>

<script>
$(window).scroll(function() {
    if ($(this).scrollTop() > 50){  
        $('nav.navbar-custom').addClass("fixed-top");
    }
    else{
        $('nav.navbar-custom').removeClass("fixed-top");
    }
});
</script>

</body>
</html>