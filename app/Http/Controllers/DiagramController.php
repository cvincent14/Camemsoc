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
        $limit = 20;  

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
        $listSociety = Fournisseur::All();
        $detailMonthSociety = [];

        return view('diagramTotalHtParSociete', [
            'listSociety' => $listSociety,
            'detailMonthSociety' => $detailMonthSociety,
        ]);
    }
    
    public function recoveryDiagram3()
    {
        $idNameSociety = request('idNomSociete');

        $detailMonthSociety = DB::select(
            'SELECT SUM(total_ht_bc) AS TotalHt, MONTH(validation_dateheure) AS mois, YEAR(validation_dateheure) AS annee
            FROM bon, fournisseur
            WHERE bon.id_fournisseur = fournisseur.IDfournisseur
            AND YEAR(CAST(NOW() AS DATE)) <= YEAR(validation_dateheure) +1
            AND IDfournisseur LIKE :id
            GROUP BY annee, mois', ['id' => $idNameSociety]);
              
        $listSociety = DB::table('Fournisseur')
                        ->join('bon', 'id_fournisseur', '=', 'fournisseur.IDfournisseur')
                        ->where('bon.validation_etat','>=', '4')
                        ->select('fournisseur.societe')
                        ->get();
 
          
        return view('diagramTotalHtParSociete', [
            'detailMonthSociety' => $detailMonthSociety,
            'listSociety' => $listSociety,
        ]);        
    }

    public function recoveryDiagram4()
    {
        $limit = 20;

        $sommeImputation = DB::select('SELECT Lib_FR, SUM(total_ht_bc) AS SommeTotale
        FROM bon, imputation_2
        WHERE bon.id_imp2 = imputation_2.IDImputation_2
        AND validation_etat >= 4
        AND YEAR(CAST(NOW() AS DATE)) <= YEAR(validation_dateheure) +1
        GROUP BY Lib_FR
        Order by SommeTotale DESC
        LIMIT :limit', ['limit' => $limit]);

        foreach($sommeImputation as $uneSommeImputation)
        {
                $nameImputation[] = $uneSommeImputation -> Lib_FR ;
                $totalImputation[] = $uneSommeImputation -> SommeTotale  ;            
        }

        return view('diagram4', [
            'nameImputation' => $nameImputation,
            'totalImputation' => $totalImputation,
        ]);

    }
}
