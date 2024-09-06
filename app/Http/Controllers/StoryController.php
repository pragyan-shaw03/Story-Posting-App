<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function index()
    {
        $stories = Story::all();
        return view('index', compact('stories'));
    }

    // Show the form for creating a new story
    public function create()
    {
        return view('create');
    }

    // Store a newly created story in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        Story::create($validatedData);
        return redirect('/stories')->with('success', 'Story posted!');
    }

    // Display a specific story
    public function show($id)
    {
        $story = Story::findOrFail($id);
        return view('show', compact('story'));
    }

    // Show the form for editing a story
    public function edit($id)
    {
        $story = Story::findOrFail($id);
        return view('edit', compact('story'));
    }

    // Update the story in the database
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        Story::whereId($id)->update($validatedData);
        return redirect('/stories')->with('success', 'Story updated!');
    }

    // Delete the story from the database
    public function destroy($id)
    {
        $story = Story::findOrFail($id);
        $story->delete();
        return redirect('/stories')->with('success', 'Story deleted!');
    }
}
