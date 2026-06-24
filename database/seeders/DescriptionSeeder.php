<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DescriptionSeeder extends Seeder
{
    public function run(): void
    {
        $descriptions = [
            [
                'livre_id'    => 1,
                'description' => 'Les Misérables est sans doute l\'œuvre la plus ambitieuse et la plus accomplie de Victor Hugo, publiée en 1862 après plus de quinze ans de travail. Ce roman fleuve plonge le lecteur dans la France tourmentée du début du XIXe siècle, entre révolutions, misère sociale et quête de justice. L\'histoire suit Jean Valjean, un ancien forçat condamné à dix-neuf ans de bagne pour avoir volé un pain afin de nourrir les enfants de sa sœur. Libéré mais marqué à jamais par le bagne, il trouve sur son chemin l\'évêque Myriel, dont la bonté inattendue va transformer sa vie et l\'engager sur la voie de la rédemption. Pourchassé sans relâche par l\'implacable inspecteur Javert, symbole d\'une loi sans miséricorde, Valjean change d\'identité et devient un homme respectable, maire d\'une ville et bienfaiteur des pauvres. Il recueille Cosette, une petite fille exploitée par les Thénardier, un couple d\'aubergistes cupides et sans scrupules. Père adoptif aimant, Valjean veille sur elle à travers des années de fuite et de clandestinité. Le roman croise également la destinée de Fantine, mère courage abandonnée par la société, et celle d\'une galerie de personnages inoubliables comme Gavroche, le gamin de Paris insolent et courageux, ou Éponine, amoureuse tragique et désespérée. En toile de fond, les barricades de juin 1832 à Paris donnent au récit une dimension épique et politique saisissante. Hugo y dénonce avec une force rare l\'injustice des institutions, la brutalité de la pauvreté, l\'hypocrisie des puissants et l\'indifférence d\'une société qui broie les plus faibles. Mais Les Misérables est aussi un hymne à la bonté humaine, à la résilience, à l\'amour sous toutes ses formes. C\'est une œuvre universelle qui transcende les siècles et continue d\'émouvoir des millions de lecteurs à travers le monde.',
            ],
            [
                'livre_id'    => 2,
                'description' => 'Start with Why est un livre qui a changé la façon dont des millions de dirigeants, entrepreneurs et individus conçoivent leur mission et leur communication. Simon Sinek, conférencier et consultant en management, développe dans cet ouvrage une idée en apparence simple mais d\'une profondeur redoutable : les organisations et les individus les plus inspirants du monde ne partent pas de ce qu\'ils font, ni de comment ils le font, mais de pourquoi ils le font. Il appelle ce modèle le "Cercle d\'Or", composé de trois niveaux concentriques — le Quoi, le Comment, et au centre, le Pourquoi. La plupart des entreprises communiquent de l\'extérieur vers l\'intérieur : elles expliquent d\'abord leurs produits, puis leurs avantages, et espèrent convaincre. Les grands leaders, eux, font l\'inverse : ils commencent toujours par leur raison d\'être, leur cause profonde, et laissent cette conviction guider tout le reste. Sinek illustre sa thèse avec des exemples concrets et fascinants : Apple, qui n\'est pas simplement un fabricant d\'ordinateurs mais une entreprise qui croit en la pensée différente ; Martin Luther King Jr., dont le discours "I Have a Dream" a mobilisé des millions de personnes non pas parce qu\'il avait un plan, mais parce qu\'il avait une conviction ; ou encore les frères Wright, qui ont réussi là où des équipes mieux financées ont échoué, parce qu\'ils étaient animés par une passion authentique. L\'auteur explore également les mécanismes biologiques qui expliquent pourquoi le "Pourquoi" touche les gens au niveau limbique, celui des émotions et des décisions instinctives. Un livre indispensable pour tout leader souhaitant inspirer durablement plutôt que simplement convaincre.',
            ],
            [
                'livre_id'    => 3,
                'description' => 'Le Mythe de Sisyphe, publié en 1942 en pleine Seconde Guerre mondiale, est l\'un des textes philosophiques les plus marquants et les plus lus du XXe siècle. Albert Camus y pose d\'emblée ce qu\'il considère comme la seule vraie question philosophique : pourquoi ne pas se suicider ? Face à un monde silencieux qui ne répond pas à nos appels de sens, face à l\'absurde qui naît de la confrontation entre le désir humain de clarté et le chaos irrationnel du monde, quelle attitude adopter ? Camus refuse deux solutions qu\'il juge lâches : le suicide physique, qui capitule devant l\'absurde, et le suicide philosophique, qui consiste à se réfugier dans la foi ou dans une idéologie pour échapper au vertige. Sa réponse est la révolte : il faut tenir, continuer à vivre en gardant les yeux ouverts sur l\'absurde, sans espoir mais sans désespoir. C\'est là qu\'intervient la figure mythologique de Sisyphe, condamné par les dieux à rouler éternellement un rocher au sommet d\'une montagne, pour le voir retomber indéfiniment. Plutôt que d\'y voir une punition tragique, Camus y voit un symbole de la condition humaine et, surtout, un modèle de liberté. Sisyphe est conscient de son sort, il ne se fait aucune illusion, et pourtant il continue. Il choisit son rocher. "Il faut imaginer Sisyphe heureux", conclut Camus dans une formule devenue légendaire. L\'essai explore également d\'autres figures de l\'absurde — Don Juan, l\'acteur, le conquérant — et s\'achève sur une réflexion sur la création artistique comme forme suprême de révolte. Un texte fondateur, exigeant et libérateur.',
            ],
            [
                'livre_id'    => 4,
                'description' => 'Grokking Algorithms est une introduction aux algorithmes comme on n\'en avait jamais vu auparavant. Là où la plupart des livres d\'informatique théorique noient le lecteur sous des formules mathématiques arides et des démonstrations abstraites, Aditya Bhargava adopte une approche radicalement différente : chaque concept est expliqué avec des illustrations colorées, des analogies du quotidien et des exemples de code en Python clairs et progressifs. Le livre commence par les bases fondamentales — la recherche binaire, la notation Big O pour mesurer l\'efficacité d\'un algorithme — avant de progresser vers des structures de données comme les tableaux, les listes chaînées, les piles et les files. Il aborde ensuite des algorithmes de tri comme le tri par sélection et le quicksort, puis plonge dans l\'univers des graphes avec la recherche en largeur et l\'algorithme de Dijkstra pour trouver le chemin le plus court. Les chapitres avancés traitent de la programmation dynamique, une technique puissante pour résoudre des problèmes complexes en les décomposant en sous-problèmes, ainsi que des algorithmes d\'approximation pour les problèmes NP-complets. Chaque chapitre se termine par des exercices pratiques qui permettent de consolider les connaissances acquises. Que vous soyez un développeur autodidacte, un étudiant en informatique ou un ingénieur expérimenté souhaitant combler des lacunes théoriques, ce livre vous donnera une compréhension solide et intuitive des algorithmes qui sont au cœur de tout logiciel moderne. Une référence incontournable, accessible et réellement agréable à lire.',
            ],
            [
                'livre_id'    => 5,
                'description' => 'L\'Étranger, publié en 1942 simultanément avec Le Mythe de Sisyphe, est le roman qui propulsa Albert Camus sur la scène littéraire mondiale et lui valut, entre autres, le Prix Nobel de littérature en 1957. Le récit suit Meursault, un modeste employé de bureau à Alger, dont la personnalité déconcertante déroute dès les premières lignes : il apprend la mort de sa mère avec une indifférence troublante, enterre son deuil en allant à la plage le lendemain, et s\'engage dans une relation amoureuse sans passion apparente avec Marie. La vie de Meursault bascule le jour où, sur une plage brûlante sous un soleil aveuglant, il abat un Arabe de cinq coups de revolver. Il ne peut expliquer son geste que par la chaleur et la lumière écrasante — une réponse qui scandalise la justice et la société. Son procès devient alors moins un jugement sur son crime qu\'un procès de sa personnalité, de son refus à pleurer sa mère, de son étrangeté fondamentale aux conventions sociales. Meursault est condamné à mort, non pour avoir tué, mais pour ne pas avoir joué le jeu des émotions attendues. Dans sa cellule, face à l\'aumônier qu\'il repousse avec violence, il atteint une forme de lucidité absolue : le monde est indifférent, la vie n\'a pas de sens préétabli, et cette vérité, loin de le désespérer, le libère. L\'Étranger est un chef-d\'œuvre de concision et de précision stylistique, un roman qui continue d\'interroger avec une acuité troublante notre rapport à la société, à la mort et à la liberté.',
            ],
            [
                'livre_id'    => 6,
                'description' => 'The 5 AM Club est bien plus qu\'un simple livre sur le réveil matinal : c\'est un manifeste complet pour transformer en profondeur sa vie personnelle et professionnelle. Robin Sharma, coach de renommée mondiale dont les clients incluent des PDG de grandes entreprises et des chefs d\'État, raconte l\'histoire de deux individus — un entrepreneur en crise et une artiste désenchantée — qui rencontrent par hasard un milliardaire excentrique. Cet homme mystérieux va leur transmettre un secret qui a changé la vie des plus grands génies de l\'Histoire : se lever à 5h du matin et consacrer la première heure de la journée à soi-même selon un protocole précis appelé la "Formule 20/20/20". Les vingt premières minutes sont réservées à l\'exercice physique intense, qui libère le BDNF (le "Miracle-Gro du cerveau") et chasse le cortisol du stress. Les vingt minutes suivantes sont dédiées à la réflexion, à la planification et à la méditation pour clarifier ses priorités. Les vingt dernières minutes sont consacrées à l\'apprentissage — lecture, podcasts, formation — pour nourrir continuellement son cerveau. Sharma s\'appuie sur de nombreuses études neuroscientifiques pour démontrer que les premières heures du matin, avant que le monde ne s\'éveille et ne réclame notre attention, sont le moment où notre cerveau est le plus réceptif et le plus créatif. Le livre explore également des concepts profonds comme les "quatre foyers intérieurs" — l\'esprit, le cœur, la santé et l\'âme — et l\'importance de construire des habitudes de classe mondiale. Une lecture transformatrice pour quiconque aspire à l\'excellence.',
            ],
            [
                'livre_id'    => 7,
                'description' => 'Factfulness est l\'un des livres les plus importants et les plus rafraîchissants publiés ces dernières années sur notre perception du monde. Hans Rosling, médecin et statisticien suédois de renommée internationale, y pose une question simple à ses lecteurs : le monde va-t-il mieux ou moins bien qu\'il y a cinquante ans ? La quasi-totalité des gens — y compris des journalistes, des politiciens et des experts — répondent que le monde se dégrade. Rosling démontre, données et graphiques à l\'appui, que c\'est faux. La mortalité infantile a chuté de façon spectaculaire, l\'espérance de vie mondiale a considérablement augmenté, l\'extrême pauvreté a reculé de manière sans précédent, et le niveau d\'éducation n\'a jamais été aussi élevé. Alors pourquoi avons-nous une vision si négative de la réalité ? Rosling identifie dix instincts cognitifs qui faussent systématiquement notre jugement : l\'instinct du fossé (l\'idée qu\'il y a toujours "eux" et "nous"), l\'instinct de négativité (les mauvaises nouvelles attirent plus l\'attention), l\'instinct de la ligne droite (extrapoler abusivement), l\'instinct de la peur, et bien d\'autres. Pour chacun de ces biais, il propose des outils concrets pour voir le monde avec plus de précision et d\'objectivité. Écrit avec humour, passion et une profonde humanité, ce livre — achevé par Rosling quelques semaines avant sa mort en 2017 — est un appel vibrant à remplacer l\'ignorance dramatisante par une curiosité factuelle et constructive. Un antidote puissant au pessimisme ambiant.',
            ],
            [
                'livre_id'    => 8,
                'description' => 'Zero to One est l\'un des livres sur l\'entrepreneuriat et l\'innovation les plus influents de la dernière décennie. Peter Thiel, cofondateur de PayPal et premier investisseur externe de Facebook, y développe une thèse provocatrice et stimulante : la vraie innovation ne consiste pas à améliorer ce qui existe déjà (aller de 1 à n), mais à créer quelque chose d\'entièrement nouveau (aller de 0 à 1). Les entreprises qui changent véritablement le monde ne font pas mieux que leurs concurrents — elles font quelque chose que personne d\'autre ne fait. Thiel remet radicalement en question le dogme de la concurrence, si cher aux économistes et aux MBA. Pour lui, la concurrence est destructrice : elle réduit les marges, force les entreprises à se battre pour les mêmes ressources et les empêche de penser à long terme. Les monopoles, au contraire, ont les moyens d\'innover, de prendre soin de leurs employés et de construire l\'avenir. Il analyse les caractéristiques communes aux grandes entreprises technologiques — technologie propriétaire, effets de réseau, économies d\'échelle, marque forte — et explique pourquoi le timing, le secret et la vision à long terme sont des avantages décisifs. Thiel aborde également des questions plus philosophiques : pourquoi la Silicon Valley a-t-elle produit si peu de véritables ruptures ces dernières années ? Qu\'est-ce qui distingue un fondateur visionnaire d\'un simple gestionnaire compétent ? Issu d\'un cours donné à Stanford, ce livre dense et stimulant est une lecture essentielle pour tout entrepreneur qui aspire à construire une entreprise qui compte vraiment.',
            ],
            [
                'livre_id'    => 9,
                'description' => 'La Nuit des temps est le roman de science-fiction français le plus vendu de tous les temps, et l\'on comprend pourquoi dès les premières pages. René Barjavel y déploie un récit d\'une puissance émotionnelle rare, mêlant aventure scientifique, histoire d\'amour absolue et réflexion profonde sur la condition humaine. L\'histoire commence en Antarctique, où une expédition internationale découvre sous la glace les vestiges d\'une civilisation inconnue, vieille de près de 900 000 ans. Les chercheurs parviennent à extraire deux êtres humains congelés dans un état de survie suspendue : un homme et une femme d\'une beauté saisissante. Élie, le scientifique français qui dirige les opérations, tombe immédiatement et éperdument amoureux de la jeune femme, prénommée Éléa. Grâce à un appareil de traduction universel, Éléa peut raconter son histoire : celle d\'une civilisation brillante et avancée, déchirée par une guerre totale entre deux superpuissances que tout opposait. Elle et Paikan, l\'homme qu\'elle aimait et dont elle fut séparée par les circonstances tragiques de la guerre, furent choisis pour survivre et témoigner. Barjavel tisse avec une habileté remarquable plusieurs niveaux de lecture : le thriller scientifique et diplomatique, la romance désespérée entre Élie et Éléa, et surtout le message universel et terriblement actuel sur la folie des hommes qui préfèrent se détruire plutôt que de s\'unir. Un roman bouleversant, écrit dans une prose lumineuse, qui laisse une empreinte indélébile dans la mémoire du lecteur.',
            ],
            [
                'livre_id'    => 10,
                'description' => 'The Intelligent Investor est universellement reconnu comme la bible de l\'investissement dans la valeur, et Warren Buffett lui-même le considère comme le meilleur livre jamais écrit sur l\'investissement. Benjamin Graham, économiste et professeur à Columbia, y expose avec une clarté et une rigueur exceptionnelles les principes fondamentaux qui permettent à un investisseur ordinaire de construire une richesse durable sur le long terme, sans spéculer ni céder aux caprices des marchés. Le cœur de la philosophie de Graham repose sur une distinction essentielle entre l\'investissement et la spéculation : l\'investisseur intelligent analyse la valeur intrinsèque d\'une entreprise, achète avec une "marge de sécurité" suffisante et ignore les fluctuations à court terme du marché. Graham introduit la métaphore célèbre de "M. Market", un partenaire imaginaire dont les humeurs erratiques offrent tantôt des occasions d\'achat exceptionnelles, tantôt des opportunités de vente surévaluées — à l\'investisseur sage de rester rationnel et de ne pas se laisser emporter par les émotions de la foule. L\'auteur distingue deux profils d\'investisseurs — le défensif, qui cherche la sécurité et la simplicité, et l\'entreprenant, prêt à consacrer du temps et des efforts à l\'analyse approfondie des titres — et propose des stratégies adaptées à chacun. Il aborde également la diversification, l\'analyse des bilans comptables, la psychologie de l\'investisseur et les erreurs les plus communes sur les marchés financiers. Annoté par Jason Zweig avec des exemples modernes, cet ouvrage reste d\'une pertinence absolue pour tout investisseur souhaitant construire un patrimoine solide et raisonné.',
            ],
            [
                'livre_id' => 11,
                'description' => "The Lean Startup révolutionne la création d'entreprise en prônant l'expérimentation rapide et le feedback client. Eric Ries explique comment éviter le gaspillage et bâtir un business durable dans l'incertitude totale."
            ],
            [
                'livre_id' => 12,
                'description' => "James Clear décortique la science des petites habitudes. Apprenez comment des changements de 1% peuvent mener à des résultats spectaculaires sur le long terme grâce au pouvoir des systèmes."
            ],
            [
                'livre_id' => 13,
                'description' => "Rework bouscule les codes traditionnels du travail. Pas de réunions inutiles, pas de plans sur 5 ans. Un guide pragmatique pour monter un business efficace avec moins de ressources."
            ],
            [
                'livre_id' => 14,
                'description' => "Travailler moins pour gagner plus. Tim Ferriss partage ses stratégies pour automatiser ses revenus, externaliser les tâches chronophages et vivre la vie de ses rêves dès maintenant."
            ],
            [
                'livre_id' => 15,
                'description' => "Pourquoi certaines entreprises passent de bonnes à excellentes ? Jim Collins analyse les facteurs clés de succès : leadership de niveau 5, culture de discipline et confrontation à la réalité."
            ],

            // --- Philosophie & Psychologie (16-20) ---
            [
                'livre_id' => 16,
                'description' => "Daniel Kahneman explore les deux systèmes qui régissent notre pensée : l'un rapide et intuitif, l'autre lent et logique. Un voyage fascinant au cœur de nos biais cognitifs."
            ],
            [
                'livre_id' => 17,
                'description' => "Nietzsche remet en question la morale traditionnelle. Une critique acerbe des valeurs occidentales et un appel à la création de ses propres valeurs au-delà du bien et du mal."
            ],
            [
                'livre_id' => 18,
                'description' => "Un psychiatre témoigne de son expérience dans les camps de concentration. Viktor Frankl démontre que trouver un sens à sa souffrance est la clé de la survie psychologique."
            ],
            [
                'livre_id' => 19,
                'description' => "Le texte fondateur de la pensée politique occidentale. Platon y dessine la cité idéale, explorant les thèmes de la justice, de l'éducation et du rôle du philosophe-roi."
            ],
            [
                'livre_id' => 20,
                'description' => "L'amour n'est pas un sentiment passif mais un art qui s'apprend. Erich Fromm analyse les différentes formes d'amour et la discipline nécessaire pour les cultiver."
            ],

            // --- Informatique & Tech (21-25) ---
            [
                'livre_id' => 21,
                'description' => "La bible du développement logiciel propre. Robert C. Martin enseigne comment écrire du code lisible, maintenable et évolutif pour devenir un véritable artisan du code."
            ],
            [
                'livre_id' => 22,
                'description' => "Un guide pratique pour les développeurs qui veulent progresser. Des conseils sur la gestion de projet, l'automatisation et l'excellence technique au quotidien."
            ],
            [
                'livre_id' => 23,
                'description' => "Une encyclopédie du développement logiciel. Steve McConnell couvre toutes les étapes de la construction d'un logiciel, du design aux tests finaux."
            ],
            [
                'livre_id' => 24,
                'description' => "Le livre qui a popularisé les patterns de conception. Découvrez 23 solutions classiques aux problèmes récurrents du design logiciel orienté objet."
            ],
            [
                'livre_id' => 25,
                'description' => "Parce qu'être un bon développeur ne suffit pas. John Sonmez explique comment gérer sa carrière, son marketing personnel, sa santé et ses finances."
            ],

            // --- Roman & Classique (26-30) ---
            [
                'livre_id' => 26,
                'description' => "Le chef-d'œuvre de George Orwell sur la surveillance de masse et le totalitarisme. Big Brother vous regarde dans ce futur dystopique plus actuel que jamais."
            ],
            [
                'livre_id' => 27,
                'description' => "Un conte philosophique universel. L'histoire d'un petit prince venu d'une autre planète qui nous rappelle l'importance de voir avec le cœur."
            ],
            [
                'livre_id' => 28,
                'description' => "Emma Bovary cherche désespérément à échapper à l'ennui de la vie provinciale à travers ses rêves romantiques et ses amours tragiques. Un sommet du réalisme français."
            ],
            [
                'livre_id' => 29,
                'description' => "Dostoïevski explore la psychologie du crime. Raskolnikov pense être au-dessus des lois, mais sa conscience le rattrape dans une lutte morale intense."
            ],
            [
                'livre_id' => 30,
                'description' => "Santiago, un jeune berger andalou, part à la recherche d'un trésor aux pyramides d'Égypte. Un voyage spirituel sur la poursuite de sa légende personnelle."
            ],

            // --- Science-Fiction & Thriller (31-35) ---
            [
                'livre_id' => 31,
                'description' => "Sur la planète désertique Arrakis, le jeune Paul Atréides se retrouve au cœur d'une lutte galactique pour l'Épice. Une épopée politique et écologique inégalée."
            ],
            [
                'livre_id' => 32,
                'description' => "Hari Seldon prévoit la chute de l'Empire Galactique. Pour sauver la connaissance, il crée la Fondation. Une fresque historique s'étendant sur des millénaires."
            ],
            [
                'livre_id' => 33,
                'description' => "Un meurtre au Louvre lance Robert Langdon dans une quête ésotérique mêlant codes secrets, art et mystères de l'Église catholique."
            ],
            [
                'livre_id' => 34,
                'description' => "Le jour de son anniversaire de mariage, Amy disparaît. Son mari Nick devient le suspect numéro un. Un thriller psychologique aux rebondissements magistraux."
            ],
            [
                'livre_id' => 35,
                'description' => "Dans un futur où le bonheur est obligatoire et génétiquement programmé, un homme découvre le prix de la liberté. Une critique visionnaire de la société de consommation."
            ],

            // --- Histoire & Science (36-40) ---
            [
                'livre_id' => 36,
                'description' => "Comment une espèce insignifiante a-t-elle pris le contrôle de la planète ? Harari raconte l'histoire de l'humanité à travers le prisme des révolutions cognitives et scientifiques."
            ],
            [
                'livre_id' => 37,
                'description' => "Stephen Hawking explique les mystères de l'univers : le Big Bang, les trous noirs et la nature du temps, rendant la cosmologie accessible à tous."
            ],
            [
                'livre_id' => 38,
                'description' => "Pourquoi l'Occident a-t-il dominé le monde ? Jared Diamond analyse l'influence de la géographie, de l'environnement et de la technologie sur le destin des civilisations."
            ],
            [
                'livre_id' => 39,
                'description' => "Une exploration épique du cosmos. Carl Sagan nous invite à comprendre notre place dans l'immensité de l'univers et l'importance de la science."
            ],
            [
                'livre_id' => 40,
                'description' => "Une relecture magistrale de l'histoire du monde centrée sur les routes de la soie, de l'antiquité à nos jours. L'Orient au cœur des échanges mondiaux."
            ],

            // --- Poésie & Manga (41-45) ---
            [
                'livre_id' => 41,
                'description' => "Le recueil qui a révolutionné la poésie moderne. Baudelaire y explore la beauté du mal, le spleen de Paris et la dualité de l'âme humaine."
            ],
            [
                'livre_id' => 42,
                'description' => "Luffy, un jeune pirate, part à la recherche du trésor légendaire 'One Piece' pour devenir le roi des pirates. Le début d'une aventure mondiale."
            ],
            [
                'livre_id' => 43,
                'description' => "Naruto Uzumaki, un jeune ninja rejeté, rêve de devenir le leader de son village. Une quête de reconnaissance et de dépassement de soi."
            ],
            [
                'livre_id' => 44,
                'description' => "Le chef-d'œuvre de la poésie américaine. Walt Whitman célèbre la nature, la démocratie et la liberté de l'esprit dans un style libre et vibrant."
            ],
            [
                'livre_id' => 45,
                'description' => "L'humanité est menacée par des titans géants. Eren Jäger rejoint les troupes de choc pour reconquérir la liberté derrière les murs. Un récit épique et sombre."
            ],

            // --- Finance & Divers (46-50) ---
            [
                'livre_id' => 46,
                'description' => "Robert Kiyosaki explique la différence entre les actifs et les passifs. Découvrez l'éducation financière que l'école ne vous enseigne pas pour devenir libre."
            ],
            [
                'livre_id' => 47,
                'description' => "Notre succès financier dépend moins de notre intelligence que de notre comportement. Morgan Housel explore la psychologie humaine face à l'argent."
            ],
            [
                'livre_id' => 48,
                'description' => "Dans un monde de distractions, la capacité à se concentrer intensément est un super-pouvoir. Cal Newport propose des méthodes pour produire un travail de haute valeur."
            ],
            [
                'livre_id' => 49,
                'description' => "Pourquoi agissons-nous comme nous le faisons ? Charles Duhigg explique comment les habitudes se forment et comment nous pouvons les transformer pour réussir."
            ],
            [
                'livre_id' => 50,
                'description' => "Annie Duke, championne de poker, explique comment prendre de meilleures décisions dans l'incertitude en acceptant que tout est une question de probabilités."
            ],
        ];

        DB::table('descriptions')->insert($descriptions);
    }
}
