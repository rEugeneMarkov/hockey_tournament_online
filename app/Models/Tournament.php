<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;

    protected $table = 'tournaments';
    protected $guarded = false;

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_tournaments', 'tournament_id', 'user_id');
    }

    public function arenas()
    {
        return $this->hasMany(Arena::class);
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    public function teams()
    {
        return $this->hasManyThrough(Team::class, Group::class);
    }
}
