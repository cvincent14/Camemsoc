@extends('accueil')
@section('content')

            <div class="chart-container" style="position: relative; height:15vh; width:30vw">
                <h3>Graphe circulaire sur les dépenses des 12 derniers mois</h3>
                <canvas id="Diagram1"></canvas>
            </div>
            
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
            <script>
                var recupName = @json($nameSociety);
                var recupId = @json($totalHtBcSociety);
                var compteur = @json($nameSociety);
                var tableColor;
            </script>
            <script src="{{ asset('js/app.js') }}"></script>
            <script src="js/diagram1.js"></script>  
            
@endsection