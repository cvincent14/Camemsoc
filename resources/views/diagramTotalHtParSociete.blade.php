@extends('header')
@section('contenu')

            <diagram-totalhtparsociete 
            :list-society ="{{ $listSociety }}"
            :detail-mouth ="{{ json_encode($detailMonthSociety) }}"
            ></diagram-totalhtparsociete>
            
@endsection