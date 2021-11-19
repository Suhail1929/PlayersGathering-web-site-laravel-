@extends('template')
@section('title') Les 10 dernières actualités @endsection

@section('content')
<div class="card-header pb-0">
  <h6>La liste des événements</h6>
</div>
<table>
  <tbody>
    @foreach($eventsList as $events)
    <tr>
      <td><img src="http://cdn.onlinewebfonts.com/svg/img_452021.png" style="width: 20px;" ></td>
      <td><strong>{{$events->title}}</strong>
      </br> 
      </td>
      <td><strong>{{$events->game}}</strong>
      </br> 
      </td>
      <td> 
        <strong> <i>{{$events->NumP}} </i></strong> Participants
       
      </td>
      <td>{{strftime('%d/%m/%Y à %H:%m', strtotime($events->date))}}</td>
      <td><a class="btn btn-primary" href="{{route('events.show', $events->id)}}">Consulter</a></td>
      <td><form action="{{route('events.destroy', $events->id)}}" method="POST">
        @if(Gate::allows('Utilisateur', $events))
        @method('DELETE')
        @csrf
        @auth
        <button type="submit" class="btn btn-info">Supprimer</button>
        @endauth
        @endif
      </form></td>
      <td>
        @auth
        @if(Gate::allows('Utilisateur', $events))
        <a class="btn btn-warning" href="{{route('events.edit',$events->id)}}">Modifier</a> 
        @endif
        @else <button type="submit" class="btn btn-secondary">Connecter pour participer </button> 
        @endauth
      </td>
    </tr>
  @endforeach
</tbody>
</table>

@endsection



