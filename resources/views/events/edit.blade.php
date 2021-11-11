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
        <div class="mb-3 row">
            <label for="title" class="col-sm-2 col-form-label">Nom de l'évènement</label>
            <div class="d-flex">
                <input type="text" class="form-control" name="title" id="title"
                       placeholder="Saisir le titre de l'actualité" value="{{$events->title}}"/>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="NumP" class="col-sm-2 col-form-label">Nombre de participants</label>
            <div class="d-flex">
                <input type="number" class="form-control" name="NumP" id="NumP"
                       placeholder="Saisir le titre de l'actualité" value="{{$events->NumP}}"/>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="date" class="col-sm-2 col-form-label">Date de l'évènement</label>
            <div class="d-flex">
                <input type="datetime-local" class="form-control" name="date" id="date"
                       placeholder="Saisir la date de l'actualité" value="{{date('Y-m-d\TH:i', strtotime($events->date))}}"/>
            </div>
        </div>
         <div class="mb-3 row">
            <label for="message" class="col-sm-2 col-form-label">Déscription</label>
            <div class="d-flex">
 <textarea class="form-control" id="message" name="message" rows="3"
           placeholder="Saisir le message de l'actualité">{{$events->message}}</textarea>
            </div>
        </div>
        <div class="mb-3">
            <div class="offset-sm-2 col-sm-10">
                <button class="btn btn-primary mb-1 mr-1" type="submit">Modifier</button>
                <a href="{{route('events.show',$events->id)}}" class="btn btn-danger mb-1">Annuler</a>
            </div>
        </div>
    </form>
    </div>
@endsection
