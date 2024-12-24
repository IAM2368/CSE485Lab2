<?php

namespace Database\Seeders;
use App\Models\Book;
use App\Models\Reader;
use App\Models\Borrow;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BorrowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $readers = Reader::all();
        $books = Book::all();
        for($i=0; $i<20;$i++)
        {
            Borrow::create([
                'reader_id' => $faker->randomElement($readers)->id,
                'book_id' => $faker->randomElement($books)->id,
                'borrow_date' => $faker->date(),
                'return_date' => $faker->date(),
                'status' => $faker->boolean(),
            ]);
        }
    }
}
