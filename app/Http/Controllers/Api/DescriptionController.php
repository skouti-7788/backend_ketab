<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;    
use App\Models\Description;
use Illuminate\Http\Request;

class DescriptionController extends Controller
{
    // جيب description ديال livre
    public function show($livre_id)
    {
        $description = Description::where('livre_id', $livre_id)->first();

        if (!$description) {
            return response()->json(['message' => 'Aucune description trouvée'], 404);
        }

        return response()->json($description);
    }

    // زيد description
    public function store(Request $request)
    {
        $request->validate([
            'livre_id'    => 'required|exists:livres,id',
            'description' => 'required|string',
        ]);

        $description = Description::create([
            'livre_id'    => $request->livre_id,
            'description' => $request->description,
        ]);

        return response()->json($description, 201);
    }

    // بدل description
    public function update(Request $request, $id)
    {
        $description = Description::findOrFail($id);

        $request->validate([
            'description' => 'required|string',
        ]);

        $description->update(['description' => $request->description]);

        return response()->json($description);
    }

    // حيد description
    public function destroy($id)
    {
        Description::findOrFail($id)->delete();
        return response()->json(['message' => 'Supprimé avec succès']);
    }
}