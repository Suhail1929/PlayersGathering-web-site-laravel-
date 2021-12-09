<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Membre;
use App\Models\Events;
use Illuminate\Support\Facades\Gate;


class MembreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $event = Events::findOrFail($request->input('events_id'));
        if(!Gate::allows('Utilisateur', $event)){
            abort('403');
        }
        return view('membre.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::check())
        { 
            return redirect('login');
        }
        return view('membre.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated=$request->validate([
            'nom'=>['required', 'max:100'],
            'prenom'=>['required', 'max:100'],
            'mail'=>['required', 'max:100'],
            'jeupref'=>['required', 'max:100'],
            'description'=>['required'],
            'datenaissance'=>['required', 'date']
        ]);

        $events = Events::findOrFail($request->input('events_id'));
        $members = Membre::create($request->input());
        $members->events()->associate($events);
        $members->save();
        $members ->user()->associate(Auth::id());
        $members->save();

        if(!Auth::check())
        {
            return redirect('login');
        }
        return view('membre.valid');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('membre.show', ['membre' => Membre::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $membre = Membre::findOrFail($id);
        $membre->delete();
        return redirect()->route('events.index');
    }
}
