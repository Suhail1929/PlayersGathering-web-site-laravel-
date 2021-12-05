@extends('template')
@section('title') La liste des participants @endsection

@section('content')
  <div class="card-header pb-0">
    <h6>Liste des participants</h6>
  </div>
  <div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0">
      <div class="scrollit">
        <table class="table align-items-center mb-0" class="table">
          
          <thead>
            <tr>
              <th class="text-secondary opacity-7 ps-1"></th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-4">Prénom</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-4">Nom</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-6">Jeu préféré</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">Date de Naissance</th>
              <th class="text-secondary opacity-7"></th>
              <th class="text-secondary opacity-7"></th>
            </tr>
          </thead>
          <tbody>
            @php
                $id=(int) $_GET['events_id'];
                $membreList=DB::table('membres')->where('events_id', $id)->get();
            @endphp   
            @foreach($membreList as $membre)       
              <tr>
                <td class="px-3">
                  <img src="{{ asset('image/gamer.png')}}" class="avatar avatar-sm me-3 ps-1" alt="user1">
                </td>
                <td>
                  <p class="text-xs mb-0 font-weight-bold px-2">{{$membre->prenom}}</p>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0 px-1">{{$membre->nom}}</p>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0 px-3">{{$membre->jeupref}}</p>
                </td>
                <td>
                  <span class="text-xs font-weight-bold mb-0">{{strftime('%d/%m/%Y', strtotime($membre->datenaissance))}}</span>
                </td>
                <td class="align-middle">
                    <a href="{{route('membre.show', $membre->id)}}" class="btn btn-info" data-toggle="tooltip" data-original-title="Edit user">
                      Consulter
                    </a>
                </td>
                <td class="align-middle">
                  <form action="{{route('membre.destroy', ['membre' => $membre->id])}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">
                      Supprimer
                    </button>
                  </form>
              </td>
              </tr>
            @endforeach
          </tbody>         
        </table>
      </div>
    </div>
  </div>
@endsection