<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {

            $project = new Project();
            $project->title = $faker->sentence(3);
            $project->slug = Str::slug($project->title, '-');
            $project->content = $faker->paragraphs(asText: true);
            $project->repo = Project::createRepo($project->title);
            $project->cover_image = 'placeholders/' . $faker->image('storage/app/public/placeholder', fullPath: false, category: 'projects', word: $project->title, gray: true);
            $project->save();
        }
    }
}
