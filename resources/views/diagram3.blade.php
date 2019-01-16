<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Camemsoci</title>
    </head>
    <body>
        <div id="app"></div>

        @foreach($detailMonthSociety as $uneSocieteMois)                    
            <?php   
                $mouthSociety[] = $uneSocieteMois -> mois."/ ".$uneSocieteMois -> annee;
                $totalMoisHtBcSociety[] = $uneSocieteMois -> TotalHt  ;
            ?>
        @endforeach

        <div class="chart-container" style="position: relative; height:30vh; width:30vw">
                <canvas id="Diagram3"></canvas>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
        <script> 
            var recupMouthSociety = @json($mouthSociety);
            var recupTotalMoisHtBcSociety = @json($totalMoisHtBcSociety);
            var compteur = @json($totalMoisHtBcSociety);
            var tableColor;
        </script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="js/diagram3.js"></script>
        
    </body>
</html>