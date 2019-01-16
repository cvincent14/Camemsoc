@extends('accueil')
@section('content')

            <div class="chart-container" style="position: relative; height:30vh; width:30vw">
                <h3>Graphe circulaire sur les dépenses des 12 derniers mois de la société {{ $nameSociety }}</h3>
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
            
@endsection