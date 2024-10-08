<?php

namespace App\Http\Controllers;
use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IdeaController extends Controller
{
    public function index(){
        $ideas = DB::table('ideas')->get();
        return view('ideas.index',['ideas' => $ideas]);
    }
}
