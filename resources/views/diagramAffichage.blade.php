@extends('header')
@section('contenu')

            <diagram-affichage 
            :list-society ="{{ $listSociety }}"
            :detail-mouth-society ="{{ json_encode($detailMonthSociety) }}"
            ></diagram-affichage>
            
@endsection