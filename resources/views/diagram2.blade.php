@extends('accueil')
@section('content')

        <div class="chart-container" style="position: relative; height:30vh; width:30vw">
            <h3>Graphe sur les dépenses des 12 derniers mois</h3>
            <canvas id="Diagram2"></canvas>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
        <script> 
            var recupMois = @json($mois);
            var recupTotalMoisHtBc = @json($totalMoisHtBc);
            var compteur = @json($totalMoisHtBc);
            var tableColor;
        </script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="js/diagram2.js"></script>

@endsection