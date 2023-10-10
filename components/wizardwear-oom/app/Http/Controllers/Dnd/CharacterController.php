<?php

namespace App\Http\Controllers\Dnd;

use App\Http\Controllers\Controller;
use App\Models\DndCharacter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CharacterController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(DndCharacter::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $characters = DndCharacter::where('user_id', Auth::id())->get();
        return view('dnd.character.index', compact('characters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DndCharacter $dndCharacter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DndCharacter $dndCharacter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DndCharacter $dndCharacter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DndCharacter $dndCharacter)
    {
        //
    }
}
