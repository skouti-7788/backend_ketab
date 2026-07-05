<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Acheter;
use App\Models\Livres;
use Illuminate\Http\Request;

class AcheterController extends Controller
{
    /**
     * Récupérer tous les achats
     */
    public function index()
    {
        return response()->json(Acheter::all());
        // return response()->json(Acheter::with(['user', 'livre'])->get());
    }

    /**
     * Créer un nouvel achat avec logique différente selon le type de livre
     * 
     * LOGIQUE :
     * - LIVRE PDF : vérifier les demandes existantes et gérer les statuts
     * - LIVRE PHYSIQUE : créer une demande normale
     */
    // public function store(Request $request)
    // {
    //     // Validation de base
    //     $validated = $request->validate([
    //         'user_id' => 'nullable|integer|exists:users,id',
    //         'livre_id' => 'required|integer|exists:livres,id',
    //         'date_achat' => 'required|date',

    //         'status'      =>'nullable',
    //         'status_paye' =>'nullable',
    //         'type_livre'   =>'nullable'
    //     ]);

    //     // Récupérer le livre pour déterminer son type
    //     $livre = Livres::findOrFail($validated['livre_id']);

    //     // Déterminer le type de livre : PDF si pdf_url existe, sinon physique
    //     $isPDF = !empty($livre->pdf_url);

    //     // ========== LOGIQUE POUR LIVRE PDF ==========
    //     if ($isPDF) {
    //         return $this->handlePDFBook($validated);
    //     }

    //     // ========== LOGIQUE POUR LIVRE PHYSIQUE ==========
    //     return $this->handlePhysicalBook($validated);
    // }

    // /**
    //  * Gérer l'achat d'un LIVRE PDF
    //  * 
    //  * Logique :
    //  * 1. Vérifier si une demande existe pour ce user + livre
    //  * 2. Si aucune : créer nouvelle demande
    //  * 3. Si existence : vérifier le status_paye
    //  *    - "La demande est incomplète" => déjà en cours
    //  *    - "Le paiement a été annulé" => réactiver
    //  *    - "Paiement validé" => déjà acheté
    //  */
    // private function handlePDFBook($validated)
    // {
    //     $userId = $validated['user_id'];
    //     $livreId = $validated['livre_id'];
    //     $dateAchat = $validated['date_achat'];

    //     // Chercher une demande existante pour ce user + livre
    //     $existingAchat = Acheter::where('user_id', $userId)
    //         ->where('livre_id', $livreId)
    //         ->first();
    //     $existinguser = Acheter::where('user_id', $userId)
    //         ->first();
    //     // dd($existingAchat);
    //     // Cas 1 : Aucune demande n'existe
    //     if($existinguser != null){
    //     if (!$existingAchat) {
            
    //         $acheter = Acheter::create([
    //             'user_id' => $userId,
    //             'livre_id' => $livreId,
    //             'date_achat' => $dateAchat,
    //             'status' => 'Livre PDF',
    //             'status_paye' => 'La demande est incomplète',
    //         ]);

    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Demande créée avec succès',
    //             'achat' => $acheter,
    //         ], 201);
    //     }

    //     // Cas 2 : Une demande existe - vérifier le status_paye
    //     $statusPaye = $existingAchat->status_paye;

    //     // Cas 2a : Demande déjà en cours
    //     if ($statusPaye === 'La demande est incomplète') {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Votre demande est déjà en cours',
    //             'achat' => $existingAchat,
    //         ], 409); // 409 Conflict
    //     }

    //     // Cas 2b : Paiement annulé - réactiver la demande
    //     if ($statusPaye === 'Le paiement a été annulé') {
    //         $existingAchat->update([
    //             'status_paye' => 'La demande est incomplète',
    //             'date_achat' => $dateAchat,
    //         ]);

    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Votre demande a été réactivée',
    //             'achat' => $existingAchat,
    //         ], 200);
    //     }

    //     // Cas 2c : Livre déjà acheté
    //     if ($statusPaye === 'Paiement validé') {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Vous avez déjà acheté ce livre',
    //             'achat' => $existingAchat,
    //         ], 403); // 403 Forbidden
    //     }
        
    //     // Cas par défaut (statut inconnu)
    //     return response()->json([
    //         'success' => false,
    //         'message' => 'Statut inconnu pour cette demande',
    //         'achat' => $existingAchat,
    //     ], 400);}
    // }

