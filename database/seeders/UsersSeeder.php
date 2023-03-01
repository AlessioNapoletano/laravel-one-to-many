<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User as User;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $alessio = new User();
        $alessio->name = 'Alessio Napulè';
        $alessio->email = 'AlessioNapulè@gmail.com';
        $alessio->password = Hash::make('12345678');
        $alessio->save();

        for ($i=0; $i < 10 ; $i++) {
            $newUser = new User();
            $newUser->name = $faker->name();
            $newUser->email = $faker->unique()->email();
            $newUser->password = Hash::make($faker->password());
            $newUser->save();
        }
    }
}
