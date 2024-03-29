<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

    DB::table('roles')->insert([
        ['name' => 'free', 'description' => 'Rôle de base avec seulement un droit de recherche'],
        ['name' => 'normal', 'description' => 'Rôle classique avec le droit d\'emprunter 2 livres'],
        ['name' => 'premium', 'description' => 'Rôle premium avec le droit d\'emprunter plus de livres'],
        ['name' => 'admin', 'description' => 'Rôle d\'administrateur avec le droit d\'ajouter des livres, auteurs, etc.'],
    ]);
    
    // On génère 50 utilisateurs
    \App\Models\User::factory(50)->create();

    // On génère 10 éditeurs
    \App\Models\Editors::factory(10)->create();

    // On génère 10 auteurs 
    \App\Models\Authors::factory(10)->create();

    // On génère des catégories
    \App\Models\Category::factory()->create([
        'name' => 'Romans contemporains',
        'description' => 'Des œuvres de fiction récentes qui explorent les thèmes et les expériences de la vie moderne.',
        'slug' => 'romans-contemporains',
        'color' => '#FF5733',
    ]);

    \App\Models\Category::factory()->create([
        'name' => 'Classiques de la littérature',
        'description' => 'Des ouvrages intemporels qui ont marqué l\'histoire de la littérature et continuent d\'influencer les lecteurs à travers les générations.',
        'slug' => 'classiques-litterature',
        'color' => '#3498DB',
    ]);

    \App\Models\Category::factory()->create([
        'name' => 'Thrillers et mystères',
        'description' => 'Des histoires palpitantes remplies de suspense, de mystère et d\'intrigues captivantes qui gardent les lecteurs en haleine jusqu\'à la dernière page.',
        'slug' => 'thrillers-mysteres',
        'color' => '#1ABC9C',
    ]);

    \App\Models\Category::factory()->create([
        'name' => 'Science-fiction et fantasy',
        'description' => 'Des mondes imaginaires et des aventures épiques peuplés de technologies avancées, de créatures fantastiques et de voyages interstellaires.',
        'slug' => 'science-fiction-fantasy',
        'color' => '#9B59B6',
    ]);

    \App\Models\Category::factory()->create([
        'name' => 'Histoire et culture',
        'description' => 'Des récits qui explorent les événements passés, les civilisations anciennes, les traditions culturelles et les mouvements historiques.',
        'slug' => 'histoire-culture',
        'color' => '#34495E',
    ]);

      \App\Models\Category::factory()->create([
        'name' => 'Livres pour enfants',
        'description' => 'Des histoires ludiques et éducatives conçues spécifiquement pour divertir et inspirer les jeunes lecteurs.',
        'slug' => 'livres-enfants',
        'color' => '#F1C40F',
      ]);

      \App\Models\Category::factory()->create([
        'name' => 'Poésie',
        'description' => 'Des recueils de poèmes riches en émotion, en beauté et en imagination, explorant les sentiments humains à travers la puissance des mots.',
        'slug' => 'poesie',
        'color' => '#E74C3C',
      ]);

      $books = \App\Models\Books::factory(100)->create();

      $categories = \App\Models\Category::all();
      
      $books->each(function ($books) use ($categories) {
          $books->categories()->attach(
              $categories->random(rand(1,2))->pluck('id')->toArray()
          );
      });
    }
}
