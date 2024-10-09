<?php

namespace App\Http\Controllers;
use App\Models\Idea;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;


class IdeaController extends Controller
{
    public function index(): View
    {
        $ideas = Idea::get();// DB::table('ideas')->get();
        return view('ideas.index',['ideas' => $ideas]);
    }

    public function create(): View
    {
        return view('ideas.create_edit');
    }

    public function store(Request $request): RedirectResponse
    {
        //dd($request->all());
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:300'
        ]);

        Idea::create([
            'user_id' => $request->user()->id, //auth()->user()->id,
            'title' => $validated['title'],
            'description' => $validated['description'],
        ]);

        return redirect()->route('idea.index');
    }

    public function edit(Idea $idea): View
    {
        //$idea = Idea::findOrFail($id);
        return view('ideas.create_edit')->with('idea', $idea);
    }
}
