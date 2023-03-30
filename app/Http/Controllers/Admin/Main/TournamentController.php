<?php

namespace App\Http\Controllers\Admin\Main;

use App\Models\Tournament;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tournament\StoreRequest;
use App\Http\Requests\Admin\Tournament\UpdateRequest;

class TournamentController extends Controller
{
    public const CLASSES = [
        'U-8', 'U-9', 'U-10', 'U-11', 'U-12', 'U-13', 'U-14', 'U-15', 'U-16', 'U-17', 'U-18',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tournaments = auth()->user()->tournaments;
        return view('admin.main.tournament.index', compact('tournaments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = self::CLASSES;
        return view('admin.main.tournament.create', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $tournament = Tournament::firstOrCreate($data);
        $userId = auth()->user()->id;
        $tournament->users()->attach($userId);
        return redirect()->route('admin.main.tournament.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tournament $tournament)
    {
        foreach ($tournament->users as $user) {
            if ($user->id == auth()->user()->id) {
                return view('admin.main.tournament.show', compact('tournament'));
            } else {
                $abort = true;
            }
        }
        if ($abort == true) {
            return redirect()->route('admin.main.tournament.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tournament $tournament)
    {
        foreach ($tournament->users as $user) {
            if ($user->id == auth()->user()->id) {
                $classes = self::CLASSES;
                return view('admin.main.tournament.edit', compact('tournament', 'classes'));
            } else {
                $abort = true;
            }
        }
        if ($abort == true) {
            return redirect()->route('admin.main.tournament.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Tournament $tournament)
    {
        $data = $request->validated();
        $tournament->update($data);

        return view('admin.main.tournament.show', compact('tournament'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tournament $tournament)
    {
        // foreach ($tournament->groups as $group) {
        //     foreach ($group->games as $game) {
        //         $game->delete();
        //     }
        //     foreach ($group->teams as $team) {
        //         $team->players()->detach();
        //         $team->delete();
        //     }
        //     $group->delete();
        // }
        $tournament->users()->detach();
        $tournament->delete();
        return redirect()->route('admin.main.tournament.index');
    }
}
