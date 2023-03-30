<?php

namespace App\Http\Controllers\Admin\Tournament;

use App\Models\Team;
use App\Models\Tournament;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tournament\Team\StoreRequest;
use App\Http\Requests\Tournament\Team\UpdateRequest;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Tournament $tournament)
    {
        $groups = $tournament->groups;
        return view('admin.tournament.team.index', compact('tournament', 'groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Tournament $tournament)
    {
        return view('admin.tournament.team.create', compact('tournament'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request, Tournament $tournament)
    {
        $data = $request->validated();
        if (isset($data['player_ids'])) {
            $playerIds = $data['player_ids'];
            unset($data['player_ids']);
        }
        $team = Team::firstOrCreate($data);

        if (isset($playerIds)) {
            $team->players()->attach($playerIds);
        }
        return redirect()->route('admin.tournament.team.index', compact('tournament'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Tournament $tournament, Team $team)
    {
        //$tournament = Tournament::where('id', '=', $team->tournament_id)->get();
        //dd($tournament);
        return view('admin.tournament.team.show', compact('tournament', 'team'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tournament $tournament, Team $team)
    {
        //$players = Player::all();
        //$tournaments = Tournament::all();
        return view('admin.tournament.team.edit', compact('team', 'tournament'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Tournament $tournament, Team $team)
    {
        $data = $request->validated();
        //$playerIds = $data['player_ids'];
        //unset($data['player_ids']);
        unset($data['team_id']);
        //$team->players()->sync($playerIds);
        $team->update($data);

        return view('admin.tournament.team.show', compact('tournament', 'team'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tournament $tournament, Team $team)
    {
        //$team->players()->detach();
        $team->delete();
        return redirect()->route('admin.tournament.team.index', compact('tournament'));
    }
}
