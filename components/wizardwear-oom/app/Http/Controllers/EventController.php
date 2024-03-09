<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $items = Auth::user()->items;
        return view('event.show', compact('event', 'items'));
    }
}
