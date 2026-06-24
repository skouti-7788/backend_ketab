<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Livres;
use Illuminate\Http\Request;
class LivresController extends Controller
{
    public function index()
    {
        $livres = Livres::all();
        return response()->json(
            [
                'message' => 'Liste des livres récupérée avec succès',
                'livres' => $livres
                
            ]
        );
    }
   public function ajouter(Request $request)
   {
    $validated = $request->validate([
        // 'titre' => 'required|string|max:255',
        // 'auteur' => 'required|string|max:255',
        // 'isbn' => 'nullable|string|max:50',
        // 'categorie' => 'required|string|max:100',
        // 'annee' => 'nullable|integer',
        // 'qte' => 'required|integer|min:1',
        // 'disponibilite' => 'required|integer|min:0',
       
    'title'         => 'required|string|max:255',
    'author'        => 'required|string|max:255',
    'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // تغيير إلى image    'category'      => 'nullable|string|max:100',
    'annee'         => 'nullable|integer|min:1|max:' . date('Y'),
    'pages'         => 'nullable|integer|min:1',
    'fileSize'      => 'nullable|string|max:255',
    'extension'     => 'nullable|string|max:10',
    'creationDate'  => 'nullable|date',
    'book_rank'     => 'nullable|integer|min:0|max:5',
    'prix'          => 'nullable|numeric|min:0',
    'showLiver'     => 'nullable|integer|min:0',
    'qte'           => 'required|integer|min:1',
    'disponibilite' => 'required|integer|in:0,1',
    'status'        => 'required|string|max:50',
    'pdf_url'       => 'nullable|pdf',
    'is_free'       => 'nullable|integer|in:0,1',
    'download_link' => 'nullable|string',
    ]);
    if ($request->hasFile('image')) {
        // تخزين الصورة في storage/app/public/books
        $path = $request->file('image')->store('books', 'public');
        // حفظ المسار النسبي فقط (مثل: books/name.png)
        $validated['image'] = $path;
    }
    if ($request->hasFile('pdf_url')) {
        // تخزين الصورة في storage/app/public/books
        $path = $request->file('pdf_url')->store('file', 'public');
        // حفظ المسار النسبي فقط (مثل: books/name.png)
        $validated['pdf_url'] = $path;
    }
    $livre = Livres::create($validated);

    return response()->json($livre, 201);
    }
   public function modify(Request $request, $id)
   {
    $livre = Livres::findOrFail($id);

    // ✅ Validation
    $data = $request->validate([
        // 'titre' => 'required|string|max:255',
        // 'auteur' => 'required|string|max:255',
        // 'isbn' => 'nullable|string|max:50',
        // 'categorie' => 'required|string|max:100',
        // 'annee' => 'nullable|integer',
        // 'qte' => 'required|integer|min:1',
        // 'disponibilite' => 'required|integer|min:0',

    'title'         => 'required|string|max:255',
    'author'        => 'required|string|max:255',
    'image'         => 'nullable|string|max:255',
    'category'      => 'nullable|string|max:100',
    'annee'         => 'nullable|integer|min:1|max:' . date('Y'),
    'pages'         => 'nullable|integer|min:1',
    'fileSize'      => 'nullable|string|max:255',
    'extension'     => 'nullable|string|max:10',
    'creationDate'  => 'nullable|date',
    'book_rank'     => 'nullable|integer|min:0|max:5',
    'prix'          => 'nullable|numeric|min:0',
    'showLiver'     => 'nullable|integer|min:0',
    'qte'           => 'required|integer|min:1',
    'disponibilite' => 'required|integer|in:0,1',
    'status'        => 'required|string|max:50',
    'pdf_url'       => 'nullable|pdf',
    'is_free'       => 'nullable|integer|in:0,1',
    'download_link' => 'nullable|string',
 
    ]);

    // ✅ Update
    $livre->update($data);

    return response()->json($livre, 200);
   }
    public function delete($id)
    {
        $livre = Livres::findOrFail($id);
        $livre->delete();
        return response()->json(null, 204);
    }
}