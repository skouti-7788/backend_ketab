<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Showlivres;
use App\Models\Livres;
use Illuminate\Http\Request;

class ShowlivresController extends Controller
{
    public function index()
    {
        $showlivres = Showlivres::all();
        return response()->json([
            'showlivres' => $showlivres
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'livre_id' => 'required|integer|exists:livres,id',
        ]);

        // 1. Vérifier si l'utilisateur a DÉJÀ lu ce livre précis
        $alreadyViewed = Showlivres::where('user_id', $request->user_id)
                                   ->where('livre_id', $request->livre_id)
                                   ->exists();

        // 2. Si oui, on ne fait rien (Pas d'incrémentation, pas d'insertion)
        if ($alreadyViewed) {
            return response()->json(['message' => 'Already viewed'], 200);
        }

        // 3. Si non, on incrémente le compteur du livre
        $livre = Livres::find($request->livre_id);
        if ($livre) {
            $livre->increment('showLiver'); // increment() est plus sûr et rapide que update
        }

        // 4. On crée la relation dans la table pivot
        Showlivres::create([
            'user_id' => $request->user_id,
            'livre_id' => $request->livre_id,
        ]);

        return response()->json(['message' => 'Added to showlivres'], 201);
    }

    public function check(Request $request)
    {   
        $request->validate([
            'user_id' => 'required|integer',
            'livre_id' => 'required|integer',
        ]);

        $exists = Showlivres::where('user_id', $request->user_id)
                            ->where('livre_id', $request->livre_id)
                            ->exists();
        
        return response()->json(['showlivre' => $exists ? 1 : 0]);
    }
}