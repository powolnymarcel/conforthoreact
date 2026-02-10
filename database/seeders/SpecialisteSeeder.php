<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Specialiste;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SpecialisteSeeder extends Seeder
{
    public function run(): void
    {
        // Optional: Truncate the table to remove old data
        DB::table('specialistes')->truncate();

        $specialistes = [
            ['short_description'=> 'descr courte', 'name' => 'Dupont', 'firstname' => 'Jean', 'picture' => 'team-04.jpg', 'job' => 'Orthopédiste'],
            ['short_description'=> 'descr courte', 'name' => 'Martin', 'firstname' => 'Marie', 'picture' => 'team-04.jpg', 'job' => 'Chirurgien'],
            ['short_description'=> 'descr courte', 'name' => 'Durand', 'firstname' => 'Sophie', 'picture' => 'team-04.jpg', 'job' => 'Podologue'],
            ['short_description'=> 'descr courte', 'name' => 'Lefevre', 'firstname' => 'Claire', 'picture' => 'team-04.jpg', 'job' => 'Kinésithérapeute'],
            ['short_description'=> 'descr courte', 'name' => 'Bernard', 'firstname' => 'Luc', 'picture' => 'team-04.jpg', 'job' => 'Prothésiste'],
            ['short_description'=> 'descr courte', 'name' => 'Moreau', 'firstname' => 'Pierre', 'picture' => 'team-04.jpg', 'job' => 'Ergothérapeute'],
            ['short_description'=> 'descr courte', 'name' => 'Roux', 'firstname' => 'Claire', 'picture' => 'team-04.jpg', 'job' => 'Orthésiste'],
            ['short_description'=> 'descr courte', 'name' => 'Petit', 'firstname' => 'Paul', 'picture' => 'team-04.jpg', 'job' => 'Technicien Orthopédique'],
        ];

        foreach ($specialistes as $specialiste) {
            $slug = Str::slug($specialiste['name'] . '-' . $specialiste['firstname']);

            Specialiste::create([
                'name' => $specialiste['name'],
                'firstname' => $specialiste['firstname'],
                'picture' => $specialiste['picture'],
                'job' => $specialiste['job'],
                'short_description' => $specialiste['short_description'],
                'uuid' => Str::uuid(),
                'slug' => $slug,
            ]);
        }
    }
}