    /**
     * Gérer l'achat d'un LIVRE PHYSIQUE
     * 
     * Logique simple :
     * 1. Créer une demande normale
     * 2. Status = "Livre Physique"
     * 3. Status_paye = "En attente" (en attente d'acceptation admin)
     */
    // private function handlePhysicalBook($validated)
    // {
    //     $acheter = Acheter::create([
    //         'user_id' => $validated['user_id'],
    //         'livre_id' => $validated['livre_id'],
    //         'date_achat' => $validated['date_achat'],
    //         'status' => 'Livre Physique',
    //         'status_paye' => 'En attente',
    //     ]);

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Demande de livre physique créée en attente d\'acceptation',
    //         'achat' => $acheter,
    //     ], 201);
    // }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id'     => 'nullable|integer|exists:users,id',
            'livre_id'    => 'required|integer|exists:livres,id',
            'date_achat'  => 'required|date',
            'status'      => 'nullable',
            'status_paye' => 'nullable',
            'type_livre'  => 'nullable',
        ]);
        // dd($validated['status']);
        // ── Si user_id est null : demande anonyme/physique directe ──
        if (empty($validated['user_id'])) {
            $acheter = Acheter::create([
                'user_id'     => null,
                'livre_id'    => $validated['livre_id'],
                'date_achat'  => $validated['date_achat'],
                'status'      => 'Livre Physique',
                'status_paye' => 'La demande est complète',
            ]);
 
            return response()->json([
                'success' => true,
                'message' => 'Demande créée avec succès',
                'achat'   => $acheter,
            ], 201);
        }
 
        // ── user_id présent : déterminer le type du livre ──
        // $livre = Livres::findOrFail($validated['livre_id']);
        // $isPDF = !empty($livre->pdf_url);
 
        if (($validated['status'] ?? '') === 'Livre PDF') {

            return $this->handlePDFBook($validated);
        }
 
        return $this->handlePhysicalBook($validated);
    }
 
    private function handlePDFBook($validated)
    {
        $userId   = $validated['user_id'];
        $livreId  = $validated['livre_id'];
        $dateAchat = $validated['date_achat'];
 
        $existingAchat = Acheter::where('user_id', $userId)
            ->where('livre_id', $livreId)
            ->first();
 
        // Cas 1 : Aucune demande n'existe pour ce user + ce livre
        if (!$existingAchat) {
            $acheter = Acheter::create([
                'user_id'     => $userId,
                'livre_id'    => $livreId,
                'date_achat'  => $dateAchat,
                'status'      => 'Livre PDF',
                'status_paye' => 'La demande est complète',
            ]);
 
            return response()->json([
                'success' => true,
                'message' => 'Demande créée avec succès',
                'achat'   => $acheter,
            ], 201);
        }
 
        // $statusPaye = $existingAchat->status_paye;
 
        // Cas 2a : Demande déjà en cours
        // if ($statusPaye === 'La demande est incomplète') {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Votre demande est déjà en cours',
        //         'achat'   => $existingAchat,
        //     ]);
        // }
 
        // Cas 2b : Paiement annulé → réactiver
        // if ($statusPaye === 'Le paiement a été annulé') {
        //     $existingAchat->update([
        //         'status_paye' => 'La demande est incomplète',
        //         'date_achat'  => $dateAchat,
        //     ]);
 
        //     return response()->json([
        //         'success' => true,
        //         'message' => 'Votre demande a été réactivée',
        //         'achat'   => $existingAchat,
        //     ], 200);
        // }
 
        // Cas 2c : Déjà acheté
        // if ($statusPaye === 'Paiement validé') {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Vous avez déjà acheté ce livre',
        //         'achat'   => $existingAchat,
        //     ], 403);
        // }
 
        // return response()->json([
        //     'success' => false,
        //     'message' => 'Statut inconnu pour cette demande',
        //     'achat'   => $existingAchat,
        // ], 400);
    }
 
    private function handlePhysicalBook($validated)
    {
        $acheter = Acheter::create([
            'user_id'     => $validated['user_id'],
            'livre_id'    => $validated['livre_id'],
            'date_achat'  => $validated['date_achat'],
            'status'      => 'Livre Physique',
            'status_paye' => 'La demande est complète',
        ]);
 
        return response()->json([
            'success' => true,
            'message' => "Demande de livre physique créée",
            'achat'   => $acheter,
        ], 201);
    }
    /**
     * Mettre à jour un achat (généralement utilisé par l'admin)
     */
    public function update(Request $request, $id)
    {
        $acheter = Acheter::findOrFail($id);

        $data = $request->validate([
            'user_id' => 'nullable|integer|exists:users,id',
            'livre_id' => 'nullable|integer|exists:livres,id',
            'date_achat' => 'nullable|date',
            'status' => 'nullable|string|in:Livre PDF,Livre Physique',
            'status_paye' => 'nullable|string',
        ]);

        // Filtrer les données null
        $data = array_filter($data, function ($value) {
            return $value !== null;
        });

        $acheter->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Achat mis à jour avec succès',
            'achat' => $acheter,
        ], 200);
    }

    /**
     * Accepter une demande de livre physique (Admin)
     * Status_paye = "تم التسليم" (livré)
     */
    public function acceptePhysicalBook($id)
    {
        $acheter = Acheter::findOrFail($id);

        if ($acheter->status !== 'Livre Physique') {
            return response()->json([
                'success' => false,
                'message' => 'Cette opération ne concerne que les livres physiques',
            ], 400);
        }

        $acheter->update(['status_paye' => 'تم التسليم']);

        return response()->json([
            'success' => true,
            'message' => 'Demande acceptée - livre livré',
            'achat' => $acheter,
        ], 200);
    }

    /**
     * Rejeter une demande de livre physique (Admin)
     * Status_paye = "ملغاة" (annulée)
     */
    public function rejectPhysicalBook($id)
    {
        $acheter = Acheter::findOrFail($id);

        if ($acheter->status !== 'Livre Physique') {
            return response()->json([
                'success' => false,
                'message' => 'Cette opération ne concerne que les livres physiques',
            ], 400);
        }

        $acheter->update(['status_paye' => 'ملغاة']);

        return response()->json([
            'success' => true,
            'message' => 'Demande rejetée et annulée',
            'achat' => $acheter,
        ], 200);
    }

    /**
     * Supprimer un achat
     */
    public function destroy($id)
    {
        $acheter = Acheter::findOrFail($id);
        $acheter->delete();

        return response()->json([
            'success' => true,
            'message' => 'Achat supprimé avec succès',
        ], 204);
    }

    /**
     * Valider le paiement d'un PDF
     * Met à jour status_paye = "Paiement validé"
     */
    public function payment(Request $request, $id)
    {
        $acheter = Acheter::where('user_id', $id)->first();
        if (!$acheter) {
            return response()->json([
                'success' => false,
                'message' => 'Aucun achat trouvé pour cet utilisateur.'
            ], 404);
        }
        // Validation des données de carte
        $validated = $request->validate([
            'cardName' => 'required|string|min:3',
            'cardNumber' => 'required|string|regex:/^\d{13,19}$/',
            'expiry' => 'required|string|regex:/^\d{2}\/\d{2}$/',
            'cvv' => 'required|string|regex:/^\d{3,4}$/',
        ]);

        try {
            // Vérifier que c'est un livre PDF
            if ($acheter->status !== 'Livre PDF') {
                return response()->json([
                    'success' => false,
                    'message' => 'Le paiement ne concerne que les livres PDF',
                ], 400);
            }

            // Mettre à jour le statut de paiement
            $acheter->update([
                'status_paye' => 'Paiement validé',
                'date_achat' => now(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Paiement effectué avec succès',
                'achat' => $acheter,
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors du paiement : ' . $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Annuler le paiement d'un PDF
     * Permet de passer de "Paiement validé" à "Le paiement a été annulé"
     */
    public function cancelPayment($id)
    {
        $acheter = Acheter::findOrFail($id);

        if ($acheter->status !== 'Livre PDF') {
            return response()->json([
                'success' => false,
                'message' => 'Cette opération ne concerne que les livres PDF',
            ], 400);
        }

        if ($acheter->status_paye !== 'Paiement validé') {
            return response()->json([
                'success' => false,
                'message' => 'Seuls les paiements validés peuvent être annulés',
            ], 400);
        }

        $acheter->update(['status_paye' => 'Le paiement a été annulé']);

        return response()->json([
            'success' => true,
            'message' => 'Paiement annulé avec succès',
            'achat' => $acheter,
        ], 200);
    }
}
