<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Http\Requests\StoreChapterRequest;

class ChapterController extends Controller
{
    // GET /api/chapters
    public function index()
    {
        return Chapter::with('choices')->get();
    }

    // POST /api/chapters (protégé par Sanctum)
    public function store(StoreChapterRequest $request)
    {
        $chapter = Chapter::create($request->validated());
        return response()->json($chapter, 201);
    }

    // GET /api/chapters/{id}
    public function show(string $id)
    {
        $chapter = Chapter::with('choices')->findOrFail($id);
        return response()->json($chapter);
    }

    // PUT /api/chapters/{id}
    public function update(Request $request, string $id)
    {
        $chapter = Chapter::findOrFail($id);
        $chapter->update($request->all());
        return response()->json($chapter);
    }

    // DELETE /api/chapters/{id}
    public function destroy(string $id)
    {
        $chapter = Chapter::findOrFail($id);
        $chapter->delete();
        return response()->json(['message' => 'Chapitre supprimé']);
    }
}
