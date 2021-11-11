@extends('template')
@section('title') Les 10 dernières actualités @endsection


@section('content')
<i>{{strftime('%d/%m/%Y à %H:%m', strtotime($events->date))}}</i><br/>
<strong>{{$events->title}}</strong>
{{$events->message}}<br/>
<em>par {{$events->user->name}}</em><br/>
@foreach($events->keywords as $keyword)
 @if($loop->first)
 <b>Mots-clés</b> :
 @endif
 {{$keyword->title}}
 @if(!$loop->last)
 ;
 @else
 <br/>
 @endif
@endforeach
<a href="{{url('events/')}}">Retour à la liste</a>
@auth
@if (time() < strtotime($events->date))
<a class="btn btn-success" href="{{route('events.show', $events->id)}}">Participer</a>
@endif
@endauth
@endsection