@extends('accueil')
@section('content')

            <h2>Graphe circulaire sur les dépenses des 12 derniers mois</h2>

            <div class="chart-container" style="position: relative; height:15vh; width:25vw"> 
                <canvas id="Diagram1"></canvas>
            </div>

            <script>
                var recupName = @json($nameSociety);
                var recupId = @json($totalHtBcSociety);
                var compteur = @json($nameSociety);
                var tableColor;
            </script>
            <script src="{{ asset('js/app.js') }}"></script>
            <script src="js/diagram1.js"></script>  
            
@endsection