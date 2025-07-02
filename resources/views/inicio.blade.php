<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registro Académico</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <a href="https://www.gob.mx/busqueda"><i class="glyphicon glyphicon-search"></i> </a>
      </div>
    </div>
  </nav>

  <div class="subheader">
    <div class="subheader-left">CONSULTA SEP RODAC</div>
    <div class="subheader-right">
      <a href="#">Inicio</a>
      <a href="#">Términos de uso</a>
    </div>
  </div>
</header>

<section>
  <div class="section" style="text-align: center;">
    <img class="responsive" src="{{ asset('images/RODAC_Header2.png') }}" alt="fondo RODAC" style="width: 100%; height: auto;" />
  </div>
</section>

<div class="hero">
  <h1>REGISTRO ACADÉMICO</h1>
  <h2>Validación e inscripción de documentos académicos</h2>
</div>

<div class="contenido">
  <h2>El Registro Oficial de Documentos Académicos</h2>
  <p>Este sistema permite registrar y validar documentos académicos de manera oficial, segura y confiable.</p>

<div class="formulario">
  <form method="GET" action="{{ route('buscar.curp') }}">
    <input name="curp" placeholder="CURP: XXXX000000XXXXXX00" type="text" maxlength="18" required pattern="[A-Za-z0-9]+" title="No se permiten los caracteres especiales.">
    <button type="submit">Buscar</button>
  </form>
</div>

@if(session('error'))
  <div class="alert alert-danger text-center">
    {{ session('error') }}
  </div>
@endif

@if(isset($registro))
  <div class="resultado">
    <p><strong>Nombres:</strong> {{ $registro->nombres }}</p>
    <p><strong>Apellidos:</strong> {{ $registro->apellidos }}</p>
    <p><strong>CURP:</strong> {{ $registro->curp }}</p>
    <p><strong>Folio:</strong> {{ $registro->folio }}</p>
    <p><strong>Escuela:</strong> {{ $registro->escuela }}</p>
    <p><strong>CCT:</strong> {{ $registro->cct }}</p>
    <p><strong>Calificación:</strong> {{ $registro->calificacion }}</p>
    <p><strong>Clave:</strong> {{ $registro->clave }}</p>
    <p><strong>Secretaría:</strong> {{ $registro->secretaria }}</p>
    <p><strong>Fecha:</strong> {{ $registro->fecha }}</p>

    <p>
      @if($registro->imagen)
          <img src="{{ asset('storage/' . $registro->imagen) }}" alt="Fotografia" width="100" height="100">
      @else
          <img src="https://via.placeholder.com/100" alt="Imagen por defecto" width="100" height="100">
      @endif
    </p>
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
  <div class="footer-firma">
    © 2025 RODAC | SECRETARIA DE GOBERNACION
  </div>
</footer>

</body>
</html>
