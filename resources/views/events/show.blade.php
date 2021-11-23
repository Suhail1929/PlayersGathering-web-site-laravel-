@extends('template')
@section('title') Les 10 dernières actualités @endsection


@section('content')
<i>{{strftime('%d/%m/%Y à %H:%m', strtotime($events->date))}}</i><br/>
<strong>{{$events->title}}</strong>
{{$events->message}}<br/>
<em>par {{$events->user->name}}</em><br/>
<a href="{{url('events/')}}">Retour à la liste</a>
@auth
@if (time() < strtotime($events->date))
<a class="btn btn-success" href="{{route('events.show', $events->id)}}">Participer</a>
@endif
@auth
        @if(Gate::allows('Utilisateur', $events))
        <a class="btn btn-warning" href="{{route('events.edit',$events->id)}}">Editer</a> 
        @endif
        @else <button type="submit" class="btn btn-secondary">connecter pour participer </button> 
        @endauth
        <form action="{{route('events.destroy', $events->id)}}" method="POST">
        @if(Gate::allows('Utilisateur', $events))
        @method('DELETE')
        @csrf
        @auth
        <button type="submit" class="btn btn-danger">Supprimer</button>
        @endauth
        @endif
      </form>
@endauth
@endsection