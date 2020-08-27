<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('titulo')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container my-2">
    <div class="bg-primary text-white text-center">
        <h1>@yield("cabecalho")</h1>
    </div>

    @yield("conteudo")

</div>

<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
