<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Camemsoci</title>
    </head>
    <body>
        

        @yield('content')


        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
        <script>    
            var formulaire = {{ $formulaire }}
            var recupName = @json($nameSociety);
            var recupId = @json($totalHtBcSociety);
            var recupMois = @json($mois);
            var recupTotalMoisHtBc = @json($totalMoisHtBc);
            var recupMouthSociety = @json($mouthSociety);
            var recupTotalMoisHtBcSociety = @json($totalMoisHtBcSociety);
        </script>
        <script src="{{ asset('js/app.js') }}"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
        
    </body>
</html>