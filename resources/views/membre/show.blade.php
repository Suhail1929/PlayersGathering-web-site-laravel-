@extends('template')
@section('title') Détails du participant @endsection


@section('content')
@php
$name = DB::table('users')->where('id',$membre->getAttributes()['user_id'])->get();
@endphp
  <h6 class="text-success" style="font-weight: bold">Nom sur le site :</h6>
  <p>{{$name[0]->name}} </p><br>
  <h6 class="text-success" style="font-weight: bold">Prénom et Nom :</h6>
  <h5 style="font-weight: bold">{{$membre->prenom}} {{$membre->nom}} </h5><br/>
  <h6 class="text-success" style="font-weight: bold">Description : </h6>
  <p>{{$membre->description}}</p>
  <h6 class="text-success" style="font-weight: bold">Adresse Mail : </h6>
  <p>{{$membre->mail}}</p>
  <h6 class="text-success" style="font-weight: bold">Date de Naissance :</h6>
  <p>{{strftime('%d/%m/%Y', strtotime($membre->datenaissance))}}</p>
  
    
  <div class="offset-sm-0 col-sm-0">
        <br>
            <a href="{{url('events/')}}">Retour à la liste des événements</a>
        <br>
  </div>
@endsection