<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       // delete old data
       DB::table('admin')->delete();
       DB::table('candidature')->delete();
       DB::table('entreprise')->delete();
       DB::table('etudiant')->delete();
       DB::table('notificationentreprise')->delete();
       DB::table('notificationetudiant')->delete();
       DB::table('offrestage')->delete();
       DB::table('question')->delete();
       DB::table('reponse')->delete();
        
       $faker = Faker::create();

       // format : columnName => $faker-> someVarTypeSettings
       foreach (range(1, 10) as $index) {
        DB::table('entreprise')->insert([
            'id' => $faker->unique()->numberBetween(1, 100),
            'nom' => $faker->company,
            'email' => $faker->unique()->safeEmail,
            'mdp' => $faker->sha256(), // return hashed password
            'sectActivite' => $faker->bs,
            'infoSupp' => $faker->text(50),
        ]);
       }

       foreach (range(1, 10) as $index) {
        DB::table('etudiant')->insert([
            'id' => $faker->unique()->numberBetween(1, 100),
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'email' => $faker->unique()->safeEmail,
            'mdp' => $faker->sha256(), // return hashed password
            'typeStage' => $faker->randomElement(['initiation', 'perfectionnement', 'PFE']),
            'domaineEtude' => $faker->text(10),
            'specialite' => $faker->text(10),
        ]);
       }

       foreach (range(1, 10) as $index) {
        DB::table('admin')->insert([
            'id' => $faker->unique()->numberBetween(1, 100),
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'email' => $faker->unique()->safeEmail,
            'mdp' => $faker->sha256(), // return hashed password
        ]);
       }

       foreach (range(1, 10) as $index) {
        DB::table('question')->insert([
            'id' => $faker->unique()->numberBetween(1, 100),
            'idEtudiant' => $faker->randomElement(DB::table('etudiant')->pluck('id')),
            'contenu' => $faker->text,
            'date' => $faker->date,
            'status' => $faker->randomElement(['enAttend', 'envoyee']),
        ]);
       }

       foreach (range(1, 10) as $index) {
        DB::table('offrestage')->insert([
            'id' => $faker->unique()->numberBetween(1, 100),
            'idEntreprise' => $faker->randomElement(DB::table('entreprise')->pluck('id')),
            'status' => $faker->randomElement(['disponible', 'non disponible']),
            'titre' => $faker->jobTitle,
            'description' => $faker->text(20), // return hashed password
            'domaine' => $faker->text(20),
            'localisation' => $faker->address,
            'dateLimite' => $faker->date,
            'typeStage' => $faker->randomElement(['remunere', 'nonRemunere']),
            'cahierCharge' => $faker->url,
        ]);
       }

       foreach (range(1, 10) as $index) {
        DB::table('reponse')->insert([
            'id' => $faker->unique()->numberBetween(1, 100),
            'idQues' => $faker->randomElement(DB::table('question')->pluck('id')),
            'idAdmin' => $faker->randomElement(DB::table('admin')->pluck('id')),
            'contenu' => $faker->text,
            'date' => $faker->date,
        ]);
       }

       foreach (range(1, 10) as $index) {
        DB::table('candidature')->insert([
            'id' => $faker->unique()->numberBetween(1, 100),
            'idEtudiant' => $faker->randomElement(DB::table('etudiant')->pluck('id')),
            'idOffre' => $faker->randomElement(DB::table('offrestage')->pluck('id')),
            'dateSoumission' => $faker->date,
            'status' => $faker->randomElement(['enAttend', 'acceptee', 'refusee']),
            'cv' => $faker->url,
        ]);
       }

       foreach (range(1, 10) as $index) {
           DB::table('notificationetudiant')->insert([
               'id' => $faker->unique()->numberBetween(1, 100),
               'idetudiant' => $faker->randomElement(DB::table('etudiant')->pluck('id')),
           ]);
       }

       foreach (range(1, 10) as $index) {
        DB::table('notificationentreprise')->insert([
            'id' => $faker->unique()->numberBetween(1, 100),
            'identreprise' => $faker->randomElement(DB::table('entreprise')->pluck('id')),
        ]);
       }
    }
}
