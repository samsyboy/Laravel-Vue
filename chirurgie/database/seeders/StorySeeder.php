<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Story;

class StorySeeder extends Seeder
{
    public function run(): void
    {
        Story::create([
            'title' => 'Chirurgie esthétique : À la recherche du changement',
            'description' => 'Une histoire interactive sur les choix liés à la chirurgie esthétique.',
        ]);
    }
}
