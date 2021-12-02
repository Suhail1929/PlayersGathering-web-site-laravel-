<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
Use DB;

class UsersGestionController extends Controller
{
    public function index()
    {   if(!Auth::check())
        { 
            return redirect('login');
        }
        $usersList = User::orderBy('id_role', 'Asc')->take(50)->get();
        return view('users.ListeUtilisateur', ['usersList' => $usersList]);
    }
    public function update(StoreUserRequest $request, User $user)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);
        $request->validated();
        $user->update($request->input());
        return redirect()->route('users', ['user' => $user]);
       
    }
    public function edit($id)
    {
    return view('users.updateuser', ['users' => User::findOrFail($id)]);
    }
    public function store(StoreUserRequest  $request)
    {   
     
       if(!Auth::check())
       { 
           return redirect('login');
       }
        $request->validated();
        $users = User::make($request->input()); 
        $users ->user()->associate(Auth::id()); $users->save();
        $users->save();
        return redirect()->route('users');

    }

    
    public function destroy($id)
    {
        if(!Auth::check())
       { 
           return redirect('login');
       }
        $users = User::findOrFail($id);
        $users->events->each->delete();
        $users->delete();
        return redirect()->route('users');
    }
}
