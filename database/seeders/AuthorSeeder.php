<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++){
            $newAuthor = new Author();
            $newAuthor->name = $faker->firstName();
            $newAuthor->surname = $faker->lastName();
            $newAuthor->nationality = $faker->state();
            $newAuthor->date_of_birth = $faker->date();
            $newAuthor->date_of_deth = $faker->date();
            $newAuthor->save();
        }
    }
}
