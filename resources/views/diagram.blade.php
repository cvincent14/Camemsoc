@extends('layout')

@section('content')  

@foreach($lesBons as $unBon)
    <?php $nameSociety[] = $unBon -> societe ?>
    <?php $totalHtBcSociety[] = $unBon -> somme_total_ht_bc ?>             
@endforeach

@foreach($detailMonth as $unMois)
    <?php $mois[] = $unMois -> mois."/ ".$unMois -> annee ?>   
    <?php $totalMoisHtBc[] = $unMois -> TotalHt ?> 
@endforeach

@foreach($detailMonthSociety as $uneSocieteMois)
                    
    <?php   $mouthSociety[] = $uneSocieteMois -> mois;
            $totalMoisHtBcSociety[] = $uneSocieteMois -> TotalHt  ;

            if(!(empty($mouthSociety))){
                
                dump("pleine");
            }
            else
            {
                dump('vide');
            }
        ?>
@endforeach
@foreach($listSociety as $uneSociety)
    <?php $companyNames[] = $uneSociety -> societe ?>
@endforeach
   
<div class="chart-container" style="position: relative; height:15vh; width:30vw">
    <h3>Graphe circulaire sur les dépenses des 12 derniers mois</h3>
    <canvas id="Diagram1"></canvas>
</div>
  
<div class="chart-container" style="position: relative; height:30vh; width:30vw">
    <h3>Graphe sur les dépenses des 12 derniers mois</h3>
    <canvas id="Diagram2"></canvas>
</div>

<div class="chart-container" style="position: relative; height:30vh; width:30vw">
    <h3>Graphe sur les dépenses des 12 derniers mois de la société </h3>
    <form method="post"> 
        {{ csrf_field() }}
        <label for="maliste">Séléctionnez une société : </label> 
        <select name="maliste">
            @foreach($companyNames as $companyName)
                <?php $sansEspace = str_replace(' ', '_', $companyName); ?>
                <option value={{ $sansEspace }} > {{ $companyName }}</option>
            @endforeach
        </select>
        <input type="submit" value="Submit">
    </form>
    @if($formulaire == true) 
        <canvas id="Diagram3"></canvas>
    @endif
</div>

</div>

            
@endsection