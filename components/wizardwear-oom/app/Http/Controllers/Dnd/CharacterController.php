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
        $houses = [
            'gryffindor' => 'Gryffindor',
            'hufflepuff' => 'Hufflepuff',
            'ravenclaw' => 'Ravenclaw',
            'slytherin' => 'Slytherin'
        ];
        return view('dnd.character.create', compact('houses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'house' => 'required|string'
        ]);

        $character = new DndCharacter;
        $character->user_id = Auth::id();
        $character->name = $request->name;
        $character->house = $request->house;

        $character->save();

        return redirect()->route('dndCharacter.index');
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
