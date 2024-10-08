<?php

namespace App\Http\Controllers;
use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class IdeaController extends Controller
{
    public function index(): View
    {
        $ideas = DB::table('ideas')->get();
        return view('ideas.index',['ideas' => $ideas]);
    }

    public function create(): View
    {
        return view('ideas.create');
    }
}
