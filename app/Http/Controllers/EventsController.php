<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreEventsRequest;
use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventsList = Events::orderBy('date', 'desc')->take(50)->get();
        return view('events.list', ['eventsList' => $eventsList]);
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
        return view('events.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventsRequest  $request)
    {   
       

        $request->validated();
        $events = Events::make($request->input()); 
        $events ->user()->associate(Auth::id()); $events->save();
        $events->save();
         if(!Auth::check())
        { 
            return redirect('login');
        }
        return redirect()->route('events.show', ['event' => $events]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('events.show', ['events' => Events::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        if(!Auth::check())
        { 
            return redirect('login');
        }
        $event=Events::findOrFail($id);
    if(!Gate::allows('Utilisateur', $event)){ 
        abort('403');
    }
    return view('events.edit', ['events' => Events::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(StoreEventsRequest $request, Events $event)
    {
        $request->validated();
        $event->update($request->input());
        return redirect()->route('events.show', ['event' => $event]);
       
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $events = Events::findOrFail($id);
        $events->delete();
        return redirect()->route('events.index');
    }
   
    
    
}
