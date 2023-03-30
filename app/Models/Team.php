<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = 'teams';
    protected $guarded = false;

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function tournament()
    {
        return $this->hasOneThrough(Tournament::class, Group::class);
    }
}
