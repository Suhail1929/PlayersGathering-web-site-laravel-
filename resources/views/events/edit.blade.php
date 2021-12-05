@extends('template')
@section('title') Modifier une actualité @endsection
@section('content')
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
            @endforeach
        </ul>
    </div>

    @endif

    {{-- Le formulaire de modification --}}
    <form action="{{url('events', $events->id)}}" method="post" class="espaceinput">
        @csrf
        @method('PUT')

        {{-- Demander le nom de l'événement --}}
        <div class="mb-0 row">
            <label for="title" class="col-sm-2 col-form-label">Nom de l'événement</label>
            <div class="d-flex">
                <input type="text" class="form-control espaceinput" name="title" id="title" placeholder="Saisir le titre de l'actualité" value="{{$events->title}}"/>
            </div>
        </div>

        {{-- Demander le jeu auquel le créateur veut jouer--}}
        <div class="mb-2 row" >
            <label for="game" class="col-sm-2 col-form-label ">Nom de jeu</label>
            <div class="d-flex">
                <select name="game" value="{{ old('game') }}" class="form-control @error('game') is-invalid @enderror form-control choix-input">
                    <option value="AMONG US">Among Us</option>
                    <option value="APEX LEGENDS">Apex Legends</option>
                    <option value="Counter-Strike: Global Offensive">Counter-Strike: Global Offensive</option>
                    <option value="DBDL">Dead By Daylight</option>
                    <option value="DOTA 2">Dota 2</option>
                    <option value="FIFA 2022">Fifa 2022</option>
                    <option value="FORTNITE">Fortnite</option>
                    <option value="GRAND THEFT AUTO ONLINE">GTA online</option>
                    <option value="League of Legends">League of Legends</option>
                    <option value="Minecraft">Minecraft</option>
                    <option value="Overcooked">Overcooked</option>
                    <option value="OVERWATCH">Overwatch</option>
                    <option value="ROCKET LEAGUE">Rocket League</option>
                    <option value="Stardew Valley">Stardew Valley</option>
                    <option value="TEAM FORTRESS 2">Team Fortress 2</option>
                    <option value="VALORANT">Valorant</option>
                    <option value="WARZONE">Warzone</option>
                    <option value="Autre">Autre</option>
                </select>
            </div>
        </div>

        {{-- Demander le nombre de participants--}}
        <div class="mb-2 row">
            <label for="NumP" class="col-sm-3 col-form-label">Nombre de participants</label>
            <div class="d-flex">
                <input type="number" class="espaceinput form-control" name="NumP" id="NumP" placeholder="Saisir le titre de l'actualité" value="{{$events->NumP}}"/>
            </div>
        </div>

        {{-- Demander la date et l'heure de l'événement --}}
        <div class="mb-2 row">
            <label for="date" class="col-sm-2 col-form-label">Date et l'heure de l'événement</label>
            <div class="d-flex">
                <input type="espaceinput datetime-local" class="form-control" name="date" id="date" placeholder="Saisir la date de l'actualité" value="{{date('Y-m-d\TH:i', strtotime($events->date))}}"/>
            </div>
        </div>

        {{-- Demander la description de l'événement --}}
        <div class="mb-2 row">
            <label for="message" class="col-sm-2 col-form-label">Description</label>
            <div class="d-flex">
                <textarea class="form-control" id="message" name="message" rows="3" placeholder="Saisir le message de l'actualité">{{$events->message}}</textarea>
            </div>
        </div>

        {{-- Les boutons de validation de la modification et le bouton annuler la modification --}}
        <div class="mb-2">
            <div class="offset-sm-2 col-sm-10">
                <button class="btn btn-primary mb-1 mr-1" type="submit">Modifier</button>
                <a href="{{route('events.show',$events->id)}}" class="btn btn-danger mb-1">Annuler</a>
            </div>
        </div>

    </form>

    <script>$(".choix-input").select2({ tags: true});</script>
@endsection
