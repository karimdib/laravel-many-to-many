<?php

namespace Database\Seeders;

use Faker\Generator as Faker;
use App\Models\Project;
use App\Models\Tecnology;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $type = Type::all();
        $tecnologies = Tecnology::all();
        $tecnologiesIds = $tecnologies->pluck('id');
        $ids = $type->pluck('id');

        for ($i = 0; $i < 50; $i++) {
            $new_project = new Project();
            $new_project->name = $faker->colorName();
            $new_project->description = $faker->text();
            $new_project->type_id = $faker->optional()->randomElement($ids);
            $new_project->save();
            $new_project->tecnologies()->attach($faker->randomElements($tecnologiesIds, null));
        }
    }
}
