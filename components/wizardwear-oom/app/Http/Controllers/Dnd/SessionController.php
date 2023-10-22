<?php

namespace App\Http\Controllers\Dnd;

use App\Http\Controllers\Controller;
use App\Models\DndSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(DndSession::class, 'session');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sessions = Auth::user()->dndSessions;
        return view('dnd.session.index', compact('sessions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(DndSession $session)
    {
        return view('dnd.session.show', compact('session'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DndSession $session)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DndSession $session)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DndSession $session)
    {
        //
    }
}
