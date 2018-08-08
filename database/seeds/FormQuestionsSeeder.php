<?php

use Illuminate\Database\Seeder;

class FormQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('form_questions')->insert([
            [
                'question' => 'Koks jūsų vardas?',
            ],
            [
                'question' => 'Jūsų gimimo data:',
            ],
            [
                'question' => 'Lytis:',
            ],
            [
                'question' => 'Ar domitės programavimu?',
            ],
            [
                'question' => 'Kokias programavimo kalbas mokate?',
            ],
            [
                'question' => 'Prašome patalpinti savo nuotrauką:',
            ],
        ]);
    }
}
