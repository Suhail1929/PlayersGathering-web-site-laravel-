@extends('template')
@section('title') Modifier une actualité @endsection
@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{url('events', $events->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-0 row">
            <label for="title" class="col-sm-2 col-form-label">Nom de l'événement</label>
            <div class="d-flex">
                <input type="text" class="form-control" name="title" id="title"
                       placeholder="Saisir le titre de l'actualité" value="{{$events->title}}"/>
            </div>
        </div>
        <div class="mb-2 row" >
            <label for="game" class="col-sm-2 col-form-label ">Nom du jeu</label>
            <div class="d-flex">
                        <select name="game" value="{{ old('game') }}" class="form-control @error('game') is-invalid @enderror">
                            <option >Choissez un jeu :</option>
                            <option value="League of Legends">League of Legends</option>
                            <option value="Counter-Strike: Global Offensive">Counter-Strike: Global Offensive</option>
                            <option value="VALORANT">Valorant</option>
                            <option value="AMONG US">Among Us</option>
                            <option value="APEX LEGENDS">Apex Legends</option>
                            <option value="FORTNITE">Fortine</option>
                            <option value="TEAM FORTRESS 2">Team Fortress 2</option>
                            <option value="DOTA 2">Dota 2</option>
                            <option value="OVERWATCH">Overwatch</option>
                            <option value="WARZONE">Warzone</option>
                            <option value="FIFA 2022">Fifa 2022</option>
                            <option value="ROCKET LEAGUE">Rocket League</option>
                            <option value="GRAND THEFT AUTO ONLINE">GTA Online</option>
                            <option value="Minecraft">Minecraft</option>
                            <option value="autre">Autre</option>
                        </select>
            </div>
        </div>
        <div class="mb-2 row">
            <label for="NumP" class="col-sm-3 col-form-label">Nombre de participants</label>
            <div class="d-flex">
                <input type="number" class="form-control" name="NumP" id="NumP"
                       placeholder="Saisir le titre de l'actualité" value="{{$events->NumP}}"/>
            </div>
        </div>
        <div class="mb-2 row">
            <label for="date" class="col-sm-2 col-form-label">Date de l'événement</label>
            <div class="d-flex">
                <input type="datetime-local" class="form-control" name="date" id="date"
                       placeholder="Saisir la date de l'actualité" value="{{date('Y-m-d\TH:i', strtotime($events->date))}}"/>
            </div>
        </div>
         <div class="mb-2 row">
            <label for="message" class="col-sm-2 col-form-label">Description</label>
            <div class="d-flex">
 <textarea class="form-control" id="message" name="message" rows="3"
           placeholder="Saisir le message de l'actualité">{{$events->message}}</textarea>
            </div>
        </div>
        <div class="mb-2">
            <div class="offset-sm-2 col-sm-10">
                <button class="btn btn-primary mb-1 mr-1" type="submit">Modifier</button>
                <a href="{{route('events.show',$events->id)}}" class="btn btn-danger mb-1">Annuler</a>
            </div>
        </div>
    </form>
    </div>
@endsection
