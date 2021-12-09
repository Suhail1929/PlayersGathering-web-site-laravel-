@extends('template')
@section('title') Création d'un événement @endsection
@section('content')
    
    {{-- Le formulaire de création --}}
    <form action="{{url('events')}}" method="post" class="espaceinput">
        @csrf

        {{-- Demander le titre de l'événement --}}
        <div class="mb-0 row" >
            <label for="title" class="col-sm-2 col-form-label ">Titre de l'événement</label>
            <div class="d-flex">
                <input type="text" class=" form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Saisir le titre de l'événement " value="{{ old('title') }}"/>
            </div>
        </div>

        {{-- Demander le jeu auquel le créateur veut jouer --}}
        <div class=" mb-2 row" >
            <label for="game" class=" col-sm-2 col-form-label ">Nom de jeu</label>
            <div class="d-flex">
                <select name="game" value="{{ old('game') }}" class=" form-control @error('game') is-invalid @enderror form-control choix-input">
                    <option value="Among Us">Among Us</option>
                    <option value="Apex Legends">Apex Legends</option>
                    <option value="Counter-Strike: Global Offensive">Counter-Strike: Global Offensive</option>
                    <option value="Dead By Daylight">Dead By Daylight</option>
                    <option value="Dota 2">Dota 2</option>
                    <option value="Fifa 2022">Fifa 2022</option>
                    <option value="Fortnite">Fortnite</option>
                    <option value="GTA Online">GTA Online</option>
                    <option value="League of Legends">League of Legends</option>
                    <option value="Minecraft">Minecraft</option>
                    <option value="Overcooked">Overcooked</option>
                    <option value="Overwatch">Overwatch</option>
                    <option value="Rocket League">Rocket League</option>
                    <option value="Stardew Valley">Stardew Valley</option>
                    <option value="Team Fortress 2">Team Fortress 2</option>
                    <option value="Valorant">Valorant</option>
                    <option value="Warzone">Warzone</option>
                    <option value="Autre">Autre</option>
                </select>
            </div>
        </div>

        {{-- Demander le nombre de participants --}}
        <div class="mb-2 row" >
            <label for="NumP" class="col-sm-3 col-form-label ">Nombre de participants</label>
            <div class="d-flex">
                <input type="number" class="  form-control @error('NumP') is-invalid @enderror" name="NumP" id="NumP" placeholder="Saisir le nombre de participant maximale" value="{{ old('NumP') }}"/>
            </div>
        </div>

        {{-- Demander la date et l'heure de l'événement --}}
        <div class="mb-2 row">
            <label for="date" class="col-sm-2 col-form-label">Date et l'heure de l'événement</label>
            <div class="d-flex">
                <input type="datetime-local" class="  form-control @error('date') is-invalid @enderror" name="date" id="date" placeholder="Saisir la date de l'événement " value="{{ old('date') }}"/>
            </div>
        </div>
        
        {{-- Demander la description --}}
        <div class="mb-3 row">
            <label for="message" class="col-sm-2 col-form-label ">Description</label>
            <div class="d-flex">
                <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" placeholder="Décrivez votre événement"> {{ old('message') }}</textarea>
            </div>
        </div>

        {{-- Les boutons ajouter et supprimer --}}
        <div class="mb-3">
            <div class="offset-sm-2 col-sm-10">
                <button class="btn btn-primary mb-1 mr-1" type="submit">Ajouter</button>
                <a href="{{url('events')}}" class="btn btn-danger mb-1">Annuler</a>
            </div>
        </div>

    </form>
    <script>$(".choix-input").select2({ tags: true});</script>
@endsection
