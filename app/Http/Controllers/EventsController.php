<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreEventsRequest;
use Illuminate\Http\Request;
use App\Models\Events;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventsList = Events::orderBy('date', 'desc')->take(10)->get();
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
        $events = Events::make($request->input()); // à la place de create 
        $events ->user()->associate(Auth::id()); $events->save();
        $events->save();
         if(!Auth::check())
        { 
            return redirect('login');
        }
        return redirect()->route('events.show', ['events' => $events]);


        /* $validated = $request->validate([
             'title' => ['required', 'max:100'],
             'message' => ['required'],
             'date' => ['required', 'date']
         ]);
        */
        /*
        $rules = [
            'title' => ['required', 'max:100'],
            'message' => ['required'],
            'date' => ['required', 'date']
        ];
        $msgs = [
            'title.required' => 'Il faut spécifier un titre',
            'title.max' => 'Le titre ne doit pas contenir plus de 100 caractères',
            'message.required' => 'Il faut spécifier un message',
            'date.required' => 'Il faut spécifier une date',
            'date.date' => 'Le format de la date est incorrect'
        ];

        $validated = $request->validate($rules, $msgs);
        */
        /*  $events = new events();
          $events->title = $request->title;
          $events->message = $request->message;
          $events->date = $request->date;
          $events->save();
          return redirect()->route('events.show', ['events' => $events]);
        */
        /*
        $events = events::create($request->input());
        $events->save();
        return redirect()->route('events.show', ['events' => $events]);
*/
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
        return view('events.edit', ['events' => Events::findOrFail($id)]);
        if(!Auth::check())
        { 
            return redirect('login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(StoreEventsRequest $request, Events $events)
    {
        $request->validated();
        $events->update($request->input());
        return redirect()->route('events.show', ['events' => $events]);
       
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
