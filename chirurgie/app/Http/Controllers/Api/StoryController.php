<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Story;
use App\Http\Requests\StoreStoryRequest;

class StoryController extends Controller
{
    // ✅ GET /api/stories - avec chapitres et choix inclus
    public function index()
    {
        return Story::with('chapters.choices')->get();
    }

    // ✅ POST /api/stories
    public function store(StoreStoryRequest $request)
    {
        $story = Story::create($request->validated());
        return response()->json($story, 201);
    }

    // ✅ GET /api/stories/{id}
    public function show(string $id)
    {
        $story = Story::with('chapters.choices')->findOrFail($id);
        return response()->json($story);
    }

    // ✅ PUT /api/stories/{id}
    public function update(Request $request, string $id)
    {
        $story = Story::findOrFail($id);
        $story->update($request->all());
        return response()->json($story);
    }

    // ✅ DELETE /api/stories/{id}
    public function destroy(string $id)
    {
        $story = Story::findOrFail($id);
        $story->delete();
        return response()->json(['message' => 'Story supprimée']);
    }
}
