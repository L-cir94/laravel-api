<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use App\Models\Type;
use Illuminate\Support\Str;
use Termwind\Components\Paragraph;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run(Faker $faker)
    {
        $types = ['front-end', 'back-end', 'full-stack'];

        foreach ($types as $type) {
            $newType = new Type();
            $newType->name = $type;
            $newType->slug = Str::slug($newType->name, '-');
            $newType->content = $faker->paragraph(2);
            $newType->save();
        }
    }
}
