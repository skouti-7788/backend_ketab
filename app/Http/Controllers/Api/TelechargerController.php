<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Telecharger;
use Illuminate\Http\Request;

class TelechargerController extends Controller
{
    public function index()
    {
        return response()->json(Telecharger::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            // 'adherent_id' => 'nullable|integer|exists:adherents,id',
            'livre_id' => 'required|integer|exists:livres,id',
            // 'fichier' => 'nullable|string|max:255',
            // 'format' => 'nullable|string|max:50',
            'date_telechargement' => 'required|date',
            // 'download_count' => 'nullable|integer|min:1',
            'status' => 'nullable|string',
        ]);

        if (!isset($validated['download_count'])) {
            $validated['download_count'] = 1;
        }

        $telecharger = Telecharger::create($validated);

        return response()->json($telecharger, 201);
    }

    public function update(Request $request, $id)
    {
        $telecharger = Telecharger::findOrFail($id);

        $data = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            // 'adherent_id' => 'nullable|integer|exists:adherents,id',
            'livre_id' => 'required|integer|exists:livres,id',
            // 'fichier' => 'nullable|string|max:255',
            // 'format' => 'nullable|string|max:50',
            'date_telechargement' => 'required|date',
            // 'download_count' => 'nullable|integer|min:1',
            'status' => 'nullable|string',
        ]);

        $telecharger->update($data);

        return response()->json($telecharger, 200);
    }

    public function destroy($id)
    {
        $telecharger = Telecharger::findOrFail($id);
        $telecharger->delete();

        return response()->json(null, 204);
    }
}
