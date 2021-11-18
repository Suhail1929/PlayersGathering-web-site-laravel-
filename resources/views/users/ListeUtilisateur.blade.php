@extends('template')
@section('title') Liste des utilisateurs @endsection

@section('content')
<div class="card-header pb-0">
              <h6>La liste des utilisateurs</h6>
            </div>
<table >
  <tbody>
    @foreach($usersList as $users)
    <tr>
      <td class="collapsing">
        @if($users->id_role==1)  
        <img src="https://cdn-icons-png.flaticon.com/512/109/109819.png" style="width: 20px;" >
        @elseif($users->id_role==2)    
        <img src="https://iconarchive.com/download/i91958/icons8/windows-8/Users-Administrator-2.ico" style="width: 20px;" >
        @elseif($users->id_role==3)
        <img src="http://simpleicon.com/wp-content/uploads/user1.png" style="width: 20px;" >
        @endif
      </td>
      <td><strong>{{$users->name}}</td>
      <td><strong>{{$users->email}}</td>
      <td>{{strftime('%d/%m/%Y à %H:%m', strtotime($users->created_at))}}</td>
      <td>
      @if($users->id_role==3)  
        <strong>Utlisateur</strong>
        @elseif($users->id_role==2)    
        <strong>Organisateur</strong>
        @elseif($users->id_role==1)    
        <strong>Admin</strong>
        @endif
      </td>
      <td>
        
      @if(Auth::user()->id_role==1)
        @if($users->id_role==2 || $users->id_role==3)
        <a class="btn btn-warning" href="{{route('users.edit',$users->id)}}">
      Modifier
     </a> 
        @endif
      @elseif(Auth::user()->id_role==2)
        @if($users->id_role==3)
        <a class="btn btn-warning" href="{{route('users.edit',$users->id)}}">
      Modifier
     </a> 
        @endif
      @endif
      </td>
      <td>
      @if(Auth::user()->id_role==1)
        @if($users->id_role==2 || $users->id_role==3)
        <form action="{{route('users.destroy', ['user' => $users->id])}}" method="POST">
      @method('DELETE')
      @csrf
      <button type="submit" class="btn btn-info">Supprimer</button>
    </form>
        @endif
      @elseif(Auth::user()->id_role==2)
        @if($users->id_role==3)
        <form action="{{route('users.destroy', ['user' => $users->id])}}" method="POST">
      @method('DELETE')
      @csrf
      <button type="submit" class="btn btn-info">Supprimer</button>
    </form>
     
        @endif
        
      @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection



