<?php

namespace Database\Seeders;

use App\Models\Livres;
use App\Models\Opinion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OpinionSeeder extends Seeder
{
    public function run(): void
    {
        $opinions = [
            [
                "username" => "Yassine El Idrissi",
                "opinion" => "Un livre exceptionnel qui m'a captivé dès les premières pages. L'auteur maîtrise parfaitement son récit et parvient à transmettre des émotions profondes sans jamais tomber dans l'exagération. Les personnages sont vivants, crédibles, et leurs conflits intérieurs sont décrits avec une grande finesse. Une lecture que je recommande vivement."
            ],
            [
                "username" => "Sara Benali",
                "opinion" => "Je ne m'attendais pas à être autant touchée par ce livre. L'écriture est fluide, poétique, et chaque chapitre apporte une nouvelle dimension à l'histoire. L'auteur réussit à aborder des thèmes sensibles avec beaucoup de délicatesse. C'est le genre d'ouvrage qui reste en tête longtemps après l'avoir terminé."
            ],
            [
                "username" => "Omar El Fassi",
                "opinion" => "Une œuvre remarquable qui allie profondeur et plaisir de lecture. Le style est élégant, les idées sont fortes, et l'intrigue est construite avec intelligence. J'ai particulièrement apprécié la manière dont l'auteur explore la psychologie des personnages. Un livre à ne pas manquer pour les amateurs de littérature sérieuse."
            ],
            [
                "username" => "Imane Azzouzi",
                "opinion" => "Un récit émouvant et très bien écrit. Certaines phrases m'ont réellement marquée par leur beauté et leur justesse. L'auteur parvient à créer une atmosphère intime qui nous rapproche des personnages et de leurs émotions. Une lecture enrichissante et profondément humaine."
            ],
            [
                "username" => "Hicham Mouline",
                "opinion" => "Un excellent livre, maîtrisé du début à la fin. L'équilibre entre narration, réflexion et rythme est parfaitement réussi. Chaque chapitre apporte quelque chose de nouveau et pousse le lecteur à aller plus loin. Une œuvre solide qui mérite largement sa place dans toute bonne bibliothèque."
            ]
        ];
 

    $livres = Livres::all();

    if ($livres->isEmpty()) {
        $this->command->warn('Aucun livre trouvé dans la base de données, le seeder a été ignoré.');
        return;
    }

    foreach ($opinions as $index => $item) {
        $email = strtolower(str_replace(' ', '.', $item['username'])) . '@example.com';

        $existingUser = DB::table('users')->where('email', $email)->first();

        if ($existingUser) {
            $userId = $existingUser->id;
        } else {
            $userId = DB::table('users')->insertGetId([
                'username' => $item['username'],
                'email'    => $email,
                'password' => Hash::make('password'),
            ]);
        }

        // ← هاد التعديل: كل opinion كتاخد livre_id مختلف
        $livre = $livres[$index % $livres->count()];

        Opinion::create([
            'user_id'  => $userId,
            'livre_id' => $livre->id,
            'opinion'  => $item['opinion'],
        ]);
    }

    $this->command->info('Opinions insérées avec succès !');
    }
}