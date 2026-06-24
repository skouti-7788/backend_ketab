<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Emprunts;
use Illuminate\Http\Request;
use Carbon\Carbon;
class EmpruntsController extends Controller
{
    public function index()
    {
        $emprunts = Emprunts::all();
        return response()->json($emprunts);
    }
   public function ajouter(Request $request)
   {
 
    $validated = $request->validate([
        // 'livre' => 'required ',
        'livre_id' => 'nullable|integer|exists:livres,id',
        'date_emprunt' => 'required|date',
        'date_retour_prevue' => 'required|date',
        'date_retour_effective' => 'nullable|date',
        'status' => 'nullable|string',
        'retard'=> 'nullable|string',
        'user_id' => 'nullable|integer|exists:users,id'

    ]);
    $emprunts =  Emprunts::create($validated);
    return response()->json($emprunts, 201);
    }
   public function modify(Request $request, $id)
   {
    $emprunts = Emprunts::findOrFail($id);

    //  Validation
    $data = $request->validate([
        'livre_id' => 'required|integer|exists:livres,id',
        'user_id' => 'required|integer|exists:users,id',
        'date_emprunt' => 'required|date',
        'date_retour_prevue' => 'required|date',
        'date_retour_effective' => 'nullable|date',
        'status' => 'nullable|string',
        'retard'=> 'nullable|integer',
    ]);
    
    //  Update
    $emprunts->update($data);

    return response()->json($emprunts, 200);
   }
    // public function checkdate(Request $request)
    // {

    // $validated = $request->validate([
    //     'id' => 'required|exists:emprunts,id',
    //     'date_retour_prevue' => 'required|date',
    //     'date_emprunt'=> 'required|date',
    //     'status'  => 'nullable|string'
    //     // 'adherent_id' => 'nullable|integer|exists:adherents,id'

         
    //     // 'retard' => 'required|string'
    // ]);
    // $emprunts = Emprunts::findOrFail($validated['id']);
    // $datePrevue = Carbon::parse($validated['date_retour_prevue'])->startOfDay();
    // $now = Carbon::now()->startOfDay();
     
    // // 1. Détermination du statut
    // if(isset($validated['status'])) {
    //     $status = $validated['status'];
    // } else {
    //     $status = $now->gt($datePrevue)?
    //               "retard" : ($now->isSameDay($datePrevue)?
    //                "Retourner" :($now->lt($datePrevue)?"active":$emprunts->status));
    // }
   
    // $retard = $now->gt($datePrevue) ? (int)$now->diffInDays($datePrevue) : 0;
    // $emprunts->update([
    //     'status' => $status,
    //     'retard' => $retard,
    //     'date_retour_effective' => $emprunts->status == "Retourner"? $now:null
    // ]);
    // // dd($status,$retard);
    // return response()->json([
    //     'status'  => $emprunts->status,
    //     'retard'  => $emprunts->retard,
    //     'id' => $emprunts->id,
    //     'date_retour_effective' => $emprunts->status == "Retourner"? $now:null,
    //     'message' => 'Statut mis à jour avec succès',
    // ]);
    // }
    public function checkdate(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:emprunts,id',
            'date_retour_prevue' => 'required|date',
            'date_emprunt'=> 'required|date',
            'status'  => 'nullable|in:active,retard,Retourner'
            // 'adherent_id' => 'nullable|integer|exists:adherents,id'

        ]);

        $emprunts = Emprunts::findOrFail($validated['id']);

        $datePrevue = Carbon::parse($validated['date_retour_prevue'])->startOfDay();
        $now = Carbon::now()->startOfDay();

      
        if (isset($validated['status'])) {
            $status = $validated['status'];
        } else {
            if ($emprunts->status === "Retourner") {
                $status = "Retourner";
            } elseif ($now->gt($datePrevue)) {
                $status = "retard";
            } elseif ($now->isSameDay($datePrevue)) {
                $status = "Retourner"; // يوم الإرجاع
            } else {
                $status = "active";
            }
        }

        
        $retard = $now->gt($datePrevue)
            ? (int) $now->diffInDays($datePrevue)
            : 0;

         
        $dateRetourEffective = $status == "Retourner" && !$emprunts->date_retour_effective
            ? $now
            : $emprunts->date_retour_effective;

      
        $emprunts->update([
            'status' => $status,
            'retard' => $retard,
            'date_retour_effective' => $dateRetourEffective
        ]);

        return response()->json([
            'id' => $emprunts->id,
            'status' => $status,
            'retard' => $retard,
            'date_retour_effective' => $dateRetourEffective,
            'message' => 'Statut mis à jour avec succès'
        ]);
    }
    public function delete($id)
    {
        $emprunts = Emprunts::findOrFail($id);
        $emprunts->delete();
        return response()->json(null, 204);
    }               
}
