<?php

namespace Database\Seeders;

use App\Models\Tecnology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TecnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tecnologies = ['nodejs', 'python', 'JS', 'ai'];

        foreach ($tecnologies as $tecnology) {
            $tag = new Tecnology();
            $tag->name = $tecnology;
            $tag->save();
        }
    }
}
