<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// ✅ IMPORTS OBLIGATOIRES
use App\Models\Choice;
use App\Http\Requests\StoreChoiceRequest;

class ChoiceController extends Controller
{
    // GET /api/choices
    public function index()
    {
        return Choice::all();
    }

    // POST /api/choices
    public function store(StoreChoiceRequest $request)
    {
        $choice = Choice::create($request->validated());
        return response()->json($choice, 201);
    }

    public function show(string $id)
    {
        $choice = Choice::findOrFail($id);
        return response()->json($choice);
    }

    public function update(Request $request, string $id)
    {
        $choice = Choice::findOrFail($id);
        $choice->update($request->all());
        return response()->json($choice);
    }

    public function destroy(string $id)
    {
        $choice = Choice::findOrFail($id);
        $choice->delete();
        return response()->json(['message' => 'Choix supprimé']);
    }
}
