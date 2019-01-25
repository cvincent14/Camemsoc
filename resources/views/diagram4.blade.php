@extends('accueil')
@section('content')

            <h2>Graphe circulaire sur les dépenses des 12 derniers mois</h2>

            <div class="chart-container" style="position: relative; height:15vh; width:25vw"> 
                <canvas id="Diagram4"></canvas>
            </div>

            <script>
                var recupName = @json($nameImputation);
                var recupId = @json($totalImputation);
                var compteur = @json($nameImputation);
                var tableColor;
            </script>
            <script src="{{ asset('js/app.js') }}"></script>
            <script src="js/diagram4.js"></script>  
            
@endsection