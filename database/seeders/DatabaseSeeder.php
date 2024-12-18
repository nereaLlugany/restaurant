<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            ['name' => 'Paca Alpaca', 'email' => 'pacalaalpaca@gmail.com', 'password' => bcrypt('123456'), 'es_admin' => true],
            ['name' => 'Anna Banana', 'email' => 'anna.banana@gmail.com', 'password' => bcrypt('fruitlove'), 'es_admin' => false],
            ['name' => 'Charlie Churro', 'email' => 'charlie.churro@gmail.com', 'password' => bcrypt('sweetlife'), 'es_admin' => true],
            ['name' => 'Larry Llama', 'email' => 'larry.llama@gmail.com', 'password' => bcrypt('spitfire123'), 'es_admin' => false],
            ['name' => 'Maggie Noodles', 'email' => 'maggie.noodles@gmail.com', 'password' => bcrypt('ramenlife'), 'es_admin' => false],
            ['name' => 'Sally Salami', 'email' => 'sally.salami@gmail.com', 'password' => bcrypt('meatlover123'), 'es_admin' => false],
            ['name' => 'John Doe', 'email' => 'johndoe@gmail.com', 'password' => bcrypt('password7'), 'es_admin' => false],
            ['name' => 'Jane Smith', 'email' => 'janesmith@gmail.com', 'password' => bcrypt('password8'), 'es_admin' => false],
            ['name' => 'Albert Einstein', 'email' => 'einstein@gmail.com', 'password' => bcrypt('password9'), 'es_admin' => false],
            ['name' => 'Marie Curie', 'email' => 'curie@gmail.com', 'password' => bcrypt('password10'), 'es_admin' => false],
        ]);

        DB::table('taula')->insert([
            ['num_taula' => 1, 'estat' => true, 'capacitat' => 4],
            ['num_taula' => 2, 'estat' => false, 'capacitat' => 6],
            ['num_taula' => 3, 'estat' => true, 'capacitat' => 2],
            ['num_taula' => 4, 'estat' => false, 'capacitat' => 8],
            ['num_taula' => 5, 'estat' => true, 'capacitat' => 10],
            ['num_taula' => 6, 'estat' => true, 'capacitat' => 12],
            ['num_taula' => 7, 'estat' => false, 'capacitat' => 3],
            ['num_taula' => 8, 'estat' => false, 'capacitat' => 5],
            ['num_taula' => 9, 'estat' => false, 'capacitat' => 7],
            ['num_taula' => 10, 'estat' => false, 'capacitat' => 4],
        ]);

        DB::table('reserva')->insert([
            ['users_id' => 1, 'taula_id' => 1, 'hora' => now()->addHours(2), 'estat' => 'Confirmed', 'num_guests' => 4],
            ['users_id' => 2, 'taula_id' => 3, 'hora' => now()->addHours(4), 'estat' => 'Pending', 'num_guests' => 2],
            ['users_id' => 3, 'taula_id' => 5, 'hora' => now()->addHours(6), 'estat' => 'Cancelled', 'num_guests' => 5],
            ['users_id' => 4, 'taula_id' => 4, 'hora' => now()->addDay(), 'estat' => 'Confirmed', 'num_guests' => 3],
            ['users_id' => 5, 'taula_id' => 2, 'hora' => now()->addHours(8), 'estat' => 'Pending', 'num_guests' => 6],
            ['users_id' => 6, 'taula_id' => 6, 'hora' => now()->addHours(10), 'estat' => 'Confirmed', 'num_guests' => 2],
        ]);

        DB::table('menu')->insert([
            ['nom' => 'Breakfast Bonanza', 'estat' => true, 'preu_total' => 10.5, 'ingredients_en' => 'Eggs, Bacon, Toast', 'ingredients_ca' => 'Ous, Bacon, Torrades', 'ingredients_es' => 'Huevos, Bacon, Tostadas', 'ingredients_fr' => 'Œufs, Bacon, Toast', 'ingredients_de' => 'Eier, Speck, Toast', 'ingredients_it' => 'Uova, Bacon, Toast'],
            ['nom' => 'Kids’ Happy Meals', 'estat' => true, 'preu_total' => 20.5, 'ingredients_en' => 'Chicken Nuggets, Fries, Apple Slices, Juice', 'ingredients_ca' => 'Nuggets de pollastre, Patates fregides, Tallades de poma, Suc', 'ingredients_es' => 'Nuggets de pollo, Papas fritas, Rodajas de manzana, Jugo', 'ingredients_fr' => 'Nuggets de poulet, Frites, Tranches de pomme, Jus', 'ingredients_de' => 'Hähnchen-Nuggets, Pommes, Apfelscheiben, Saft', 'ingredients_it' => 'Nuggets di pollo, Patatine, Fette di mela, Succo'],
            ['nom' => 'Weekend Specials', 'estat' => false, 'preu_total' => 15.2, 'ingredients_en' => 'Steak, Mashed Potatoes, Gravy, Vegetables, Bread', 'ingredients_ca' => 'Filet, Puré de patates, Salsa, Verdures, Pa', 'ingredients_es' => 'Bistec, Puré de papas, Salsa, Verduras, Pan', 'ingredients_fr' => 'Steak, Purée de pommes de terre, Sauce, Légumes, Pain', 'ingredients_de' => 'Steak, Kartoffelpüree, Soße, Gemüse, Brot', 'ingredients_it' => 'Bistecca, Purè di patate, Sugo, Verdure, Pane'],
            ['nom' => 'Dessert Dreams', 'estat' => true, 'preu_total' => 18.6, 'ingredients_en' => 'Ice Cream, Chocolate Sauce, Sprinkles', 'ingredients_ca' => 'Gelat, Salsa de xocolata, Sprinkles', 'ingredients_es' => 'Helado, Salsa de chocolate, Sprinkles', 'ingredients_fr' => 'Glace, Sauce au chocolat, Vermicelles', 'ingredients_de' => 'Eis, Schokoladensoße, Streusel', 'ingredients_it' => 'Gelato, Salsa di cioccolato, Codette'],
            ['nom' => 'Healthy Habits', 'estat' => true, 'preu_total' => 25.8, 'ingredients_en' => 'Salad, Grilled Chicken, Avocado, Quinoa, Cherry Tomatoes', 'ingredients_ca' => 'Amanida, Pollastre a la brasa, Alvocat, Quinoa, Tomàquets cherry', 'ingredients_es' => 'Ensalada, Pollo a la parrilla, Aguacate, Quinoa, Tomates cherry', 'ingredients_fr' => 'Salade, Poulet grillé, Avocat, Quinoa, Tomates cerises', 'ingredients_de' => 'Salat, Gegrilltes Hähnchen, Avocado, Quinoa, Cherrytomaten', 'ingredients_it' => 'Insalata, Pollo alla griglia, Avocado, Quinoa, Pomodori ciliegia'],
            ['nom' => 'Seafood Sensations', 'estat' => true, 'preu_total' => 28.4, 'ingredients_en' => 'Shrimp, Scallops, Lemon, Garlic, Butter, Parsley', 'ingredients_ca' => 'Gambes, Vieires, Llimona, All, Mantega, Julivert', 'ingredients_es' => 'Camarones, Vieiras, Limón, Ajo, Mantequilla, Perejil', 'ingredients_fr' => 'Crevettes, Coquilles Saint-Jacques, Citron, Ail, Beurre, Persil', 'ingredients_de' => 'Garnelen, Jakobsmuscheln, Zitrone, Knoblauch, Butter, Petersilie', 'ingredients_it' => 'Gamberi, Capesante, Limone, Aglio, Burro, Prezzemolo'],
            ['nom' => 'Grill Masters', 'estat' => false, 'preu_total' => 14.0, 'ingredients_en' => 'Burger Patty, Cheese, Lettuce, Tomato, Onion', 'ingredients_ca' => 'Hamburguesa, Formatge, Enciam, Tomàquet, Ceba', 'ingredients_es' => 'Hamburguesa, Queso, Lechuga, Tomate, Cebolla', 'ingredients_fr' => 'Galette de burger, Fromage, Laitue, Tomate, Oignon', 'ingredients_de' => 'Burger-Patty, Käse, Salat, Tomate, Zwiebel', 'ingredients_it' => 'Hamburger, Formaggio, Lattuga, Pomodoro, Cipolla'],
            ['nom' => 'Vegan Vibes', 'estat' => true, 'preu_total' => 26.2, 'ingredients_en' => 'Tofu, Spinach, Kale, Quinoa, Chickpeas, Tahini', 'ingredients_ca' => 'Tofu, Espinacs, Kale, Quinoa, Cigrons, Tahini', 'ingredients_es' => 'Tofu, Espinacas, Kale, Quinoa, Garbanzos, Tahini', 'ingredients_fr' => 'Tofu, Épinards, Chou frisé, Quinoa, Pois chiches, Tahini', 'ingredients_de' => 'Tofu, Spinat, Grünkohl, Quinoa, Kichererbsen, Tahini', 'ingredients_it' => 'Tofu, Spinaci, Cavolo riccio, Quinoa, Ceci, Tahini'],
            ['nom' => 'Chef’s Specials', 'estat' => false, 'preu_total' => 30.0, 'ingredients_en' => 'Lobster, Butter Sauce, Asparagus, Herbs', 'ingredients_ca' => 'Llagosta, Salsa de mantega, Espàrrecs, Herbes', 'ingredients_es' => 'Langosta, Salsa de mantequilla, Espárragos, Hierbas', 'ingredients_fr' => 'Homard, Sauce au beurre, Asperges, Herbes', 'ingredients_de' => 'Hummer, Buttersauce, Spargel, Kräuter', 'ingredients_it' => 'Aragosta, Salsa al burro, Asparagi, Erbe'],
            ['nom' => 'Midnight Munchies', 'estat' => false, 'preu_total' => 12.8, 'ingredients_en' => 'Pizza, Garlic Bread, Mozzarella, Olives, Pepperoni', 'ingredients_ca' => 'Pizza, Pa d’all, Mozzarella, Olives, Pepperoni', 'ingredients_es' => 'Pizza, Pan de ajo, Mozzarella, Aceitunas, Pepperoni', 'ingredients_fr' => 'Pizza, Pain à l’ail, Mozzarella, Olives, Pepperoni', 'ingredients_de' => 'Pizza, Knoblauchbrot, Mozzarella, Oliven, Pepperoni', 'ingredients_it' => 'Pizza, Pane all’aglio, Mozzarella, Olive, Pepperoni']
        ]);


        DB::table('comanda')->insert([
            ['users_id' => 1, 'menu_id' => 1, 'quantitat' => 2, 'preu_total' => 21.00, 'estat' => 'Completed'],
            ['users_id' => 2, 'menu_id' => 3, 'quantitat' => 1, 'preu_total' => 15.20, 'estat' => 'Pending'],
            ['users_id' => 3, 'menu_id' => 4, 'quantitat' => 3, 'preu_total' => 55.80, 'estat' => 'Completed'],
            ['users_id' => 4, 'menu_id' => 5, 'quantitat' => 1, 'preu_total' => 25.80, 'estat' => 'Cancelled'],
            ['users_id' => 5, 'menu_id' => 2, 'quantitat' => 5, 'preu_total' => 102.50, 'estat' => 'Completed'],
            ['users_id' => 6, 'menu_id' => 6, 'quantitat' => 2, 'preu_total' => 56.80, 'estat' => 'Completed'],
            ['users_id' => 7, 'menu_id' => 8, 'quantitat' => 4, 'preu_total' => 103.20, 'estat' => 'Pending'],
            ['users_id' => 8, 'menu_id' => 9, 'quantitat' => 1, 'preu_total' => 18.60, 'estat' => 'Completed'],
            ['users_id' => 9, 'menu_id' => 7, 'quantitat' => 2, 'preu_total' => 56.80, 'estat' => 'Pending'],
            ['users_id' => 10, 'menu_id' => 10, 'quantitat' => 1, 'preu_total' => 30.00, 'estat' => 'Completed']
        ]);

        DB::table('resenya')->insert([
            ['users_id' => 1, 'menu_id' => 1, 'puntuacio' => 5, 'comentari_en' => 'A delicious breakfast, the pancakes were fluffy and the eggs were perfect!', 'comentari_ca' => 'Un esmorzar deliciós, les pancakes eren esponjoses i els ous eren perfectes!', 'comentari_es' => 'Un desayuno delicioso, los panqueques eran esponjosos y los huevos estaban perfectos!', 'comentari_fr' => 'Un petit-déjeuner délicieux, les pancakes étaient moelleux et les œufs parfaits!', 'comentari_de' => 'Ein köstliches Frühstück, die Pfannkuchen waren fluffig und die Eier perfekt!', 'comentari_it' => 'Una colazione deliziosa, i pancake erano soffici e le uova perfette!'],
            ['users_id' => 2, 'menu_id' => 3, 'puntuacio' => 3, 'comentari_en' => 'The sundae was heavenly, but the salad could have been fresher.', 'comentari_ca' => "El sundae era celestial, però l'amanida podria haver estat més fresca.", 'comentari_es' => 'El helado era celestial, pero la ensalada podría haber estado más fresca.', 'comentari_fr' => 'Le sundae était divin, mais la salade aurait pu être plus fraîche.', 'comentari_de' => 'Das Eis war himmlisch, aber der Salat hätte frischer sein können.', 'comentari_it' => 'Il gelato era divino, ma l’insalata avrebbe potuto essere più fresca.'],
            ['users_id' => 3, 'menu_id' => 4, 'puntuacio' => 4, 'comentari_en' => 'Great pizza and fries, but the falafel was a bit dry.', 'comentari_ca' => 'Molt bona pizza i patates fregides, però el falafel estava una mica sec.', 'comentari_es' => 'Muy buena pizza y papas fritas, pero el falafel estaba un poco seco.', 'comentari_fr' => 'Très bonne pizza et frites, mais le falafel était un peu sec.', 'comentari_de' => 'Großartige Pizza und Pommes, aber der Falafel war etwas trocken.', 'comentari_it' => 'Ottima pizza e patatine, ma il falafel era un po’ secco.'],
            ['users_id' => 4, 'menu_id' => 5, 'puntuacio' => 4, 'comentari_en' => 'The vegan bowl was perfect, but the lobster could have been cooked better.', 'comentari_ca' => 'El bol vegà era perfecte, però la llagosta es podria haver cuinat millor.', 'comentari_es' => 'El bol vegano era perfecto, pero la langosta podría haberse cocinado mejor.', 'comentari_fr' => 'Le bol vegan était parfait, mais le homard aurait pu être mieux cuit.', 'comentari_de' => 'Die vegane Bowl war perfekt, aber der Hummer hätte besser gekocht sein können.', 'comentari_it' => 'La ciotola vegana era perfetta, ma l’aragosta avrebbe potuto essere cucinata meglio.'],
            ['users_id' => 5, 'menu_id' => 2, 'puntuacio' => 3, 'comentari_en' => 'My kids loved the tacos, but the burger was a bit too greasy.', 'comentari_ca' => "A els meus nens els van encantar els tacos, però la hamburguesa estava una mica massa greixosa.", 'comentari_es' => 'A mis hijos les encantaron los tacos, pero la hamburguesa estaba un poco grasosa.', 'comentari_fr' => 'Mes enfants ont adoré les tacos, mais le burger était un peu trop gras.', 'comentari_de' => 'Meine Kinder liebten die Tacos, aber der Burger war etwas zu fettig.', 'comentari_it' => 'I miei bambini hanno adorato i tacos, ma l’hamburger era un po’ troppo grasso.'],
            ['users_id' => 6, 'menu_id' => 6, 'puntuacio' => 4, 'comentari_en' => 'The sushi was fresh and tasty, but perhaps too much wasabi.', 'comentari_ca' => 'El sushi estava fresc i saborós, però potser massa wasabi.', 'comentari_es' => 'El sushi estaba fresco y sabroso, pero tal vez demasiado wasabi.', 'comentari_fr' => 'Le sushi était frais et savoureux, mais peut-être trop de wasabi.', 'comentari_de' => 'Das Sushi war frisch und lecker, aber vielleicht zu viel Wasabi.', 'comentari_it' => 'Il sushi era fresco e gustoso, ma forse troppo wasabi.'],
            ['users_id' => 7, 'menu_id' => 8, 'puntuacio' => 5, 'comentari_en' => 'Amazing vegan dishes! The mac and tuna tartare were fantastic!', 'comentari_ca' => 'Dishes vegans increïbles! El mac i el tàrtar de tonyina eren fantàstics!', 'comentari_es' => '¡Platos veganos increíbles! ¡El mac y el tartar de atún eran fantásticos!', 'comentari_fr' => 'Plats végétaliens incroyables! Les macaronis et le tartare de thon étaient fantastiques!', 'comentari_de' => 'Erstaunliche vegane Gerichte! Der Mac und das Thunfisch-Tatar waren fantastisch!', 'comentari_it' => 'Piatti vegani incredibili! Il mac e il tartare di tonno erano fantastici!'],
            ['users_id' => 8, 'menu_id' => 9, 'puntuacio' => 3, 'comentari_en' => 'The Banh Mi and steak were great, but I didn’t enjoy the fajitas as much.', 'comentari_ca' => "El Banh Mi i l’entrecot eren genials, però no vaig gaudir tant de les fajites.", 'comentari_es' => 'El Banh Mi y el entrecot eran geniales, pero no disfruté tanto las fajitas.', 'comentari_fr' => 'Le Banh Mi et le steak étaient géniaux, mais je n’ai pas autant apprécié les fajitas.', 'comentari_de' => 'Das Banh Mi und das Steak waren großartig, aber die Fajitas haben mir nicht so gut gefallen.', 'comentari_it' => 'Il Banh Mi e la bistecca erano fantastici, ma non mi sono piaciute tanto le fajitas.'],
            ['users_id' => 9, 'menu_id' => 7, 'puntuacio' => 4, 'comentari_en' => 'The chicken parmesan was juicy, but the pad Thai was too spicy.', 'comentari_ca' => "El pollastre parmesà estava jugós, però el pad Thai estava massa picant.", 'comentari_es' => 'El pollo parmesano estaba jugoso, pero el pad Thai estaba demasiado picante.', 'comentari_fr' => 'Le poulet parmesan était juteux, mais le pad thaï était trop épicé.', 'comentari_de' => 'Das Hühnchen-Parmesan war saftig, aber das Pad Thai war zu scharf.', 'comentari_it' => 'Il pollo alla parmigiana era succoso, ma il pad Thai era troppo piccante.'],
            ['users_id' => 10, 'menu_id' => 10, 'puntuacio' => 5, 'comentari_en' => 'Excellent midnight snacks, loved the duck and ribs.', 'comentari_ca' => 'Excel·lents entrepans de mitjanit, vaig adorar el ànec i les costelles.', 'comentari_es' => 'Excelentes bocadillos de medianoche, me encantaron el pato y las costillas.', 'comentari_fr' => 'Excellents snacks de minuit, j’ai adoré le canard et les côtes.', 'comentari_de' => 'Ausgezeichnete Mitternachtssnacks, ich liebte die Ente und die Rippen.', 'comentari_it' => 'Ottimi spuntini di mezzanotte, ho adorato l’anatra e le costine.']
        ]);
    }
}
