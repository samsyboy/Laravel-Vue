<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Création d'un utilisateur de test
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Appel des autres seeders
        $this->call([
            StorySeeder::class,
            ChapterSeeder::class,
            ChoiceSeeder::class,
        ]);
    }
}
