<?php

namespace App\Http\Controllers\Admin\Tournament;

use App\Models\Tournament;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index(Tournament $tournament)
    {
        return view('admin.tournament.index', compact('tournament'));
    }
}
