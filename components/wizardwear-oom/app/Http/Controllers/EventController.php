<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Event::class);
    }

    public function index()
    {
        $events = Event::where('start', '>', Carbon::now())->get();
        return view('event.index', compact('events'));
    }

    public function show(Event $event)
    {
        return view('event.show', compact('event'))
    }
}
