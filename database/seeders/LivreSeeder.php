<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Livres;
use Illuminate\Support\Facades\Http; // ضروري
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class LivreSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        // 1. الكتب الـ 50 اللي حددتهم
        $realBooks = [
            ['title' => 'Les Misérables', 'author' => 'Victor Hugo', 'cat' => 'Classique', 'img' => 'https://covers.openlibrary.org/b/id/12838421-L.jpg', 'pdf_url' => 'https://www.gutenberg.org/files/135/135-pdf.pdf'],
            ['title' => 'Start with Why', 'author' => 'Simon Sinek', 'cat' => 'Business', 'img' => 'https://covers.openlibrary.org/b/id/12061404-L.jpg', 'pdf_url' => '#'],
            ['title' => 'Le Mythe de Sisyphe', 'author' => 'Albert Camus', 'cat' => 'Philosophie', 'img' => 'https://covers.openlibrary.org/b/id/12711718-L.jpg', 'pdf_url' => '#'],
            ['title' => 'Grokking Algorithms', 'author' => 'Aditya Bhargava', 'cat' => 'Informatique', 'img' => 'https://covers.openlibrary.org/b/id/10531473-L.jpg', 'pdf_url' => '#'],
            ['title' => 'L\'Étranger', 'author' => 'Albert Camus', 'cat' => 'Roman', 'img' => 'https://covers.openlibrary.org/b/id/12711664-L.jpg', 'pdf_url' => '#'],
            ['title' => 'The 5 AM Club', 'author' => 'Robin Sharma', 'cat' => 'Productivité', 'img' => 'https://covers.openlibrary.org/b/id/12693988-L.jpg', 'pdf_url' => '#'],
            ['title' => 'Factfulness', 'author' => 'Hans Rosling', 'cat' => 'Science', 'img' => 'https://covers.openlibrary.org/b/id/12693972-L.jpg', 'pdf_url' => '#'],
            ['title' => 'Zero to One', 'author' => 'Peter Thiel', 'cat' => 'Entrepreneurship', 'img' => 'https://covers.openlibrary.org/b/id/12821616-L.jpg', 'pdf_url' => '#'],
            ['title' => 'La Nuit des temps', 'author' => 'René Barjavel', 'cat' => 'Science-Fiction', 'img' => 'https://covers.openlibrary.org/b/id/12843444-L.jpg', 'pdf_url' => '#'],
            ['title' => 'The Intelligent Investor', 'author' => 'Benjamin Graham', 'cat' => 'Finance', 'img' => 'https://covers.openlibrary.org/b/id/12821620-L.jpg', 'pdf_url' => '#'],
            ['title' => 'The Lean Startup', 'author' => 'Eric Ries', 'cat' => 'Business', 'img' => 'https://covers.openlibrary.org/b/id/12534571-L.jpg', 'pdf_url' => '#'],
            ['title' => 'Atomic Habits', 'author' => 'James Clear', 'cat' => 'Productivité', 'img' => 'https://covers.openlibrary.org/b/id/12853744-L.jpg', 'pdf_url' => '#'],
            ['title' => 'Rework', 'author' => 'Jason Fried', 'cat' => 'Business', 'img' => 'https://covers.openlibrary.org/b/id/10398634-L.jpg', 'pdf_url' => '#'],
            ['title' => 'The 4-Hour Workweek', 'author' => 'Timothy Ferriss', 'cat' => 'Productivité', 'img' => 'https://covers.openlibrary.org/b/id/12915234-L.jpg', 'pdf_url' => '#'],
            ['title' => 'Good to Great', 'author' => 'Jim Collins', 'cat' => 'Business', 'img' => 'https://covers.openlibrary.org/b/id/12903577-L.jpg', 'pdf_url' => '#'],
            ['title' => 'Thinking, Fast and Slow', 'author' => 'Daniel Kahneman', 'cat' => 'Psychologie', 'img' => 'https://covers.openlibrary.org/b/id/12920802-L.jpg', 'pdf_url' => '#'],
            ['title' => 'Beyond Good and Evil', 'author' => 'Friedrich Nietzsche', 'cat' => 'Philosophie', 'img' => 'https://covers.openlibrary.org/b/id/12615462-L.jpg', 'pdf_url' => 'https://www.gutenberg.org/files/4363/4363-pdf.pdf'],
            ['title' => 'Man\'s Search for Meaning', 'author' => 'Viktor Frankl', 'cat' => 'Psychologie', 'img' => 'https://covers.openlibrary.org/b/id/12930263-L.jpg', 'pdf_url' => '#'],
            ['title' => 'The Republic', 'author' => 'Plato', 'cat' => 'Philosophie', 'img' => 'https://covers.openlibrary.org/b/id/12711652-L.jpg', 'pdf_url' => 'https://www.gutenberg.org/files/1497/1497-pdf.pdf'],
            ['title' => 'The Art of Loving', 'author' => 'Erich Fromm', 'cat' => 'Psychologie', 'img' => 'https://covers.openlibrary.org/b/id/12842416-L.jpg', 'pdf_url' => '#'],
            ['title' => 'Clean Code', 'author' => 'Robert C. Martin', 'cat' => 'Informatique', 'img' => 'https://covers.openlibrary.org/b/id/10543666-L.jpg', 'pdf_url' => '#'],
            ['title' => 'The Pragmatic Programmer', 'author' => 'Andrew Hunt', 'cat' => 'Informatique', 'img' => 'https://covers.openlibrary.org/b/id/10352525-L.jpg', 'pdf_url' => '#'],
            ['title' => 'Code Complete', 'author' => 'Steve McConnell', 'cat' => 'Informatique', 'img' => 'https://covers.openlibrary.org/b/id/10531478-L.jpg', 'pdf_url' => '#'],
            ['title' => 'Design Patterns', 'author' => 'Gang of Four', 'cat' => 'Informatique', 'img' => 'https://covers.openlibrary.org/b/id/10531481-L.jpg', 'pdf_url' => '#'],
            ['title' => 'Soft Skills', 'author' => 'John Sonmez', 'cat' => 'Informatique', 'img' => 'https://covers.openlibrary.org/b/id/10531484-L.jpg', 'pdf_url' => '#'],
            ['title' => '1984', 'author' => 'George Orwell', 'cat' => 'Roman', 'img' => 'https://covers.openlibrary.org/b/id/12845672-L.jpg', 'pdf_url' => '#'],
            ['title' => 'Le Petit Prince', 'author' => 'Saint-Exupéry', 'cat' => 'Classique', 'img' => 'https://covers.openlibrary.org/b/id/12852341-L.jpg', 'pdf_url' => '#'],
            ['title' => 'Madame Bovary', 'author' => 'Gustave Flaubert', 'cat' => 'Classique', 'img' => 'https://covers.openlibrary.org/b/id/12843431-L.jpg', 'pdf_url' => 'https://www.gutenberg.org/files/2413/2413-pdf.pdf'],
            ['title' => 'Crime and Punishment', 'author' => 'Fyodor Dostoevsky', 'cat' => 'Roman', 'img' => 'https://covers.openlibrary.org/b/id/12534575-L.jpg', 'pdf_url' => 'https://www.gutenberg.org/files/2554/2554-pdf.pdf'],
            ['title' => 'L\'Alchimiste', 'author' => 'Paulo Coelho', 'cat' => 'Roman', 'img' => 'https://covers.openlibrary.org/b/id/12843440-L.jpg', 'pdf_url' => '#'],
            ['title' => 'Dune', 'author' => 'Frank Herbert', 'cat' => 'Science-Fiction', 'img' => 'https://covers.openlibrary.org/b/id/12845680-L.jpg', 'pdf_url' => '#'],
            ['title' => 'Foundation', 'author' => 'Isaac Asimov', 'cat' => 'Science-Fiction', 'img' => 'https://covers.openlibrary.org/b/id/12845692-L.jpg', 'pdf_url' => '#'],
            ['title' => 'The Da Vinci Code', 'author' => 'Dan Brown', 'cat' => 'Thriller', 'img' => 'https://covers.openlibrary.org/b/id/12845695-L.jpg', 'pdf_url' => '#'],
            ['title' => 'Gone Girl', 'author' => 'Gillian Flynn', 'cat' => 'Thriller', 'img' => 'https://covers.openlibrary.org/b/id/12845700-L.jpg', 'pdf_url' => '#'],
            ['title' => 'Brave New World', 'author' => 'Aldous Huxley', 'cat' => 'Science-Fiction', 'img' => 'https://covers.openlibrary.org/b/id/12845705-L.jpg', 'pdf_url' => '#'],
            ['title' => 'Sapiens', 'author' => 'Yuval Noah Harari', 'cat' => 'Histoire', 'img' => 'https://covers.openlibrary.org/b/id/12845710-L.jpg', 'pdf_url' => '#'],
            ['title' => 'A Brief History of Time', 'author' => 'Stephen Hawking', 'cat' => 'Science', 'img' => 'https://covers.openlibrary.org/b/id/12845715-L.jpg', 'pdf_url' => '#'],
            ['title' => 'Guns, Germs, and Steel', 'author' => 'Jared Diamond', 'cat' => 'Histoire', 'img' => 'https://covers.openlibrary.org/b/id/12845720-L.jpg', 'pdf_url' => '#'],
            ['title' => 'Cosmos', 'author' => 'Carl Sagan', 'cat' => 'Science', 'img' => 'https://covers.openlibrary.org/b/id/12845725-L.jpg', 'pdf_url' => '#'],
            ['title' => 'The Silk Roads', 'author' => 'Peter Frankopan', 'cat' => 'Histoire', 'img' => 'https://covers.openlibrary.org/b/id/12845730-L.jpg', 'pdf_url' => '#'],
            ['title' => 'Les Fleurs du Mal', 'author' => 'Charles Baudelaire', 'cat' => 'Poésie', 'img' => 'https://covers.openlibrary.org/b/id/12845740-L.jpg', 'pdf_url' => 'https://www.gutenberg.org/files/6099/6099-pdf.pdf'],
            ['title' => 'One Piece Vol. 1', 'author' => 'Eiichiro Oda', 'cat' => 'Manga', 'img' => 'https://covers.openlibrary.org/b/id/12845745-L.jpg', 'pdf_url' => '#'],
            ['title' => 'Naruto Vol. 1', 'author' => 'Masashi Kishimoto', 'cat' => 'Manga', 'img' => 'https://covers.openlibrary.org/b/id/12845750-L.jpg', 'pdf_url' => '#'],
            ['title' => 'Leaves of Grass', 'author' => 'Walt Whitman', 'cat' => 'Poésie', 'img' => 'https://covers.openlibrary.org/b/id/12845755-L.jpg', 'pdf_url' => 'https://www.gutenberg.org/files/1322/1322-pdf.pdf'],
            ['title' => 'Attack on Titan Vol. 1', 'author' => 'Hajime Isayama', 'cat' => 'Manga', 'img' => 'https://covers.openlibrary.org/b/id/12845760-L.jpg', 'pdf_url' => '#'],
            ['title' => 'Rich Dad Poor Dad', 'author' => 'Robert Kiyosaki', 'cat' => 'Finance', 'img' => 'https://covers.openlibrary.org/b/id/12845770-L.jpg', 'pdf_url' => '#'],
            ['title' => 'The Psychology of Money', 'author' => 'Morgan Housel', 'cat' => 'Finance', 'img' => 'https://covers.openlibrary.org/b/id/12845775-L.jpg', 'pdf_url' => '#'],
            ['title' => 'Deep Work', 'author' => 'Cal Newport', 'cat' => 'Productivité', 'img' => 'https://covers.openlibrary.org/b/id/12845780-L.jpg', 'pdf_url' => '#'],
            ['title' => 'The Power of Habit', 'author' => 'Charles Duhigg', 'cat' => 'Psychologie', 'img' => 'https://covers.openlibrary.org/b/id/12845785-L.jpg', 'pdf_url' => '#'],
            ['title' => 'Thinking in Bets', 'author' => 'Annie Duke', 'cat' => 'Business', 'img' => 'https://covers.openlibrary.org/b/id/12845790-L.jpg', 'pdf_url' => '#'],
        ];

        // --- Partie 1: Insertion des 50 livres définis ---
        foreach ($realBooks as $book) {
            Livres::create([
                'title'         => $book['title'],
                'author'        => $book['author'],
                'category'      => $book['cat'],      // Mapping: cat -> category
                'image'         => $book['img'],       // Mapping: img -> image
                'pdf_url'       => $book['pdf_url'],
                'annee'         => $faker->numberBetween(1980, 2024),
                'pages'         => $faker->numberBetween(150, 600),
                'fileSize'      => $faker->numberBetween(1, 15) . ' MB',
                'extension'     => 'pdf',
                'creationDate'  => now(),
                'book_rank'     => $faker->numberBetween(4, 5),
                'prix'          => $faker->randomFloat(2, 45, 290),
                'showLiver'     => $faker->numberBetween(100, 2000),
                'qte'           => $faker->numberBetween(5, 40),
                'status'        => 1,
                'is_free' => $book['pdf_url']==="#" ?0:1,
                'download_link' => '',

            ]);
        }

        // --- Partie 2: Ajout de livres depuis l'API (Optionnel) ---
        // هاد الجزء غادي يزيد كتب إضافية باش يكمل الداتابيز
        
        try {
            $response = Http::timeout(60)
                ->retry(3, 2000)
                ->get('https://gutendex.com/books');

            if ($response->successful()) {
                $apiBooks = $response->json()['results'] ?? [];
            }

        } catch (\Exception $e) {
            // إذا فشل API نستعمل JSON
        }
        if (empty($apiBooks)) {
        $file = storage_path('books.json');

        if (!file_exists($file)) {
            dd("books.json not found");
        }

        $responseBooks = json_decode(file_get_contents($file), true);
        $apiBooks = $responseBooks['results'] ?? [];
        }   
 
        if (empty($apiBooks)) {
            dd("No books found (API + JSON)");
        }

        foreach ($apiBooks as $book) { 
        $category = 'General';

        foreach ($book['bookshelves'] ?? [] as $shelf) {
            if (str_contains($shelf, 'Category:')) {
                $category = trim(str_replace('Category:', '', $shelf));
                break;
            }
        }

        if ($category === 'General' && !empty($book['bookshelves'][0])) {
            $category = $book['bookshelves'][0];
        }
            $livreId = Livres::insertGetId([
                'title' => $book['title'] ?? 'Unknown',
                'author' => $book['authors'][0]['name'] ?? 'Unknown',
                'category' => $category,
                'image' => $book['formats']['image/jpeg'] ?? null,
                'pdf_url' =>  $book['formats']['text/html'] ??  '#',
                'annee' => now()->year,
                'pages' => 0,
                'fileSize' => rand(1, 15).' MB',
                'extension' => 'pdf',
                'creationDate' => now(),
                'book_rank' => rand(4, 5),
                'prix' => rand(50, 200),
                'showLiver' => rand(100, 2000),
                'qte' => rand(5, 40),
                'status' => 1,
                'is_free' => $book['formats']['text/html'] ==="#" ?0:1,
                'download_link' => $book['formats']['application/epub+zip'] ??  '',
            ]);

            DB::table('descriptions')->insert([
                'livre_id' =>  $livreId,
                'description' => $book['summaries'][0] ?? '',
            ]);
        }
    }
}





















