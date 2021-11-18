<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
Use DB;

class UsersGestionController extends Controller
{
    public function index()
    {
        $usersList = User::orderBy('id_role', 'desc')->take(50)->get();
        return view('users.ListeUtilisateur', ['usersList' => $usersList]);
    }
    public function update(StoreUserRequest $request, User $user)
    {
        dd("update");
        $request->validated();
        $user->update($request->input());
        return redirect()->route('users.show', ['user' => $user]);
       
    }
    public function edit($id)
    {
    return view('users.updateuser', ['users' => User::findOrFail($id)]);
    }
    public function store(StoreUserRequest  $request)
    {   
       dd("store");

        $request->validated();
        $users = User::make($request->input()); 
        $users ->user()->associate(Auth::id()); $users->save();
        $users->save();
         if(!Auth::check())
        { 
            return redirect('login');
        }
        return redirect()->route('users.list');

    }
    public function showlist()
    {
        return view('users.ListeUtilisateur');
    }
    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect()->route('users.index');
    }
}
