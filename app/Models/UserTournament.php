<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTournament extends Model
{
    use HasFactory;

    protected $table = 'user_tournaments';
    protected $guarded = false;
}
