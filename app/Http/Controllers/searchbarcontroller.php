<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Events ;
use App\Models\User ;
class searchbarcontroller extends Controller
{ 
//Barre de recherche en utilisant ajax
  function action(Request $request)
  {
    if ($request->ajax()) {
      $output = '';
      $query = $request->get('query');
      if ($query != '') {
        $data = Events::
        where('title', 'like', '%' . $query . '%')
        ->orWhere('message', 'like', '%' . $query . '%')
        ->orWhere('game', 'like', '%' . $query . '%')
        ->orWhere('date', 'like', '%' . $query . '%')
        ->orderBy('date', 'desc')
        ->get();
      } 
      $total_row = $data->count();
      if ($total_row > 0) {
        foreach ($data as $row) {
          $output .= "
          <tr>
          <td>
          <div class='d-flex px-2 py-1'>
          <div>
          <img src='https://cdn2.iconfinder.com/data/icons/basic-ui-elements-16/117/gamepad-256.png' class='avatar avatar-sm me-3' alt='user1'>
          </div>
          <div class='d-flex flex-column justify-content-center'>
          <h6 class='mb-0 text-sm'>".$row->title."</h6>
          <p class='text-xs text-secondary mb-0'>".$row->user->name."</p>
          </div>
          </div>
          </td>
          <td>
          <p class='text-xs font-weight-bold mb-0'>".$row->game."</p>
          <p class='text-xs text-secondary mb-0'>".$row->NumP." participants</p>
          </td>
          <td class='align-middle text-center text-sm'>";
          if(strtotime($row->date)>time())
           $output .="<span class='badge badge-sm bg-gradient-success'>Disponible</span>";
         else 
           $output .=" <span class='badge badge-sm bg-gradient-secondary'>Indisponible</span>";
         $output .= "</td>
         <td class='align-middle text-center'>
         <span class='text-secondary text-xs font-weight-bold'>".strftime('%d/%m/%Y à %H:%M', strtotime($row->date))."</span>
         </td>
         <td class='align-middle'>
         <a href='".route('events.show', $row->id)."' class='text-secondary font-weight-bold text-xs' data-toggle='tooltip' data-original-title='Edit user'>
         Consulter
         </a>
         </td>
         </tr>
         ";
       }
     } else {
      $output = '
      <tr>
      <td align="center" colspan="5">Aucun événement trouvé.</td>
      </tr>
      ';
    }
    $data = array(
      'table_data'  => $output,
      'total_data'  => $total_row
    );
    echo json_encode($data);
  }
}
function actionUsers(Request $request)
{
  if ($request->ajax()) {
    $output = '';
    $query = $request->get('query');
    if ($query != '') {
      $data = User::
      where('name', 'like', '%' . $query . '%')
      ->orWhere('email', 'like', '%' . $query . '%')
      ->orWhere('created_at', 'like', '%' . $query . '%')
      ->orderBy('id_role', 'Asc')
      ->get();
    } 
    $total_row = $data->count();
    if ($total_row > 0) {
      foreach ($data as $row) {
        $output .= "
        
        <tr>
        <td>
        <div class='d-flex px-2 py-1'>
        <div>";
        if($row->id_role==1){  
          $output .= "<img src='https://cdn-icons-png.flaticon.com/512/109/109819.png' class='avatar avatar-sm me-3' >";
        }
        elseif($row->id_role==2){
          $output .= "<img src='https://iconarchive.com/download/i91958/icons8/windows-8/Users-Administrator-2.ico' class='avatar avatar-sm me-3' >";
        }
          elseif($row->id_role==3){
          $output .= "<img src='http://simpleicon.com/wp-content/uploads/user1.png' class='avatar avatar-sm me-3' >";
          }
        $output .= "
        </div>
        <div class='d-flex flex-column justify-content-center'>
        <h6 class='mb-0 text-sm'>".$row->name."</h6>
        <p class='text-xs text-secondary mb-0'>
        ".$row->email."
        </p>
        </div>
        </div>
        </td>
        <td>
        <p class='text-xs font-weight-bold mb-0'>";
        if($row->id_role==3){
          $output .= " <strong>Utlisateur</strong>";
        }
        elseif($row->id_role==2){
          $output .= " <strong>Modérateur</strong>";
        }
        elseif($row->id_role==1){
          $output .= "<strong>Admin</strong>";
        }
        $output .= "
        </p>
        
        </td>
        <td >
        <p class='text-xs font-weight-bold mb-0'>".strftime('%d/%m/%Y à %H:%M', strtotime($row->created_at))."</p>        
        </td>
        <td class='align-middle'>";
        if(Auth::user()->id_role==1){
          if($row->id_role==2 || $row->id_role==3){
            $output .= "<a class='btn btn-warning' href='".route('users.edit',$row->id)."'>
            Modifier
            </a>"; }
            
          }elseif(Auth::user()->id_role==2){
              if($row->id_role==3){
                $output .= "<a class='btn btn-warning' href='".route('users.edit',$row->id)."'>
                Modifier
                </a> ";
                  }
              }
            
            $output .= "</td>
            <td class='align-middle'>";
            if(Auth::user()->id_role==1)
            {
              if($row->id_role==2 || $row->id_role==3){
                $output .= "<form action='".route('users.destroy', ['user' => $row->id])."' method='POST'>
                " . method_field('DELETE') . "
                " . csrf_field() . "
                <button type='submit' class='btn btn-danger'>Supprimer</button>
                </form>";
              }
            }elseif(Auth::user()->id_role==2){
                if($row->id_role==3){
                  $output .= " <form action='".route('users.destroy', ['user' => $row->id])."'method='POST'>
                  " . method_field('DELETE') . "
                " . csrf_field() . "
                  <button type='submit' class='btn btn-danger'>Supprimer</button>
                  </form>";
                }
              }
            
              $output .= "</td>
              </tr>";
          } 
        }else {
            $output = '
            <tr>
            <td align="center" colspan="5">Aucun Utilisateur trouvé...</td>
            </tr>
            ';
          }
          $data = array(
            'table_data'  => $output,
            'total_data'  => $total_row
          );
          echo json_encode($data);
        }
      }

    }
