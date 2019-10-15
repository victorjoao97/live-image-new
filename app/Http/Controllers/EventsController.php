<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\EventRequest;
use App\PrivacyEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Event $events)
    {
        $trashed = false;
        if ($request->has('deleted')) {
            $events = $events::withTrashed()->where('user_id', Auth::id())->paginate(5);
            $trashed = 'hidden';
        } else {
            $deleted = $events::onlyTrashed()->where('user_id', Auth::id())->count();
            $trashed = $deleted ? 'view' : false;
            $events = $events::where('user_id', Auth::id())->paginate(5);
        }

        return view('events.all', compact('events', 'trashed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Event $events
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::where('user_id', Auth::id())->where('id', $id)->firstOrFail();

        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Event $events
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::where('user_id', Auth::id())->where('id', $id)->firstOrFail();
        $privacy = PrivacyEvent::all();
        return view('events.edit', compact('event', 'privacy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Event $events
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request)
    {
        Event::where('user_id', Auth::id())->where('id', $request->id)->update($request->except(['_token', 'id']));
        flash('Evento atualizado com sucesso!')->success();
        return redirect()->route('admin.event_show', ['id' => $request->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Event $events
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventRequest $request)
    {
        Event::destroy($request->id);
        flash('Excluido com sucesso!')->success();
        return redirect()->route('admin.events');
    }

    public function destroyPerm(EventRequest $request)
    {
        Event::withTrashed()
            ->where('user_id', Auth::id())->where('id', $request->id)
            ->forceDelete();
        flash('Excluido permanentemente!')->success();
        return redirect()->route('admin.events');
    }

    public function restore(EventRequest $request)
    {
        Event::withTrashed()
            ->where('user_id', Auth::id())->where('id', $request->id)
            ->restore();
        flash('Restaurado com sucesso!')->success();
        return redirect()->route('admin.events');
    }
}
