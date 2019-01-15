SELECT societe, SUM(total_ht_bc)
FROM bon, fournisseur
WHERE bon.id_fournisseur = fournisseur.IDfournisseur
AND validation_etat >= 4
GROUP BY societe