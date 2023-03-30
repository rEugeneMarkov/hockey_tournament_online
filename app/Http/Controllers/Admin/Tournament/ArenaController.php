<?php

namespace App\Http\Controllers\Admin\Tournament;

use App\Models\Arena;
use App\Models\Tournament;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tournament\Arena\StoreRequest;
use App\Http\Requests\Tournament\Arena\UpdateRequest;

class ArenaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Tournament $tournament)
    {
        $arenas = $tournament->arenas;
        return view('admin.tournament.arena.index', compact('tournament', 'arenas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Tournament $tournament)
    {
        return view('admin.tournament.arena.create', compact('tournament'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request, Tournament $tournament)
    {
        $data = $request->validated();
        $data['tournament_id'] = $tournament->id;
        Arena::firstOrCreate($data);
        return redirect()->route('admin.tournament.arena.index', $tournament->title);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tournament $tournament, Arena $arena)
    {
        return view('admin.tournament.arena.show', compact('tournament', 'arena'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tournament $tournament, Arena $arena)
    {
        return view('admin.tournament.arena.edit', compact('tournament', 'arena'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Tournament $tournament, Arena $arena)
    {
        $data = $request->validated();
        $data['tournament_id'] = $tournament->id;
        $arena->update($data);
        return redirect()->route('admin.tournament.arena.index', $tournament->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tournament $tournament, Arena $arena)
    {
        $arena->delete();
        return redirect()->route('admin.tournament.arena.index', $tournament->id);
    }
}
