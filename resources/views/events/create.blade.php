@extends('template')
@section('title') Création d'une actualité @endsection
@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{url('events')}}" method="post">
        @csrf
        <div class="mb-3 row" >
            <label for="title" class="col-sm-2 col-form-label ">Nom de l'évènement</label>
            <div class="d-flex">
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                       placeholder="Saisir le titre de l'actualité " value="{{ old('title') }}"/>
            </div>
        </div>
        <div class="mb-3 row" >
            <label for="NumP" class="col-sm-2 col-form-label ">Nombre de participants</label>
            <div class="d-flex">
                <input type="number" class="form-control @error('NumP') is-invalid @enderror" name="NumP" id="NumP"
                       placeholder="Saisir le titre de l'actualité " value="{{ old('NumP') }}"/>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="date" class="col-sm-2 col-form-label">Date de l'évènement </label>
            <div class="d-flex">
                <input type="datetime-local" class="form-control @error('date') is-invalid @enderror" name="date" id="date"
                       placeholder="Saisir la date de l'actualité " value="{{ old('date') }}"/>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="message" class="col-sm-2 col-form-label ">Déscription</label>
            <div class="d-flex">
 <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="3"
           placeholder="Saisir le message de l'actualité "> {{ old('message') }}</textarea>
            </div>
        </div>
        <div class="mb-3">
            <div class="offset-sm-2 col-sm-10">
                <button class="btn btn-primary mb-1 mr-1" type="submit">Ajouter</button>
                <a href="{{url('events')}}" class="btn btn-danger mb-1">Annuler</a>
            </div>
    </form>
@endsection
