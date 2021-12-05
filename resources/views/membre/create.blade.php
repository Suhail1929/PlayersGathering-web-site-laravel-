@extends('template')
@section('title') Formulaire de participation
@endsection
@section('content')
    
    

    <form action="{{url('membre')}}" method="post" class="espaceinput" >
        @csrf
        <input name="events_id" id="events_id" hidden value="{{$_GET['events_id']}}">

        {{-- Demander nom --}}
        <div class="mb-2 row" >
            <label for="nom" class="col-sm-2 col-form-label ">Votre Nom</label>
            <div class="d-flex">
                <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" id="nom" placeholder="Saisir votre nom" value="{{ old('nom') }}"/>
            </div>
        </div>

        {{-- Demander prénom --}}
        <div class="mb-2 row" >
            <label for="prenom" class="col-sm-2 col-form-label ">Votre Prénom</label>
            <div class="d-flex">
                <input type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" id="prenom" placeholder="Saisissez votre prénom" value="{{ old('prenom') }}"/>
            </div>
        </div>

        {{-- Demander mail --}}
        <div class="mb-2 row" >
            <label for="mail" class="col-sm-2 col-form-label ">Mail</label>
            <div class="d-flex">
                <input type="text" class="form-control @error('mail') is-invalid @enderror" name="mail" id="mail" placeholder="Saisissez votre adresse mail" value="{{ old('mail') }}"/>
            </div>
        </div>

        {{-- Demander jeu préféré --}}
        <div class="mb-2 row" >
            <label for="jeupref" class="col-sm-2 col-form-label ">Votre jeu préféré</label>
            <div class="d-flex">
                <input type="text" class="form-control @error('jeupref') is-invalid @enderror" name="jeupref" id="jeupref" placeholder="Saisissez votre jeu préféré" value="{{ old('jeupref') }}"/>
            </div>
        </div>

        {{-- Demander date de naissance --}}
        <div class="mb-2 row">
            <label for="datenaissance" class="col-sm-2 col-form-label">Date de naissance</label>
            <div class="d-flex">
                <input type="date" class="form-control @error('datenaissance') is-invalid @enderror" name="datenaissance" id="datenaissance" placeholder="Saisissez votre date de naissance" value="{{ old('datenaissance') }}"/>
            </div>
        </div>

        {{-- Demander description --}}
        <div class="mb-3 row">
            <label for="description" class="col-sm-0 col-form-label">Description</label>
            <div class="d-flex">
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Décrivez-vous en quelques mots"> {{ old('description') }}</textarea>
            </div>
        </div>

        {{-- Boutons pour participer et pour annuler --}}
        <div class="mb-3">
            <div class="offset-sm-2 col-sm-10">
                <button class="btn btn-primary mb-1 mr-1" type="submit">Participer</button>
                <a href="{{url('events')}}" class="btn btn-danger mb-1">Annuler</a>
            </div>
        </div>
        
    </form>

    <script>$(".choix-input").select2({ tags: true});</script>

@endsection