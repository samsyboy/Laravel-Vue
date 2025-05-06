<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chapter;
use App\Models\Choice;

class ChoiceSeeder extends Seeder
{
    public function run(): void
    {
        $chapter1 = Chapter::where('title', 'Quel type d’opération veux-tu faire ?')->first();
        $chapter2 = Chapter::where('title', 'Tu choisis ton chirurgien')->first();

        if ($chapter1 && $chapter2) {
            Choice::insert([
                [
                    'chapter_id' => $chapter1->id,
                    'text' => 'Rhinoplastie',
                    'next_chapter_id' => $chapter2->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'chapter_id' => $chapter1->id,
                    'text' => 'Liposuccion',
                    'next_chapter_id' => $chapter2->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'chapter_id' => $chapter1->id,
                    'text' => 'Augmentation mammaire / pectorale',
                    'next_chapter_id' => $chapter2->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]);
        }
    }
}
