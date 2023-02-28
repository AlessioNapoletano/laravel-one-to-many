<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Type;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {


        for ($i=0; $i < 60; $i++) { 
            $newProject = new Project(); 
            $newProject->type_id = Type::inRandomOrder()->first()->id;
            $newProject->title = $faker->unique()->realTextBetween(5, 20);
            $newProject->slug = Str::slug($newProject->title);
            $newProject->author = $faker->name();
            $newProject->cover_image = $faker->imageUrl(640, 480);
            $newProject->content = $faker->realTextBetween(1600, 3000);
            $newProject->post_date = $faker->dateTimeThisYear();
            $newProject->save();
        }
    }
}
