<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Camemsoci</title>	
        <link rel="shortcut icon" type="image/x-icon" href="img/icon.PNG" />
    </head>
    <body>
        <div id="app"></div>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Home</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/diagram1">Diagramme numéro 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/diagram2">Diagramme numéro 2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/diagram3">Diagramme numéro 3</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/diagram4">Diagramme numéro 4</a>
                        </li>
                    </ul>
                </div>
            </nav>
            @yield('content')
             
        </div>
    </body>
</html>