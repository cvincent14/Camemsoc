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
            var recupMois = @json($mois);
            var recupTotalMoisHtBc = @json($totalMoisHtBc);
            var recupMouthSociety = @json($mouthSociety);
            var recupTotalMoisHtBcSociety = @json($totalMoisHtBcSociety);
        </script>
        
        <script src="js/diagram2.js"></script>
        <script src="js/diagram3.js"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
        
    </body>
</html>