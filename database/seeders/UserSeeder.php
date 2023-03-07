<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $gino = new User();
        $gino->name = 'Ginetto';
        $gino->email = 'ginetto@gmail.com';
        $gino->password = Hash::make('1234567890');
        $gino->save();

        for ($i=0; $i < 10 ; $i++) {
            $newUser = new User();
            $newUser->name = $faker->name();
            $newUser->email = $faker->unique()->email();
            $newUser->password = Hash::make($faker->password());
            $newUser->save();
        }
    }
}
