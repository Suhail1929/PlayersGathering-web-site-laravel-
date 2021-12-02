@extends('template')
@section('title') Liste des utilisateurs @endsection
@section('rechercheBarre')
<div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" name="searchUsers" id="searchUsers" class="form-control" placeholder="Rechercher un utilisateurs..." />
            </div>
@endsection
@section('content')
   <div class="card-header pb-0">
              <h6>La liste des utilisateurs</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
              <div class="scrollit">
<table class="table align-items-center mb-0" >
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nom / Email</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Rôle</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date d'inscription</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  
                  <tbody class="tableusers" >
                  
                  @foreach($usersList as $users)
                  
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                          @if($users->id_role==1)  
                          <img src="https://cdn-icons-png.flaticon.com/512/109/109819.png" class="avatar avatar-sm me-3" >
                          @elseif($users->id_role==2)    
                          <img src="https://iconarchive.com/download/i91958/icons8/windows-8/Users-Administrator-2.ico" class="avatar avatar-sm me-3" >
                          @elseif($users->id_role==3)
                          <img src="http://simpleicon.com/wp-content/uploads/user1.png" class="avatar avatar-sm me-3" >
                          @endif

                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$users->name}}</h6>
                            <p class="text-xs text-secondary mb-0">
                            {{$users->email}}
                            </p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">
                        @if($users->id_role==3)  
                              <strong>Utlisateur</strong>
                              @elseif($users->id_role==2)    
                              <strong>Modérateur</strong>
                              @elseif($users->id_role==1)    
                              <strong>Admin</strong>
                              @endif
                        </p>
                        
                      </td>
                      <td >
                      <p class="text-xs font-weight-bold mb-0">{{strftime('%d/%m/%Y à %H:%M', strtotime($users->created_at))}}</p>        
                      </td>
                      <td class="align-middle">
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
                      <td class="align-middle">
                      @if(Auth::user()->id_role==1)
                        @if($users->id_role==2 || $users->id_role==3)
                        <form action="{{route('users.destroy', ['user' => $users->id])}}" method="POST">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                        @endif
                      @elseif(Auth::user()->id_role==2)
                        @if($users->id_role==3)
                        <form action="{{route('users.destroy', ['user' => $users->id])}}" method="POST">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                    
                        @endif
                        
                         @endif
                      </td>
                    </tr>
                    
                    @endforeach
                    
                    </tbody>
                    
                    </table>
                    </div>
</div>
</div>
<script>

$(document).ready(function(){

fetch_customer_data();

function fetch_customer_data(query = '')
{
 $.ajax({
  url:"{{ route('rechercheUsers') }}",
  method:'GET',
  data:{query:query},
  dataType:'json',
  success:function(data)
  {
   $('.tableusers').html(data.table_data);
   $('#total_records').text(data.total_data);
  }
 })
}

$(document).on('keyup', '#searchUsers', function(){
 var query = $(this).val();
 fetch_customer_data(query);
});
});
</script>

                  @endsection
