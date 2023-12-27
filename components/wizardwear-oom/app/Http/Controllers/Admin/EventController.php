<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Event::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();

        return view('admin.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'max_members' => 'nullable|integer',
            'start' => 'nullable|date',
            'end' => 'nullable|date'
        ]);

        $event = new Event;
        $event->name = $request->name;
        $event->description = $request->description;
        $event->max_members = $request->max_members;
        $event->start = $request->start;
        $event->end = $request->end;

        if ($event->save()) {
            return redirect()->route('admin.event.show', $event);
        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('admin.event.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('admin.event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Event $event, Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'max_members' => 'nullable|integer',
            'start' => 'nullable|date',
            'end' => 'nullable|date'
        ]);

        $event->name = $request->name;
        $event->description = $request->description;
        $event->max_members = $request->max_members;
        $event->start = $request->start;
        $event->end = $request->end;

        $event->save();

        return redirect()->route('admin.event.show', $event);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.event.index');
    }
}
