<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use App\Bon;
use App\Fournisseur;
use DB;

class DiagramController extends Controller
{
    public function index(){
        return view('accueil');
    }

    public function recoveryDiagram1()
    {
        $limit = 10;  

        $bonFiltre = DB::select(
            'SELECT societe, SUM(total_ht_bc) as somme_total_ht_bc
            FROM bon, fournisseur
            WHERE bon.id_fournisseur = fournisseur.IDfournisseur
            AND YEAR(bon.validation_dateheure) +1  >= YEAR(CAST(NOW() AS DATE))
            AND validation_etat >= 4
            GROUP BY societe
            Order by somme_total_ht_bc desc
            LIMIT :limit', ['limit' => $limit]);

        foreach($bonFiltre as $unBon)
        {
                $nameSociety[] = $unBon -> societe ;
                $totalHtBcSociety[] = $unBon -> somme_total_ht_bc  ;            
        }

        return view('diagram1', [
            'nameSociety' => $nameSociety,
            'totalHtBcSociety' => $totalHtBcSociety,
        ]);
    }

    public function recoveryDiagram2()
    {
        $detailMonth = DB::select(
            'SELECT SUM(total_ht_bc) AS TotalHt, MONTH(validation_dateheure) AS mois, YEAR(validation_dateheure) AS annee
            FROM bon
            WHERE YEAR(CAST(NOW() AS DATE)) <= YEAR(validation_dateheure) +1
            GROUP BY annee, mois');

        foreach($detailMonth as $unMois)
        {
            $mois[] = $unMois -> mois."/ ".$unMois -> annee ;  
            $totalMoisHtBc[] = $unMois -> TotalHt ;
        }

        return view('diagram2', [
            'mois' => $mois,
            'totalMoisHtBc' => $totalMoisHtBc,
        ]); 
    }

    public function formulaireDiagram3()
    {
        $listSociety = DB::select(
            'SELECT societe, SUM(total_ht_bc) as somme_total_ht_bc
            FROM bon, fournisseur
            WHERE bon.id_fournisseur = fournisseur.IDfournisseur
            AND validation_etat >= 4
            GROUP BY societe
            Order by somme_total_ht_bc');

        foreach($listSociety as $uneSociety)
        {
            $companyNames[] = $uneSociety -> societe;
        }

        return view('formulaireDiagram3', [
            'companyNames' => $companyNames,
        ]);
    }
    
    public function recoveryDiagram3($nameSociety)
    {

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

        if(empty($mouthSociety)){
            $mouthSociety[] = "erreur";
            $totalMoisHtBcSociety[] = "erreur"  ;
        }

        return view('diagram3', [
            'mouthSociety' => $mouthSociety,
            'totalMoisHtBcSociety' => $totalMoisHtBcSociety,
            'nameSociety' => $nameSociety,
        ]);        
    }

    public function sendSocieteTotalHt()
    {
        $nameSociety = request('maliste');
        $nameSociety = str_replace('_', ' ', $nameSociety);
        
        return redirect()->route('diagram3', ['nameSociety' => $nameSociety]);
    }
}
