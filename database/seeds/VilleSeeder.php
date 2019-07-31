<?php

use Illuminate\Database\Seeder;
use App\Models\Ville;
use App\Models\Pays;

class VilleSeeder extends Seeder
{
    public function run()
    {
        $villes = [
            (object)['nom' => 'Abidjan'], 
            (object)['nom' => 'Bouaké'], 
            (object)['nom' => 'Daloa'], 
            (object)['nom' => 'Yamoussoukro'], 
            (object)['nom' => 'San-Pédro'], 
            (object)['nom' => 'Divo'], 
            (object)['nom' => 'Korhogo'],
            (object)['nom' => 'Anyama'],
            (object)['nom' => 'Abengourou'],
            (object)['nom' => 'Man'],
            (object)['nom' => 'Gagnoa'],
            (object)['nom' => 'Soubré'],
            (object)['nom' => 'Agboville'],
            (object)['nom' => 'Dabou'],
            (object)['nom' => 'Grand-Bassam'],
            (object)['nom' => 'Bouaflé'],
            (object)['nom' => 'Issia'],
            (object)['nom' => 'Sinfra'],
            (object)['nom' => 'Katiola'],
            (object)['nom' => 'Bingerville'],
            (object)['nom' => 'Adzopé'],
            (object)['nom' => 'Séguéla'],
            (object)['nom' => 'Bondoukou'],
            (object)['nom' => 'Oumé'],
            (object)['nom' => 'Ferkessedougou'],
            (object)['nom' => 'Dimbokro'],
            (object)['nom' => 'Odienné'],
            (object)['nom' => 'Duékoué'],
            (object)['nom' => 'Danané'],
            (object)['nom' => 'Tingréla'],
            (object)['nom' => 'Guiglo'],
            (object)['nom' => 'Boundiali'],
            (object)['nom' => 'Agnibilékrou'],
            (object) ['nom' => 'Daoukro'],
            (object) ['nom' => 'Vavoua'],
            (object) ['nom' => 'Zuénoula'],
            (object) ['nom' => 'Tiassalé'],
            (object) ['nom' => 'Toumodi'],
            (object) ['nom' => 'Akoupé'],
            (object) ['nom' => 'Lakota']
        ];

        $pays = Pays::create([
            "nom" => "Côte d'ivoire",
            "code_iso" => "CIV",
            "indicatif" => "+225"
        ]);

        foreach($villes as $ville) {
            $newville = Ville::create([
                'nom' => $ville->nom,
                "pays_id" => 1
            ]);
        }
    }
}
