<?php

namespace App\Http\Controllers\Admin\Tournament;

use App\Models\Group;
use App\Models\Tournament;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tournament\Group\StoreRequest;
use App\Http\Requests\Tournament\Group\UpdateRequest;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Tournament $tournament)
    {
        $groups = $tournament->groups;
        return view('admin.tournament.group.index', compact('tournament', 'groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Tournament $tournament)
    {
        return view('admin.tournament.group.create', compact('tournament'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request, Tournament $tournament)
    {
        $data = $request->validated();
        $data['tournament_id'] = $tournament->id;
        Group::firstOrCreate($data);
        return redirect()->route('admin.tournament.group.index', $tournament->title);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tournament $tournament, Group $group)
    {
        return view('admin.tournament.group.show', compact('tournament', 'group'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tournament $tournament, Group $group)
    {
        return view('admin.tournament.group.edit', compact('tournament', 'group'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Tournament $tournament, Group $group)
    {
        $data = $request->validated();
        $data['tournament_id'] = $tournament->id;
        $group->update($data);
        return redirect()->route('admin.tournament.group.index', $tournament->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tournament $tournament, Group $group)
    {
        $group->delete();
        return redirect()->route('admin.tournament.group.index', $tournament->id);
    }
}
