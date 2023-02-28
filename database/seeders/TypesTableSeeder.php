<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$types = name of type
        $types = ['Front-end', 'Back-end', 'Full-Stack'];

        foreach ($types as $type) {
            $newType = new Type();
            $newType->type = $type;
            $newType->save();
        }
    }
}
