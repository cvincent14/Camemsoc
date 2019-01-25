@extends('accueil')
@section('content')

            <h2>Graphe sur les dépenses des 12 derniers mois</h2>

            <div class="chart-container" style="position: relative; height:30vh; width:40vw">   
                <canvas id="Diagram2"></canvas>
            </div>

            <script> 
                var recupMois = @json($mois);
                var recupTotalMoisHtBc = @json($totalMoisHtBc);
                var compteur = @json($totalMoisHtBc);
                var tableColor;
            </script>
            <script src="{{ asset('js/app.js') }}"></script>
            <script src="js/diagram2.js"></script>

@endsection