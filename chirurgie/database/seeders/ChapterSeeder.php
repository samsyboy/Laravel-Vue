<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chapter;

class ChapterSeeder extends Seeder
{
    public function run(): void
    {
        Chapter::insert([
            [
                'story_id' => 1,
                'title' => 'Quel type d’opération veux-tu faire ?',
                'content' => 'Tu hésites entre plusieurs options de chirurgie...',
                'self_confidence' => 0,
                'medical_risk' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'story_id' => 2,
                'title' => 'Tu choisis ton chirurgien',
                'content' => 'Trois chirurgiens s’offrent à toi...',
                'self_confidence' => 0,
                'medical_risk' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
