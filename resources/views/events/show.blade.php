@extends('template')
@section('title') Les 10 dernières actualités @endsection


@section('content')
  <i>{{strftime('%d/%m/%Y à %H:%M', strtotime($events->date))}}</i><br/>
  <br>
  <h5 style="font-weight: bold">{{$events->title}}</h5><br/>
  <p>{{$events->message}}</p>
  <em>par </em>
  <strong>{{$events->user->name}}</strong>
  
    
  <div class="offset-sm-0 col-sm-0">
    <br>
    <a href="{{url('events/')}}">Retour à la liste</a>
    <br>
    
      @auth
      <br>
        @if ($events->NumP != DB::table('membres')->where('events_id',$events->id)->count())
          @if (time() < strtotime($events->date))
            <form action="{{route('membre.create')}}" method="get">
              <input name="events_id" hidden value="{{$events->id}}">
              <button class="btn btn-success">Participer</button>
            </form>
          @endif
        @endif
      <form>
        <br>
      @auth
        @if(Gate::allows('Utilisateur', $events))
          <a class="btn btn-dark" href="{{route('events.edit',$events->id)}}">Editer</a>
        @endif
        @else <button type="submit" class="btn btn-secondary">Connecter pour participer</button>
      @endauth
      </form>

      <form action="{{route('membre.index')}}" method="GET">
      @auth
        @if(Gate::allows('Utilisateur', $events))
          <input name="events_id" hidden value="{{$events->id}}">
            <button class="btn btn-info" type="submit">La liste des Participants</button>
        @endif
        @else <button type="submit" class="btn btn-secondary">Connecter pour participer</button>
      @endauth
      </form>

      <form action="{{route('events.destroy', $events->id)}}" method="POST">
        @if(Gate::allows('Utilisateur', $events))
          @method('DELETE')
          @csrf
          @auth
            <button type="submit" class="btn btn-danger">Supprimer</button>
          @endauth
        @endif
      </form>
  </div>

      

    @endauth

  

@endsection