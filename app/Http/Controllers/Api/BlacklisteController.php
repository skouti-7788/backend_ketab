<?php

namespace App\Http\Controllers;

use App\Models\Blackliste;
use Illuminate\Http\Request;
use App\Models\Adherents;
use App\Models\Emprunts;

class BlacklisteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blacklistes = Blackliste::with(['emprunt', 'adherent'])->get();
        return response()->json($blacklistes, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'emprunt_id'  => 'required|integer|exists:emprunts,id',   // FIX: int → integer
            'adherent_id' => 'required|integer|exists:adherents,id',  // FIX: int → integer
            'status'      => 'sometimes|in:Bloqué,Levé',
        ]);

        $blackliste = Blackliste::create($validated);

        return response()->json([
            'message' => 'Membre ajouté à la liste noire avec succès',
            'data'    => $blackliste->load(['emprunt', 'adherent'])
        ], 201);
    }

    /**
     * Vérifie si un adhérent est dans la liste noire.
     * GET /blackliste/check?adherent_id=X
     */
    public function check(Request $request)
    {
        // FIX: on vérifie par adherent_id uniquement (pas besoin de id ou emprunt_id)
        $validated = $request->validate([
            'adherent_id' => 'required|integer|exists:adherents,id',
        ]);

        // FIX: Adherents::where() avait oublié le nom de la colonne
        $adherent = Adherents::find($validated['adherent_id']);

        // FIX: on cherche si cet adhérent est blacklisté (status Bloqué)
        $blackliste = Blackliste::where('adherent_id', $validated['adherent_id'])
                                ->where('status', 'Bloqué')
                                ->with(['emprunt', 'adherent'])
                                ->first();

        // FIX: on vérifie aussi s'il a des emprunts en retard
        $empruntsEnRetard = Emprunts::where('adherent_id', $validated['adherent_id'])
                                    ->where('status', 'retard')
                                    ->get();

        if ($blackliste) {
            return response()->json([
                'blocked'          => true,
                'message'          => 'Cet adhérent est dans la liste noire',
                'data'             => $blackliste,
                'emprunts_retard'  => $empruntsEnRetard,
            ], 200);
        }

        return response()->json([
            'blocked'         => false,
            'message'         => "Cet adhérent n'est pas dans la liste noire",
            'emprunts_retard' => $empruntsEnRetard,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $blackliste = Blackliste::findOrFail($id);

        $validated = $request->validate([
            'emprunt_id'  => 'sometimes|required|integer|exists:emprunts,id',   // FIX: int → integer
            'adherent_id' => 'sometimes|required|integer|exists:adherents,id',  // FIX: int → integer
            'status'      => 'sometimes|in:Bloqué,Levé',
        ]);

        $blackliste->update($validated);

        return response()->json([
            'message' => 'Membre modifié avec succès',
            'data'    => $blackliste->load(['emprunt', 'adherent'])
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $blackliste = Blackliste::findOrFail($id);
        $blackliste->delete();

        return response()->json([
            'message' => 'Membre supprimé de la liste noire avec succès'
        ], 200);
    }
}