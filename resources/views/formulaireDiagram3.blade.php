<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Camemsoci</title>
    </head>
    <body>
        @foreach($listSociety as $uneSociety)
            <?php $companyNames[] = $uneSociety -> societe ?>
        @endforeach

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
                <input type="submit" value="Submit"></p>
            </form>
    </body>
</html>