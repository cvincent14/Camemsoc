<?php

namespace App\Http\Controllers;

use App\Bon;
use App\Fournisseur;
use DB;

class DiagramController extends Controller
{
    public function index(){
        return view('accueil');
    }
    public function recoverySocieteTotalHt()
    {
        $limit = 10;        
        $detailMonthSociety;
        $bonFiltre = DB::select(
        'SELECT societe, SUM(total_ht_bc) as somme_total_ht_bc
        FROM bon, fournisseur
        WHERE bon.id_fournisseur = fournisseur.IDfournisseur
        AND YEAR(bon.validation_dateheure) +1  >= YEAR(CAST(NOW() AS DATE))
        AND validation_etat >= 4
        GROUP BY societe
        Order by somme_total_ht_bc desc
        LIMIT :limit', ['limit' => $limit]);
                
        $detailMonth = DB::select(
        'SELECT SUM(total_ht_bc) AS TotalHt, MONTH(validation_dateheure) AS mois, YEAR(validation_dateheure) AS annee
        FROM bon
        WHERE YEAR(CAST(NOW() AS DATE)) <= YEAR(validation_dateheure) +1
        GROUP BY annee, mois');

        $detailMonthSociety = DB::select(
        'SELECT SUM(total_ht_bc) AS TotalHt, MONTH(validation_dateheure) AS mois, YEAR(validation_dateheure) AS annee
        FROM bon, fournisseur
        WHERE bon.id_fournisseur = fournisseur.IDfournisseur
        AND YEAR(CAST(NOW() AS DATE)) <= YEAR(validation_dateheure) +1
        AND societe LIKE "AMMI.DSI"
        GROUP BY annee, mois');    

        $listSociety = DB::select(
        'SELECT societe, SUM(total_ht_bc) as somme_total_ht_bc
        FROM bon, fournisseur
        WHERE bon.id_fournisseur = fournisseur.IDfournisseur
        AND validation_etat >= 4
        GROUP BY societe
        Order by somme_total_ht_bc');

        return view('diagram', [
            'lesBons' => $bonFiltre,
            'detailMonth' => $detailMonth,
            'listSociety' => $listSociety,
            'detailMonthSociety' => $detailMonthSociety,
            'formulaire' => $formulaire,
        ]);        
    }

    public function sendSocieteTotalHt()
    {
        $nameSociety = request('maliste');
        $nameSociety = str_replace('_', ' ', $nameSociety);
        dump($nameSociety);

        $detailMonthSociety = DB::select(
        'SELECT SUM(total_ht_bc) AS TotalHt, MONTH(validation_dateheure) AS mois, YEAR(validation_dateheure) AS annee
        FROM bon, fournisseur
        WHERE bon.id_fournisseur = fournisseur.IDfournisseur
        AND YEAR(CAST(NOW() AS DATE)) <= YEAR(validation_dateheure) +1
        AND societe LIKE :nameSociety
        GROUP BY annee, mois', ['nameSociety' => $nameSociety]);

        
        foreach($detailMonthSociety as $uneSocieteMois){
                    
            $mouthSociety[] = $uneSocieteMois -> mois;
            $totalMoisHtBcSociety[] = $uneSocieteMois -> TotalHt  ;

        }

        $formulaire = true;
        return redirect() ->action(
            'DiagramController@sendSocieteTotalHt', 
            ['detailMonthSociety' => $detailMonthSociety,
            'formulaire' => $formulaire]
        );
    }
}
