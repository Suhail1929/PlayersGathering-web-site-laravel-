@extends('template')
@section('title') Les 10 dernières actualités @endsection
@section('content')
<table>
  <tbody>
    @foreach($eventsList as $events)
    <tr>
      <td><img src="http://cdn.onlinewebfonts.com/svg/img_452021.png" style="width: 20px;" ></td>
      <td><strong>{{$events->title}}</strong>
      </br> 
      </td>
      <td> 
        <strong>Le nombre maximal de participants est: <i>{{$events->NumP}}</i> </strong> 
      </br> 
    </td>
    <td>{{strftime('%d/%m/%Y à %H:%m', strtotime($events->date))}}</td>
    <td><a class="btn btn-primary" href="{{route('events.show', $events->id)}}">Consulter</a></td>
    <td><form action="{{route('events.destroy', $events->id)}}" method="POST">
      @method('DELETE')
      @csrf
      @auth
      <button type="submit" class="btn btn-info">Supprimer</button>
      @endauth
    </form></td>
    <td>
      @auth
      
      @if(Gate::allows('Utilisateur', $events))
        <a class="btn btn-warning" href="{{route('events.edit',$events->id)}}">Editer</a> 
        @endif
   @else <button type="submit" class="btn btn-secondary">connecter pour participer </button> 
   
   @endauth
   </td>
  </tr>
  @endforeach
</tbody>
</table>

@endsection



