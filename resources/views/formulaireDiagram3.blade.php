@extends('accueil')
@section('content')

            <h3>Graphe sur les dépenses des 12 derniers mois de la société </h3>
            <form method="post"> 
                {{ csrf_field() }}
                <label for="maliste">Séléctionnez une société : </label> 
                <p><select name="maliste">

                    @foreach($companyNames as $companyName)

                        <?php $sansEspace = str_replace(' ', '_', $companyName); ?>
                        <option value={{ $sansEspace }} > {{ $companyName }}</option>

                    @endforeach

                </select>
                <button class="btn btn-primary" type="submit">Valider</button></p>
            </form>
            
@endsection