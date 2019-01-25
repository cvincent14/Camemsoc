@extends('accueil')
@section('content')

            <h2>Graphe circulaire sur les dépenses des 12 derniers mois de la société {{ $nameSociety }}</h2>
                      
            <form action="/diagram3" method="post"> 
                {{ csrf_field() }}
                <label action="/diagram3" for="maliste">Séléctionnez une société : </label> 
                <p><select name="maliste">

                    @foreach($companyNames as $companyName)

                        <?php $sansEspace = str_replace(' ', '_', $companyName); ?>
                        <option value={{ $sansEspace }} > {{ $companyName }}</option>

                    @endforeach

                </select>
                <button class="btn btn-primary" type="submit">Valider</button></p>
            </form>

            <div class="chart-container" style="position: relative; height:30vh; width:40vw">
                <canvas id="Diagram3"></canvas>
            </div>

            <script> 
                var recupMouthSociety = @json($mouthSociety);
                var recupTotalMoisHtBcSociety = @json($totalMoisHtBcSociety);
                var compteur = @json($totalMoisHtBcSociety);
                var tableColor;
            </script>
            <script src="{{ asset('js/app.js') }}"></script>
            <script src="../js/diagram3.js"></script>
            
@endsection