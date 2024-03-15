<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        DB::table('roles')->insert([
            ['name' => 'free', 'description' => 'Rôle de base avec seulement un droit de recherche'],
            ['name' => 'normal', 'description' => 'Rôle classique avec le droit d\'emprunter 2 livres'],
            ['name' => 'premium', 'description' => 'Rôle premium avec le droit d\'emprunter plus de livres'],
            ['name' => 'admin', 'description' => 'Rôle d\'administrateur avec le droit d\'ajouter des livres, auteurs, etc.'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
