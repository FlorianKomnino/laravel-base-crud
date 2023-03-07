<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Book;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 30; $i++) { 
            $book = new Book();
            $book->isbn_13 = $faker->isbn13();
            $book->title = $faker->realTextBetween(10,15);
            $book->series = $faker->realTextBetween(5,10);
            $book->author_id = Author::inRandomOrder()->first()->id;
            $book->publisher = $faker->company();
            $book->publication_date = $faker->date('Y-m-d');
            $book->plot = $faker->realTextBetween(100, 200);
            $book->genre = $faker->realTextBetween(5,40);
            $book->cover_image = $faker->imageUrl();
            $book->save();
        }
    }
}
