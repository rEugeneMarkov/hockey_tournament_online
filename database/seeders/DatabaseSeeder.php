<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Team;
use App\Models\Arena;
use App\Models\Group;
use App\Models\Tournament;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = \App\Models\User::factory()->create();

        $tournaments = Tournament::factory(5)->create();

        foreach ($tournaments as $tournament) {
            $usersIds = $users->pluck('id');
            $tournament->users()->attach($usersIds);
        }
        Arena::factory(10)->create();
        Group::factory(15)->create();
        Team::factory(50)->create();
    }
}
