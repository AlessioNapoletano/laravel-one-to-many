<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\User_profile as User_profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class UserProfilesSeeder extends Seeder
{
    /**
     * 
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();

        foreach ($users as $user) {
            $newUserDetail  = new User_profile();
            $newUserDetail->user_id = $user->id;
            $newUserDetail->name = $faker->name();
            $newUserDetail->surname = $faker->name();
            $newUserDetail->pic_profile = $faker->imageUrl();
            $newUserDetail->save();
        }

    }
}
